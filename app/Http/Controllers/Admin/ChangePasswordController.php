<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\UserModel as MainModel;
use App\Http\Requests\ChangePasswordRequest as MainRequest;
use Illuminate\Support\MessageBag;

class ChangePasswordController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.change-password.';
        $this->controllerName     = 'change-password';
        $this->model              = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        $this->titlePage = 'Đổi mật khẩu';
        parent::__construct();
    }
    public function changePassword(Request $request){
        return view($this->pathViewController.'index',[
            'titlePage'        => $this->titlePage,
        ]);
    }
    public function save(MainRequest $request,MessageBag $messageBag)
    {
        $params['id'] = session('userInfo')['id'];
        $currentPassword = md5($request->current_password);
        $user = $this->model->getItem($params,['task' => 'get-password']);
        if($currentPassword == $user['password']) {
            $task   = "change-password";
            $notify = "Lưu mật khẩu thành công!";
            $params['new_password'] = $request->new_password;
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        } else {
            $messageBag->add('current_password','error');
            return redirect()->back()->withErrors('Current Password is incorrect');
        }
    }
}
