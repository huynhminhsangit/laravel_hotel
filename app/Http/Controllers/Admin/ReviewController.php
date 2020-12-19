<?php

namespace App\Http\Controllers\Admin;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\ReviewModel as MainModel;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\ReviewRequest as MainRequest ;

class ReviewController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.review.';
        $this->controllerName     = 'review';
        $this->model              = new MainModel();
        $this->productModel       = new ProductModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Đánh giá';
    }
    public function index(Request $request)
    {
        $this->params['filter']['status']  = $request->input('filter_status', 'all');
        $this->params['search']['field']   = $request->input('search_field', '');
        $this->params['search']['value']   = $request->input('search_value', '');
        $this->params['filter']['product'] = $request->input('filter_product','all');
        $items            = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsProduct     = $this->productModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-review']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view($this->pathViewController . "index",[
            'params'           => $this->params,
            'items'            => $items,
            'itemsProduct'     => $itemsProduct,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage,
        ]);
    }
    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
    public function ordering(Request $request)
    {
        $params['currentOrdering'] = $request->ordering;
        $params['id']            = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-ordering']);
        echo json_encode($result);
    }

    public function product(Request $request) {

        $params["product_id"]    = $request->product;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-product']);
        echo json_encode($result);
    }
    public function star(Request $request) {
        $params['star'] = $request->star;
        $params['id']       = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-star']);
        echo \json_encode($result);
    }
    public function form(Request $request)
    {
        $item = null;
        $itemsProduct = $this->productModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-review']);
        if($request->id !== ''){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        return view($this->pathViewController . "form", compact('item','itemsProduct'));
    }
}
