<?php

namespace App\Http\Controllers\News;

use App\Models\SettingModel;
use App\Models\SubscribeModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{

    private $pathViewController = 'hotel.pages.subscribe.';
    private $controllerName     = 'subscribe';
    private $params             = [];
    private $subscribeModel;
    private $settingModel;
    public function __construct()
    {
        $this->subscribeModel = new SubscribeModel();
        $this->settingModel = new SettingModel();
        view()->share('controllerName', $this->controllerName);
    }
    public function save(Request $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $params['id'] = 2; // email save in key 2
            $settingEmail = $this->settingModel->getItem($params, ['task' => 'get-item']);
            $email  = json_decode($settingEmail['value'], true);
            $task   = "add-item";
            $notify = config('zvn.config.notify_frontend.subscribe');
            $details = [
                'to'       => $params['email'],
                'subject'  => config('zvn.config.subject_email.default'),
            ];
            $templateMail = 'subscribe-email';
            Mail::to($params['email'])->send(new Mailer($details, $templateMail));
            if (Mail::failures()) {
                return redirect()->route($this->controllerName . '/index')->with("news_notify", $notify);
            } else {
                $result = $this->subscribeModel->saveItem($params, ['task' => $task]);
                echo json_encode($result);
                // return redirect()->route($this->controllerName . '/index')->with("news_notify", $notify);
                // return redirect()->route('home');
            }
        }
    }
}
