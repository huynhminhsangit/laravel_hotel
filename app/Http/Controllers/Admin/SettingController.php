<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\SettingModel as MainModel;
use App\Http\Requests\SettingRequest as MainRequest ;

class SettingController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.setting.';
        $this->controllerName     = 'setting';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        parent::__construct();
        $this->titlePage = 'Cài đặt trang';
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field']  = $request->input('search_field', '');
        $this->params['search']['value']  = $request->input('search_value', '');
        $items       = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemGeneral = $this->model->getItem('setting_general', ['task' => 'get-setting-value']);
        $itemEmail   = $this->model->getItem('setting_email', ['task' => 'get-setting-value']);
        $itemSocial  = $this->model->getItem('setting_social', ['task' => 'get-setting-value']);
        $itemSeo     = $this->model->getItem('setting_seo', ['task' => 'get-setting-value']);
        $itemScript  = $this->model->getItem('setting_script', ['task' => 'get-setting-value']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['count','status']]
        return view($this->pathViewController . "index",[
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage,
            'itemGeneral'      => $itemGeneral,
            'itemEmail'        => $itemEmail,
            'itemSocial'       => $itemSocial,
            'itemSeo'          => $itemSeo,
            'itemScript'       => $itemScript,

        ]);
    }
    public function email(Request $request)
    {
        $params['id'] = $request->id;
        $item = $this->model->getItem($params, ['task' => 'get-item']);

        return view($this->pathViewController . "index",[
            'params'           => $params,
            'item'            => $item,
        ]);
    }
    public function general(Request $request)
    {
        $params['id'] = $request->id;
        $item = $this->model->getItem($params, ['task' => 'get-item']);
        return view($this->pathViewController . "index",[
            'params'           => $params,
            'item'            => $item,
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            if(isset($params['task_general'])) $task = "edit-item-setting-general";
            if(isset($params['task_email'])) $task   = "edit-item-setting-email";
            if(isset($params['task_social'])) $task  = "edit-item-setting-social";
            if(isset($params['task_script'])) $task  = "edit-item-setting-script";
            if(isset($params['task_seo'])) $task  = "edit-item-setting-seo";
            $notify = "Cập nhật phần tử thành công!";
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
}
