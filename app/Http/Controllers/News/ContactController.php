<?php

namespace App\Http\Controllers\News;

use App\Mail\Mailer;
use App\Models\ContactModel;

use App\Models\SettingModel;
use Illuminate\Http\Request;;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private $pathViewController = 'hotel.pages.contact.';  // slider
    private $controllerName     = 'contact';
    private $params             = [];
    private $contactModel;
    private $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->contactModel = new ContactModel();
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $itemsSetting   = $this->settingModel->listItems(null, ['task' => 'news-list-items']);
        $email          = json_decode($itemsSetting[1]['value'],true);
        $contactSetting = json_decode($itemsSetting[0]['value'], true);
        $contactSetting['map'] = json_decode($itemsSetting[4]['value'], true);
        $contactSetting['map'] = $contactSetting['map']['map'];
        $breadcrumb[] = ['name' => 'Liên Hệ'];
        $itemsSetting = $this->settingModel->listItems(null, ['task'   => 'news-list-items']);
        $arrMeta         = json_decode($itemsSetting[3]['value'], true);
        $metaDescription = $arrMeta['meta_description'];
        $metaKeyword     = $arrMeta['meta_keyword'];
        return view($this->pathViewController .  'index', [
            'params'         => $this->params,
            'itemsSetting'   => $itemsSetting,
            'breadcrumb'     => $breadcrumb,
            'contactSetting' => $contactSetting,
            'titlePage'      => 'Liên Hệ',
            'email'          => $email,
            'metaDescription' => $metaDescription,
            'metaKeyword'     => $metaKeyword,
            'metaTitle'       => 'Sky Luxury Hotel & Resort',
        ]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'email',
        ]);
        if ($request->method() == 'POST') {
            $params = $request->all();
            $emailKey['id'] = 2; // email save in key 2
            $settingEmail = $this->settingModel->getItem($emailKey, ['task' => 'get-item']);
            $email  = json_decode($settingEmail['value'], true);
            $task   = "add-item";
            $notify = config('zvn.config.notify_frontend.success');
            $details = [
                'to'       => $params['email'],
                'subject'  => config('zvn.template.email_subject.email_contact') . $params['fullname'],
                'fullname' => $params['fullname'],
                'phone'    => $params['phone'],
                'message'  => $params['message'],
                'bcc'      => $email['bcc']
            ];
            $templateMail = 'contact-email';
            Mail::to($params['email'])->send(new Mailer($details, $templateMail));
            if (Mail::failures()) {
                return redirect()->route($this->controllerName . '/index')->with("news_notify", $notify);
            } else {
                $this->contactModel->saveItem($params, ['task' => $task]);
                return redirect()->route($this->controllerName . '/index')->with("news_notify", $notify);
            }
        }
    }
}
