<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class TagsController extends Controller
{
    private $pathViewController = 'hotel.pages.tags.';  // slider
    private $controllerName     = 'tags';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $tags_id = (int)$request->tags_id;
        
        $titlePage = 'Tags';
        $items = DB::table('article as a')->join('category_article as c', 'a.category_id', '=', 'c.id')->select('c.name as category_name','a.*')->whereJsonContains('tags_id',$tags_id)->get()->toArray();
        $items = json_decode(json_encode($items), true);
        $this->params['tags_name'] = DB::table('tags')->where('id',$tags_id)->first()->name;
        $this->params['tags_count'] = count($items);
        $breadcrumb[] = ['name' => 'Tags'];
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'items'         => $items,
            'titlePage'     => $titlePage,
            'breadcrumb'    => $breadcrumb
        ]);
    }


}
