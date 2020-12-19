<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $pathViewController = '';
    protected $controllerName     = '';
    protected $titlePage          = '';
    protected $params             = [];
    protected $model;
    public function __construct()
    {
        $this->params['pagination']['totalItemsPerPage'] = 5;
        view()->share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['count','status']]
        return view($this->pathViewController . "index",[
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage
        ]);

    }
    public function form(Request $request)
    {
        $item = null;
        if($request->id !== ''){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }
        return view($this->pathViewController . "form", compact('item'));
    }
    public function status(Request $request)
    {
        $params['currentStatus'] = $request->status;
        $params['id']            = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-status']);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $params['id']            = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);
        return redirect()->route($this->controllerName)->with('zvn_notify', 'Xóa dữ liệu thành công!');
    }

}
