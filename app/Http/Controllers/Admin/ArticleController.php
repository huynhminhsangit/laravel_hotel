<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ArticleModel as MainModel;
use App\Models\CategoryArticleModel;
use App\Http\Requests\ArticleRequest as MainRequest;
use DB;
class ArticleController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.article.';  // slider
        $this->controllerName     = 'article';
        $this->model              = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        $this->titlePage = 'Bài viết';
        parent::__construct();
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');
        $this->params['filter']['category'] = $request->input('filter_category','all');
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $categoryModel = new CategoryArticleModel();
        $itemCategory = $categoryModel->listItems(null,['task' => 'admin-list-items-in-select-box-for-article']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);

        return view($this->pathViewController . "index",[
            'params'           => $this->params,
            'items'            => $items,
            'itemCategory'     => $itemCategory,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage
        ]);

    }
    public function form(Request $request)
    {
        $item = null;
        $tags = null;
        if($request->id !== ''){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
            if(!empty($item['tags_id'])) {
                foreach (json_decode($item['tags_id']) as $key => $value) {
                    $tags[] = DB::table('tags')->where('id',$value)->first()->name;
                }
            }
        }
        $categoryModel = new CategoryArticleModel();
        $nodes = $categoryModel->listItems(null, ['task' => 'admin-list-items-in-select-box-for-article']);
        return view($this->pathViewController . "form", compact('item','nodes','tags'));
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if ($params['id'] !== null) {
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
}
