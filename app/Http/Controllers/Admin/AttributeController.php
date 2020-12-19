<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\AttributeModel as MainModel;
use App\Models\GroupAttributeModel;
use App\Http\Requests\AttributeRequest as MainRequest;

class AttributeController extends AdminController
{


    public function __construct()
    {
        $this->pathViewController = 'admin.pages.attribute.';
        $this->controllerName     = 'attribute';
        $this->model              = new MainModel();
        $this->titlePage = 'Thuộc tính';
        parent::__construct();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
    }
    public function form(Request $request)
    {
        $item = null;
        if($request->id !== ''){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        $groupAttributeModel = new GroupAttributeModel();
        $groupAttribute = $groupAttributeModel->listItems(null, ['task' => 'admin-list-items-in-select-box']);
        return view($this->pathViewController . "form", compact('item','groupAttribute'));
    }
    public function changePriceStatus(Request $request)
    {
        $params['currentStatus'] = $request->status;
        $params['id']            = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-price-status']);
        echo json_encode($result);
    }
    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";
            // dd($params);
            if(!isset($params['group_attribute_id'])) $params['group_attribute_id'] = [];
            if ($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
    public function showAttribute(Request $request)
    {
        $result = $this->model->listItems($request->name,['task' =>'list-items-attr']);
        echo json_encode($result);
    }
}
