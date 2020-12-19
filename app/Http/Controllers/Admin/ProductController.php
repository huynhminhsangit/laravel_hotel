<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryProductModel;
use Illuminate\Support\Facades\Input;
use App\Models\ProductModel as MainModel;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\ProductRequest as MainRequest;
use App\Models\GroupAttributeModel;
use DB;

class ProductController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.product.';  // slider
        $this->controllerName     = 'product';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
        $this->titlePage = 'Phòng';
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['filter']['category'] = $request->input('filter_category', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $categoryModel = new CategoryProductModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-product']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['count','status']]
        return view($this->pathViewController . "index", [
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount,
            'itemsCategory'    => $itemsCategory,
            'titlePage'        => $this->titlePage
        ]);
    }
    public function form(Request $request)
    {
        $item = null;
        if ($request->id !== '') {
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        $categoryModel = new CategoryProductModel();
        $itemsCategory  = $categoryModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-product']);
        $groupAttribute = new GroupAttributeModel();
        $groupAttributeName = $groupAttribute->listItems(null, ['task' => 'admin-list-items-in-select-box-for-product']);
        return view($this->pathViewController . "form", compact('item', 'itemsCategory', 'groupAttributeName'));
    }

    public function storeMedia(Request $request)
    {
        // $path = storage_path('tmp/uploads');
        $path = public_path('images/product');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());


        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteMedia(Request $request) {
        $filename =  $request->filename;
        $path = public_path('images/product').'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            // Check value attribute empty
            if(!isset($params['attr'])) $params['attribute'] = null;
            else{
                foreach($params['attr'] as $key => $value){
                    if(!isset($value['value'])){
                        $params['attr'][$key]['value'] = [];
                    }
                }
                $params['attribute'] = json_encode(array_values($params['attr']));
            }
            
            if(!empty($params['thumb']['name'])){
                $tmp = [];
                foreach ($params['thumb']['name'] as $key => $val1) {
                    $val2 = $params['thumb']['alt'][$key];
                    $tmp[$key]['imageName'] = $val1;
                    $tmp[$key]['imageAlt'] = $val2;
                }
                $params['thumb']       = json_encode($tmp);
            }
            if(!isset($params['arrMeta']['keyword'])) $params['arrMeta']['keyword'] = null;
            $params['meta']       = json_encode($params['arrMeta']);
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if (isset($params) && $params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

    public function type(Request $request)
    {
        $params["currentType"]    = $request->type;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type']);
        echo json_encode($result);
    }
    public function changeCategory(Request $request)
    {
        $params["category_id"]    = $request->category_id;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-category']);
        echo json_encode($result);
    }

    public function addFormAttr(Request $request)
    {
        $id = $request->id;
        $result = DB::table('attribute')->where('group_attribute_id', 'LIKE', "%$id%")->pluck('name')->toArray();
        $xhtml = '';
        if ($result) {
            foreach ($result as $key => $value) {
                $xhtml .= sprintf('
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="attr['.$key.'][name]" value="' . $value . '" readonly>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control attr-value" name="attr['.$key.'][value][]" multiple="multiple"></select>
                        </div>
                        <div class="col-md-1">
                            <a href="javascript:void(0)" title="Xóa" class="btn btn-danger delete-attr"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>');
            }
        }
        return $xhtml;
    }
}
