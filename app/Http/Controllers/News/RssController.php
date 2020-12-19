<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RssModel;
use App\Helpers\Feed;

class RssController extends Controller
{
    private $pathViewController = 'news.pages.rss.';  // slider
    private $controllerName     = 'rss';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $rssModel   = new RssModel();
        $itemsRss   = $rssModel->listItems(null, ['task'   => 'news-list-items']);
        if(empty($itemsRss))  return redirect()->route('home');
        return view($this->pathViewController .  'index', [
            'params'   => $this->params,
            'itemsRss' => $itemsRss,
        ]);
    }

    public function getGold(){
        echo json_encode(Feed::getGold(), JSON_UNESCAPED_UNICODE);
    }
    // public function getCoin(){
    //     echo json_encode(Feed::getCoin(), JSON_UNESCAPED_UNICODE);
    // }


}
