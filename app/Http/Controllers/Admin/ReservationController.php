<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ReservationModel as MainModel;
use App\Http\Requests\SliderRequest as MainRequest ;
use App\Models\ProductModel;

class ReservationController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.reservation.';
        $this->controllerName     = 'reservation';
        $this->model              = new MainModel();
        $this->productModel       = new ProductModel();
        parent::__construct();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        $this->titlePage = 'Đặt phòng';
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field']  = $request->input('search_field', '');
        $this->params['search']['value']  = $request->input('search_value', '');
        $this->params['filter']['date']   = $request->input('filter_date','all');
        $items            = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsProduct     = $this->productModel->listItems(null,['task' => 'admin-list-items-in-select-box-for-reservation']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view($this->pathViewController . "index_list",[
            'params'           => $this->params,
            'items'            => $items,
            'itemsProduct'     => $itemsProduct,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage,
        ]);

    }
    public function calendar(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field']  = $request->input('search_field', '');
        $this->params['search']['value']  = $request->input('search_value', '');
        $this->params['filter']['room']   = $request->input('filter_room','all');
        $items            = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsProduct     = $this->productModel->listItems(null,['task' => 'admin-list-items-in-select-box-for-reservation']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view($this->pathViewController . "index_calendar",[
            'params'           => $this->params,
            'items'            => $items,
            'itemsProduct'     => $itemsProduct,
            'itemsStatusCount' => $itemsStatusCount,
            'titlePage'        => $this->titlePage,
        ]);

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
    public function changeRoom(Request $request)
    {
        $params['currentRoomId'] = $request->room_id;
        $params['id']            = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-room']);
        echo json_encode($result);
    }
    public function changeTypeBooking(Request $request)
    {
        $params['currentType'] = $request->type;
        $params['id']            = $request->id;
        $result = $this->model->saveItem($params, ['task' => 'change-type-booking']);
        echo json_encode($result);
    }
}
