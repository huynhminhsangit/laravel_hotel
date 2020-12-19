<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\CouponModel as MainModel;
use App\Http\Requests\CouponRequest as MainRequest;

class CouponController extends AdminController
{


    public function __construct()
    {
        $this->pathViewController = 'admin.pages.coupon.';
        $this->controllerName     = 'coupon';
        $this->model              = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        $this->titlePage = 'Mã giảm giá';
        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";
            if($params['type'] === 'percent') {
                $minValue = 0; 
                $maxValue = 100;
                $tmpValue = 0;
                if($params['value'] >= $minValue && $params['value'] <= $maxValue) $tmpValue = $params['value'];
                else if($params['value'] < $minValue) $tmpValue = $minValue;
                else if($params['value'] > $maxValue) $tmpValue = $maxValue;
                $params['value'] = $tmpValue;
            }
            if ($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

}
