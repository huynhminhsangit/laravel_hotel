<?php

namespace App\Http\Controllers\News;
use App\Models\SettingModel;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\FaqModel as MainModel;
class FaqController extends Controller
{
    private $pathViewController = 'hotel.pages.faq.';
    private $controllerName     = 'faq';
    private $folderImage        = [];
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('titlePage', 'Faq');
        $this->model              = new MainModel();
    }

    public function index(Request $request)
    {
      
        $items = $this->model->getItem(null,['task' => 'get-all-item']);
        $breadcrumb[] = ['name' => 'Faq'];
     
        return view($this->pathViewController .  'index', [
            'items' => $items,
            'breadcrumb'      => $breadcrumb,
        ]);
    }


}
