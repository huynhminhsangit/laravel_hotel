<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\RssModel as MainModel;
use App\Http\Requests\RssRequest as MainRequest ;

class RssController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.rss.';
        $this->controllerName     = 'rss';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Tin tức tổng hợp';
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

    public function source(Request $request)
    {
        $params["currentSource"]   = $request->type_source;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-source']);
        echo json_encode($result);
    }
}
