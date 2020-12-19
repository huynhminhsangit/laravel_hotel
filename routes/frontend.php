<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$prefixNews  = config('zvn.url.prefix_news');


Route::group(['prefix' => $prefixNews, 'namespace' => 'News'], function () {
    // ============================== HOMEPAGE ==============================
    $prefix         = '';
    $controllerName = 'home';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    });

    // ============================== CATEGORY ARTICLE ==============================
    $prefix         = 'tin-tuc';
    $controllerName = 'category-article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst',explode("-",$controllerName)))  . 'Controller@';
        Route::get('/{category_name?}-{category_id?}',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
        ->where('category_name', '[a-zA-Z_-]+')
        ->where('category_id', '[0-9]+');
    });
    // ============================== TAGS ==============================
    $prefix         = 'tags';
    $controllerName = 'tags';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/{tags_name}-{tags_id}',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])->where('tags_name', '[0-9a-zA-Z_-]+')
        ->where('tags_id', '[0-9]+');
    });
    // ====================== ARTICLE ========================
    $prefix         = '';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/{article_name}-{article_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
                ->where('article_name', '[0-9a-zA-Z_-]+')
                ->where('article_id', '[0-9]+');
    });
    // ============================== CATEGORY PRODUCT ==============================
    $prefix         = 'phong-nghi';
    $controllerName = 'category-product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst',explode("-",$controllerName)))  . 'Controller@';
        Route::get('/',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        // ====================== PRODUCT ========================
        $prefix         = '';
        $controllerName = 'product';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/{product_name}-{product_id}',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
                    ->where('product_name', '[0-9a-zA-Z_-]+')
                    ->where('product_id', '[0-9]+');
        });
    });


    // ============================== NOTIFY ==============================
    $prefix         = '';
    $controllerName = 'notify';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/not-found',                             [ 'as' => $controllerName . '/notFound',                  'uses' => $controller . 'notFound' ]);
        Route::get('/maintenance',                             [ 'as' => $controllerName . '/maintenance',                  'uses' => $controller . 'maintenance' ]);
        Route::get('/no-permission',                             [ 'as' => $controllerName . '/noPermission',                  'uses' => $controller . 'noPermission' ]);
        Route::get('/success',                             [ 'as' => $controllerName . '/success',                  'uses' => $controller . 'success' ]);
    });

    // ====================== LOGIN ========================
    // news69/login
    $prefix         = '';
    $controllerName = 'auth';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/login',        ['as' => $controllerName.'/login',      'uses' => $controller . 'login'])->middleware('check.login');;
        Route::post('/postLogin',   ['as' => $controllerName.'/postLogin',  'uses' => $controller . 'postLogin']);

        // ====================== LOGOUT ========================
        Route::get('/logout',       ['as' => $controllerName.'/logout',     'uses' => $controller . 'logout']);
    });
    // ============================== CATEGORY ==============================
    $prefix         = 'tin-tuc-tong-hop';
    $controllerName = 'rss';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/index',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ]);
        Route::get('/get-gold',  [ 'as' => $controllerName . '/getGold', 'uses' => $controller . 'getGold' ]);
        // Route::get('/get-gold',  return '123')->name($controller . 'getGold');
        Route::get('/get-coin',  [ 'as' => $controllerName . '/getCoin', 'uses' => $controller . 'getCoin' ]);
    });
    // ============================== CONTACT ==============================
    $prefix         = 'lien-he';
    $controllerName = 'contact';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',             [ 'as' => $controllerName .'/index', 'uses' => $controller . 'index' ]); // route contact/index
        Route::post('/save',        [ 'as' => $controllerName . '/save', 'uses' => $controller . 'save' ]);
    });
    // ============================== SUBSCRIBE ==============================
    $prefix         = 'dang-ky';
    $controllerName = 'subscribe';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::post('/save',        [ 'as' => $controllerName . '/save', 'uses' => $controller . 'save' ]);
    });
    // ============================== ABOUT US ==============================
    $prefix         = 've-chung-toi';
    $controllerName = 'about-us';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst',explode("-",$controllerName)))  . 'Controller@';
        Route::get('/',             [ 'as' => $controllerName .'/index', 'uses' => $controller . 'index' ]);
    });
    // ============================== FAQ ==============================
    $prefix         = 'faq';
    $controllerName = 'faq';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst',explode("-",$controllerName)))  . 'Controller@';
        Route::get('/',             [ 'as' => $controllerName .'/index', 'uses' => $controller . 'index' ]);
    });
    // ============================== Gallery ==============================
    $prefix         = 'thu-vien';
    $controllerName = 'gallery';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/{video?}',             [ 'as' => $controllerName .'/index', 'uses' => $controller . 'index' ])->where('video', 'video');
    });
    // ============================== RESERVATION ==============================
    $prefix         = 'dat-phong';
    $controllerName = 'reservation';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst',explode("-",$controllerName)))  . 'Controller@';
        Route::post('/step-check-available',             [ 'as' => $controllerName .'/checkAvailable',   'uses' => $controller . 'checkAvailable' ]);
        Route::post('/step-choose-room',                 [ 'as' => $controllerName .'/chooseRoom',       'uses' => $controller . 'chooseRoom' ]);
        Route::post('/step-reservation',                 [ 'as' => $controllerName .'/reservation',      'uses' => $controller . 'reservation' ]);
        Route::post('/step-confirm',                     [ 'as' => $controllerName .'/confirm',          'uses' => $controller . 'confirm' ]);
        Route::post('/step-save',                       [ 'as' => $controllerName .'/save',          'uses' => $controller . 'save' ]);
    });
    // ============================== ERROR ==============================
    $prefix         = '';
    $controllerName = 'error';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('{error}',                             ['as' => 'frontend/404',                              'uses' => $controller . 'notfound'])->where('error', '.+');
    });
});

// bai-viet/suc-khoe-3.php

