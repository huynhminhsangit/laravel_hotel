<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\EmployeeModel as MainModel;
use App\Http\Requests\EmployeeRequest as MainRequest ;

class EmployeeController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.employee.';
        $this->controllerName     = 'employee';
        $this->model              = new MainModel();
        parent::__construct();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        $this->titlePage = 'Nhân viên';
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
}
