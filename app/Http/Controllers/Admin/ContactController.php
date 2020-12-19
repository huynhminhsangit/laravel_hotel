<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ContactModel as MainModel;
use App\Http\Requests\ContactRequest as MainRequest ;

class ContactController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.contact.';
        $this->controllerName     = 'contact';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        $this->titlePage = 'Liên hệ';
        parent::__construct();
    }

    // public function save(MainRequest $request)
    // {
    //     if ($request->method() == 'POST') {
    //         $params = $request->all();

    //         $task   = "add-item";
    //         $notify = "Thêm phần tử thành công!";

    //         if($params['id'] !== null) {
    //             $task   = "edit-item";
    //             $notify = "Cập nhật phần tử thành công!";
    //         }
    //         $this->model->saveItem($params, ['task' => $task]);
    //         return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
    //     }
    // }
}
