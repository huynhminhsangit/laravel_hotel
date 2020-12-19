<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\FeeshipModel as MainModel;
use App\Http\Requests\FeeshipRequest as MainRequest;

class FeeshipController extends AdminController
{


    public function __construct()
    {
        $this->pathViewController = 'admin.pages.feeship.';
        $this->controllerName     = 'feeship';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Phí vận chuyển';
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

}
