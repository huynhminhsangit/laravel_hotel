<?php

namespace App\Http\Controllers\News;

use App\Mail\Mailer;
use Illuminate\Support\Str;
use App\Http\Requests\ReservationRequest as MainRequest;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\ProductModel;
use DB;
use App\Models\ReservationModel as MainModel;

class ReservationController extends Controller
{
    private $pathViewController = 'hotel.pages.reservation.';  // slider
    private $controllerName     = 'reservation';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        $this->model = new MainModel();
        $this->settingModel = new SettingModel();
    }

    public function confirm(MainRequest $request)
    {
        $params          = $request->all();
        if(isset($params['room'])) {
            $room = explode('|',$params['room']);
            $params['room_id'] = $room[0];
            $params['room_name'] = $room[1];
            $params['room_price'] = DB::table('product')->where('id',$params['room_id'])->first()->price;
        }
        $params['check_in']    = date('Y-m-d',strtotime($params['check_in']));
        $params['check_out']    = date('Y-m-d',strtotime($params['check_out']));
        $itemsSetting    = $this->settingModel->listItems(null, ['task'   => 'news-list-items']);
        $arrMeta         = json_decode($itemsSetting[3]['value'], true);
        $metaDescription = $arrMeta['meta_description'];
        $metaKeyword     = $arrMeta['meta_keyword'];
        
        return view($this->pathViewController .  'index', [
            'params'          => $params,
            'titlePage'       => 'Đặt phòng',
            'metaDescription' => $metaDescription,
            'metaKeyword'     => $metaKeyword,
            'metaTitle'       => 'Sky Luxury Hotel & Resort',
        ]);
    }
    public function save(Request $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $emailKey['id'] = 2; // email save in key 2
            $settingEmail = $this->settingModel->getItem($emailKey, ['task' => 'get-item']);
            $email  = json_decode($settingEmail['value'], true);
            $task   = "add-item";
            $notify = config('zvn.config.notify_frontend.success');
            $params['code'] = Str::random(10);
            $details = [
                'to'               => $params['email'],
                'subject'          => config('zvn.template.email_subject.email_reservation') . $params['fullname'],
                'reservation_code' => $params['code'],
                'fullname'         => $params['fullname'],
                'email'            => $params['email'],
                'phone'            => $params['phone'],
                'check_in'         => $params['check_in'],
                'check_out'        => $params['check_out'],
                'room_name'        => $params['room_name'],
                'price'            => $params['price'],
                'time_check_in'    => '12:00 PM',
                'note'             => $params['note'],
                'bcc'              => $email['bcc']
            ];
            $templateMail = 'reservation-confirm-email';
            Mail::to($params['email'])->send(new Mailer($details, $templateMail));
            if (Mail::failures()) {
                return redirect()->route($this->controllerName . '/index')->with("news_notify", $notify);
            } else {
                $this->model->saveItem($params, ['task' => $task]);
                return redirect()->route('notify/success');
            }
        }
    }
    public function checkAvailable() {
        $params = request()->all();
        $params['check_in']    = date('Y-m-d',strtotime($params['check_in']));
        $params['check_out']    = date('Y-m-d',strtotime($params['check_out']));
        if($params['check_out'] <= $params['check_in']) {
            return redirect()->route('home')->with('errorNotify','Ngày đi không hợp lệ');
        }
        $params['id'] = $this->model->checkAvaibleRoom($params,null);
        $productModel = new ProductModel();
        $itemsProduct = $productModel->getItem(null,['task' => 'get-all-items']);
        $breadcrumb[] = ['name' => 'Chọn phòng'];
        return view($this->pathViewController .  'choose_room', [
            'params' => $params,
            'itemsProduct' => $itemsProduct,
            'titlePage'       => 'Chọn Phòng',
            'breadcrumb'      => $breadcrumb
        ]);
    }
}
