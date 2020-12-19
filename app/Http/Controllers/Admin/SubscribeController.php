<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\SubscribeModel as MainModel;

class SubscribeController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.subscribe.';
        $this->controllerName     = 'subscribe';
        $this->model = new MainModel();
        parent::__construct();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        $this->titlePage = 'Theo dõi';
    }

    public function save(Request $request)
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
}
