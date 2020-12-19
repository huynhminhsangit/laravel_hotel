<?php

namespace App\Http\Controllers\News;

use App\Models\ProductModel;
use App\Models\SettingModel;

use Illuminate\Http\Request;;

use App\Http\Controllers\Controller;
use App\Models\CategoryProductModel;

class ProductController extends Controller
{
    private $pathViewController = 'hotel.pages.product.';  // slider
    private $controllerName     = 'product';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $params["product_id"]  = $request->product_id;
        $productModel  = new ProductModel();
        $settingModel  = new SettingModel();
        $anotherRoom = $productModel->getItem($params, ['task' => 'get-other-item']);
        $itemProduct = $productModel->getItem($params, ['task' => 'news-get-item']);
        if (empty($itemProduct))  return redirect()->route('home');
        $arrMeta         = json_decode($itemProduct['meta'], true);
        $metaDescription = $arrMeta['description'];
        $metaKeyword     = implode(',', $arrMeta['keyword']);
        $metaTitle       = $arrMeta['title'];
        $itemsSetting    = $settingModel->listItems(null, ['task' => 'news-list-items']);
        $params["category_id"]  = $itemProduct['category_id'];
        $arrBreadcrumb = CategoryProductModel::defaultOrder()->withDepth()->having('depth', '>', 0)->ancestorsOf($params['category_id'])->toArray();
        $arrBreadcrumb[] = CategoryProductModel::find($params['category_id'])->toArray();
        $itemProduct['breadcrumb']       = $arrBreadcrumb;
        $itemProduct['related_products'] = $productModel->listItems($params, ['task' => 'news-list-items-related-in-category']);
        $tmpBreadcrumb = [
            'name' => 'Phòng Nghỉ',
            'link' => route('category-product/index')
        ];
        $breadcrumb[] = $tmpBreadcrumb;
        $breadcrumb[] = ['name' => $itemProduct['name']];
        return view($this->pathViewController .  'index', [
            'params'          => $this->params,
            'titlePage'       => $itemProduct['name'],
            'breadcrumb'      => $breadcrumb,
            'itemProduct'     => $itemProduct,
            'itemsSetting'    => $itemsSetting,
            'anotherRoom'     => $anotherRoom,
            'metaDescription' => $metaDescription,
            'metaKeyword'     => $metaKeyword,
            'metaTitle'       => $metaTitle,

        ]);
    }
}
