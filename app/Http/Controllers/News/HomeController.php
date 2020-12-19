<?php

namespace App\Http\Controllers\News;
use App\Models\ReviewModel;
use App\Models\SliderModel;

use App\Models\GalleryModel;
use App\Models\ProductModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $pathViewController = 'hotel.pages.home.';
    private $controllerName     = 'home';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $sliderModel  = new SliderModel();
        $productModel = new ProductModel();
        $reviewModel  = new ReviewModel();
        $mediaModel   = new GalleryModel();
        $settingModel = new SettingModel();

        $itemsSlider     = $sliderModel->listItems(null, ['task'   => 'news-list-items']);
        $itemsProduct    = $productModel->listItems(null, ['task'   => 'news-list-items-section-rooms']);
        $itemsReview     = $reviewModel->listItems(null, ['task'   => 'news-list-items-section-review-home-page']);
        $itemsMedia      = $mediaModel->getItem(null, ['task'   => 'news-get-item']);
        $itemsSetting    = $settingModel->listItems(null, ['task'   => 'news-list-items']);
        $arrMeta         = json_decode($itemsSetting[3]['value'], true);
        $metaDescription = $arrMeta['meta_description'];
        $metaKeyword     = $arrMeta['meta_keyword'];
        // $metaTitle       = $arrMeta['title'];
        // echo '<pre style="color: red;">';
        // print_r($itemsProduct);
        // echo '</pre>';
        // $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-is-home']);
        // foreach ($itemsCategory as $key => $category)
        //     $itemsCategory[$key]['articles'] = $articleModel->listItems(['category_id' => $category['id']], ['task' => 'news-list-items-in-category']);
        $nameFolder = config()->get('zvn.galleryFolder');
        $itemsGallery = [];
        foreach ($nameFolder as $key => $value) {
            $itemsGallery[$value] = \File::allFiles(public_path("storage/gallery/$value"));
        }
        return view($this->pathViewController .  'index', [
            'params'          => $this->params,
            'itemsSlider'     => $itemsSlider,
            'itemsProduct'    => $itemsProduct,
            'itemsReview'     => $itemsReview,
            'itemsGallery'    => $itemsGallery,
            'itemsMedia'      => $itemsMedia,
            'metaDescription' => $metaDescription,
            'metaKeyword'     => $metaKeyword,
            'metaTitle'       => 'Sky Luxury Hotel & Resort',
            'titlePage'       => 'Trang chủ',
        ]);
    }


}
