<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\GroupAttributeModel as MainModel;
use App\Http\Requests\GroupAttributeRequest as MainRequest;

class GroupAttributeController extends AdminController
{


    public function __construct()
    {
        $this->pathViewController = 'admin.pages.group_attribute.';
        $this->controllerName     = 'group-attribute';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Nhóm thuộc tính';
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
