<?php

namespace App\Http\Controllers\News;
use App\Models\ProductModel;

use App\Models\SettingModel;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;
use App\Models\CategoryProductModel;

class CategoryProductController extends Controller
{
    private $pathViewController = 'hotel.pages.category_product.';  // slider
    private $controllerName     = 'category-product';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $productModel  = new ProductModel();
        $itemsProduct  = $productModel->getItem(null,['task' => 'get-all-items']);
        $breadcrumb[] = ['name' => 'Phòng Nghỉ'];
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'breadcrumb' => $breadcrumb,
            'titlePage'  => 'Phòng Nghỉ',
            'itemsProduct'  => $itemsProduct,
            // 'itemsSetting'   => $itemsSetting
        ]);
    }


}
