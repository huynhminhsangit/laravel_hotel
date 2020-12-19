<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;

use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;

class ArticleController extends Controller
{
    private $pathViewController = 'hotel.pages.article.';  // slider
    private $controllerName     = 'article';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $params["article_id"]  = $request->article_id;
        $articleModel = new ArticleModel();
        $itemArticle  = $articleModel->getItem($params, ['task' => 'news-get-item']);
        if(empty($itemArticle))  return redirect()->route('home');
        $params["category_id"]  = $itemArticle['category_id'];

        $breadcrumb = CategoryArticleModel::defaultOrder()->withDepth()->having('depth', '>', 0)->ancestorsOf($params['category_id'])->toArray();
        $breadcrumb[] = CategoryArticleModel::find($params['category_id'])->toArray();
        $breadcrumb[] = ['name' => $itemArticle['name']];
        return view($this->pathViewController .  'index', [
            'params'     => $this->params,
            'items'      => $itemArticle,
            'titlePage'  => $itemArticle['name'],
            'breadcrumb' => $breadcrumb
        ]);
    }


}
