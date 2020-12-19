<?php

namespace App\Http\Controllers\News;
use App\Models\ArticleModel;
use App\Models\SettingModel;

use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;

class NotifyController extends Controller
{
    private $pathViewController = 'hotel.pages.notify.';  // slider
    private $controllerName     = 'notify';
    private $folderImage;
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function notFound(Request $request)
    {
        $folderImage = 'notice';
        $titlePage = 'Không tìm thấy';
        return view($this->pathViewController .  'not-found', compact('folderImage', 'titlePage'));
    }
    public function maintenance(Request $request)
    {
        $folderImage = 'notice';
        $titlePage = 'Bảo trì';
        return view($this->pathViewController .  'maintenance', compact('folderImage', 'titlePage'));
    }
    public function success(Request $request)
    {
        $folderImage     = 'notice';
        $titlePage       = 'Đặt chỗ thành công';
        $settingModel     = new SettingModel();
        $itemsSetting    = $settingModel->listItems(null, ['task'   => 'news-list-items']);
        $arrMeta         = json_decode($itemsSetting[3]['value'], true);
        $metaDescription = $arrMeta['meta_description'];
        $metaKeyword     = $arrMeta['meta_keyword'];
        $metaTitle       = 'Sky Luxury Hotel & Resort';
        return view($this->pathViewController .  'success', compact('folderImage', 'titlePage', 'metaDescription', 'metaKeyword', 'metaTitle'));
    }

}
