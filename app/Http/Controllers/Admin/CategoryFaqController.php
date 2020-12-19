<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\CategoryFaqModel as MainModel;
use App\Http\Requests\CategoryFaqRequest as MainRequest;

class CategoryFaqController extends AdminController
{

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.category_faq.';
        $this->controllerName     = 'category-faq';
        $this->model = new MainModel();
        $this->titlePage = 'Danh mục câu hỏi thường gặp';
        parent::__construct();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
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

    public function isHome(Request $request)
    {
        $params["currentIsHome"]  = $request->isHome;
        $params["id"]             = $request->id;
        $this->model->saveItem($params, ['task' => 'change-is-home']);
        return redirect()->route($this->controllerName)->with('zvn_notify', 'Cập nhật trạng thái hiển thị trang chủ thành công!');
    }

    public function display(Request $request)
    {
        $params["currentDisplay"]   = $request->display;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-display']);
        echo json_encode($result);
    }
}
