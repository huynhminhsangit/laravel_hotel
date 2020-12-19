<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\CategoryArticleModel as MainModel;
use App\Http\Requests\CategoryArticleRequest as MainRequest ;

class CategoryArticleController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.category_article.';
        $this->controllerName     = 'category-article';
        $this->model              = new MainModel();
        $this->titlePage          = 'Danh mục bài viết';
        parent::__construct();
    }

    public function form(Request $request)
    {
        $item = null;
        if ($request->id !== null) {
            $this->params['id'] = $request->id;
            $item = $this->model->getItem($this->params, ['task' => 'get-item']);
        }
        $nodes = $this->model->listItems($this->params, ['task' => 'admin-list-items-in-select-box']);
        return view($this->pathViewController . 'form', compact('item', 'nodes'));
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
    public function isFooter(Request $request)
    {
        $params["currentIsFooter"]  = $request->isFooter;
        $params["id"]             = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-is-footer']);
        echo json_encode($result);
        // return redirect()->route($this->controllerName)->with('zvn_notify', 'Cập nhật trạng thái hiển thị tại footer thành công!');
    }

    public function display(Request $request)
    {
        $params["currentDisplay"]   = $request->display;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-display']);
        echo json_encode($result);
    }
    public function ordering(Request $request)
    {
        $this->params['type'] = $request->type;
        $this->params['id'] = $request->id;
        $this->model->ordering($this->params, null);
        return redirect()->route($this->controllerName);
    }
}
