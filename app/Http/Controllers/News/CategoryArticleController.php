<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;

class CategoryArticleController extends Controller
{
    private $pathViewController = 'hotel.pages.category_article.';  // slider
    private $controllerName     = 'category-article';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        $this->params["pagination"]["totalItemsPerPage"] = 3;
    }

    public function index(Request $request)
    {
        $articleModel = new ArticleModel();
        if(!empty($request->category_name) && !empty($request->category_id)) {
            $this->params['category_id'] = $request->category_id;
            $items = $articleModel->listItems($this->params,['task' => 'news-list-article-in-category']);
            if(empty($items)) {
               return redirect()->route('home');
            }
            $titlePage = $items[0]['category_name'];
            $tmpBreadcrumb = [
                'name' => 'Tin tức',
                'link' => route('category-article/index')
            ];
            $breadcrumb = CategoryArticleModel::defaultOrder()->withDepth()->having('depth', '>', 0)->ancestorsOf($this->params['category_id'])->toArray();
            array_unshift($breadcrumb,$tmpBreadcrumb);
            $breadcrumb[] = ['name' => $items[0]['category_name']];
        } else {
            $items     = $articleModel->listItems($this->params,['task' => 'news-list-items-latest']);
            $titlePage = 'Tin tức';
            $breadcrumb[] = ['name' => 'Tin tức'];
        }
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'items'         => $items,
            'titlePage'     => $titlePage,
            'breadcrumb'    => $breadcrumb
        ]);
    }


}
