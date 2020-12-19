<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\FaqModel as MainModel;
use App\Models\CategoryFaqModel;
use App\Http\Requests\FaqRequest as MainRequest ;

class FaqController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.faq.';
        $this->controllerName     = 'faq';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Câu hỏi thường gặp';
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');
        $this->params['filter']['category'] = $request->input('filter_category','all');
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $categoryModel = new CategoryFaqModel();
        $itemCategory = $categoryModel->listItems(null,['task' => 'admin-list-items-in-select-box']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view($this->pathViewController . "index",[
            'params'           => $this->params,
            'items'            => $items,
            'itemCategory'     => $itemCategory,
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

    public function typeMenu(Request $request)
    {
        $params["currentTypeMenu"]   = $request->typeMenu;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-menu']);
        echo json_encode($result);
    }
    public function typeOpen(Request $request)
    {
        $params["currentTypeOpen"]   = $request->typeOpen;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-open']);
        echo json_encode($result);
    }

    public function category(Request $request) {
        $params['category_id'] = $request->category;
        $params['id']       = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-category']);
        echo \json_encode($result);
    }
    public function form(Request $request)
    {
        $item = null;
        $categoryModel = new CategoryFaqModel();
        $itemCategory = $categoryModel->listItems(null,['task' => 'admin-list-items-in-select-box']);
        if($request->id !== ''){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        return view($this->pathViewController . "form", compact('item','itemCategory'));
    }
}
