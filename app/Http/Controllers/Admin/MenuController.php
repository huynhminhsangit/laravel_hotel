<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\MenuModel as MainModel;
use App\Http\Requests\MenuRequest as MainRequest ;

class MenuController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.menu.';
        $this->controllerName     = 'menu';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        parent::__construct();
        $this->titlePage = 'Menu';
    }

    public function form(Request $request)
    {
        $item = null;
        if ($request->id !== null) {
            $this->params['id'] = $request->id;
            $item = $this->model->getItem($this->params, ['task' => 'get-item']);
        }
        $nodes = $this->model->listItems($this->params, ['task' => 'admin-list-items-in-select-box']);
        return view($this->pathViewController . 'form', compact('item', 'nodes'));
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
        $this->params['type'] = $request->type;
        $this->params['id'] = $request->id;
        $this->model->ordering($this->params, null);
        return redirect()->route($this->controllerName);
    }

    public function typeMenu(Request $request)
    {
        $params["currentTypeMenu"]   = $request->typeMenu;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-menu']);
        echo json_encode($result);
    }
    public function typeOpen(Request $request)
    {
        $params["currentTypeOpen"]   = $request->typeOpen;
        $params["id"]               = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-open']);
        echo json_encode($result);
    }

}
