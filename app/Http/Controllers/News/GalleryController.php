<?php

namespace App\Http\Controllers\News;
use App\Models\SettingModel;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryModel;
class GalleryController extends Controller
{
    private $pathViewController = 'hotel.pages.gallery.';
    private $controllerName     = 'gallery';
    private $folderImage        = [];
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('titlePage', 'Hình ảnh');
    }

    public function index(Request $request)
    {
        $nameFolder = config()->get('zvn.galleryFolder');
        $items = [];
        foreach ($nameFolder as $value) {
            $items[$value] = \File::allFiles(public_path("storage/$this->controllerName/$value"));
        }
        $breadcrumb[] = ['name' => 'Thư viện'];
        $mediaModel   = new GalleryModel();
        $itemsMedia      = $mediaModel->getItem(null, ['task'   => 'news-get-item']);
        return view($this->pathViewController .  'index', [
            'items' => $items,
            'breadcrumb'      => $breadcrumb,
            'itemsMedia'      => $itemsMedia
        ]);
    }


}
