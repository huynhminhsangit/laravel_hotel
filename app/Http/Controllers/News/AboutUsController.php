<?php

namespace App\Http\Controllers\News;
use App\Models\SettingModel;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;
use App\Models\CategoryArticleModel;

class AboutUsController extends Controller
{
    private $pathViewController = 'hotel.pages.about_us.';
    private $controllerName     = 'about-us';
    private $folderImage        = [];
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('titlePage', 'Về chúng tôi');
    }

    public function index(Request $request)
    {
        $folderImage     = ['section_about_us' => 'setting', 'section_team_member' => 'employee'];
        $employeeModel   = new EmployeeModel();
        $settingModel    = new SettingModel();
        $itemsSetting    = $settingModel->listItems(null, ['task'   => 'news-list-items']);
        $arrMeta         = json_decode($itemsSetting[3]['value'], true);
        $metaDescription = $arrMeta['meta_description'];
        $metaKeyword     = $arrMeta['meta_keyword'];
        $itemsEmployee   = $employeeModel->listItems(null, ['task'   => 'news-list-items']);
        return view($this->pathViewController .  'index', [
            'params'          => $this->params,
            'itemsEmployee'   => $itemsEmployee,
            'folderImage'     => $folderImage,
            'metaDescription' => $metaDescription,
            'metaKeyword'     => $metaKeyword,
            'metaTitle'       => 'Sky Luxury Hotel & Resort',
        ]);
    }


}
