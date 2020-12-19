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

$prefixAdmin = config('zvn.url.prefix_admin');

Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => ['permission.admin']], function () {
    // ============================== LARAVEL FILE MANAGER ==============================
    Route::group(['prefix' => 'laravel-file-manager'], function () {
        \Mafftor\LaravelFileManager\Lfm::routes();
    });

    // ============================== ERROR ==============================
    $prefix         = 'error';
    $controllerName = 'error';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('404',                             ['as' => 'backend/404',                              'uses' => $controller . 'notfound']);
    });
    // ============================== DASHBOARD ==============================
    $prefix         = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             ['as' => $controllerName,                      'uses' => $controller . 'index']);
    });

    // ============================== SLIDER ==============================
    $prefix         = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });

    // ============================== CATEGORY FAQ==============================
    $prefix         = 'category-faq';
    $controllerName = 'category-faq';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst', explode("-", $controllerName)))  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{type}/{id}',       ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-is-home-{isHome}/{id}',      ['as' => $controllerName . '/isHome',      'uses' => $controller . 'isHome'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}',     ['as' => $controllerName . '/display',     'uses' => $controller . 'display'])->where('id', '[0-9]+');;
    });

    // ============================== ARTICLE ==============================
    $prefix         = 'article';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-type-{type}/{id}',           ['as' => $controllerName . '/type',        'uses' => $controller . 'type']);
    });

    // ============================== USER ==============================
    $prefix         = 'user';
    $controllerName = 'user';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                              'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',                    'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',                    'uses' => $controller . 'save']);
        Route::post('change-password',                  ['as' => $controllerName . '/change-password',         'uses' => $controller . 'changePassword']);
        Route::post('change-level',                     ['as' => $controllerName . '/change-level',            'uses' => $controller . 'changeLevel']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',                  'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',                  'uses' => $controller . 'status']);
        Route::get('change-level-{level}/{id}',         ['as' => $controllerName . '/level',                   'uses' => $controller . 'level']);
    });
    // ============================== MENU ==============================
    $prefix         = 'menu';
    $controllerName = 'menu';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{type}/{id}',       ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-type-menu-{typeMenu}/{id}',  ['as' => $controllerName . '/type_menu',    'uses' => $controller . 'typeMenu'])->where('id', '[0-9]+');
        Route::get('change-type-open-{typeOpen}/{id}',  ['as' => $controllerName . '/type_open',    'uses' => $controller . 'typeOpen'])->where('id', '[0-9]+');
    });
    // ============================== RSS ==============================
    $prefix         = 'rss';
    $controllerName = 'rss';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-type-source-{type_source}/{id}',  ['as' => $controllerName . '/type_source',      'uses' => $controller . 'source'])->where('id', '[0-9]+');
    });

    // ============================== SETTING ==============================
    $prefix         = 'setting';
    $controllerName = 'setting';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                     ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::post('save',                                 ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('change-{setting_email}/{id?}',          ['as' => $controllerName . '/email',       'uses' => $controller . 'email'])->where('id', '[0-9]+');
        Route::post('change-{setting_general}/{id?}',       ['as' => $controllerName . '/general',     'uses' => $controller . 'general'])->where('id', '[0-9]+');
        // Route::get('change-{setting_social}/{id?}',         [ 'as' => $controllerName . '/social',      'uses' => $controller . 'social'])->where('id', '[0-9]+');
    });

    // ============================== CONTACT ==============================
    $prefix         = 'contact';
    $controllerName = 'contact';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
    // ============================== SUBSCRIBE ==============================
    $prefix         = 'subscribe';
    $controllerName = 'subscribe';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
    // ============================== TAGS ==============================
    $prefix         = 'tags';
    $controllerName = 'tags';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
    });
    // ============================== LOG ==============================
    // $prefix         = 'xem-loi';
    // Route::group(['prefix' =>  $prefix, 'namespace' => '\Arcanedev\LogViewer\Http\Controllers'], function () use ($prefix) {
    //     Route::get('/',                        'LogViewerController@index')->name($prefix . '::dashboard');
    //     Route::get('/list',                    'LogViewerController@listLogs')->name($prefix . '::logs.list');
    //     Route::delete('/delete',               'LogViewerController@delete')->name($prefix . '::logs.delete');
    //     Route::get('/{date}',                  'LogViewerController@show')->name($prefix . '::logs.show');
    //     Route::get('/{date}/download',         'LogViewerController@download')->name($prefix . '::logs.download');
    //     Route::get('/{date}/{level}',          'LogViewerController@showByLevel')->name($prefix . '::logs.filter');
    //     Route::get('/{date}/{level}/search',   'LogViewerController@search')->name($prefix . '::logs.search');
    // });
    // ============================== CATEGORY ARTICLE ==============================
    $prefix         = 'category-article';
    $controllerName = 'category-article';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst', explode("-", $controllerName)))  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{type}/{id}',       ['as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-is-footer-{isFooter}/{id}',  ['as' => $controllerName . '/isFooter',    'uses' => $controller . 'isFooter'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}',     ['as' => $controllerName . '/display',     'uses' => $controller . 'display'])->where('id', '[0-9]+');;
    });
    // ============================== CATEGORY PRODUCT  ==============================
    $prefix         = 'category-product';
    $controllerName = 'category-product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst', explode("-", $controllerName)))  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{type}/{id}',       ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-is-home-{isHome}/{id}',      ['as' => $controllerName . '/isHome',      'uses' => $controller . 'isHome'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}',     ['as' => $controllerName . '/display',     'uses' => $controller . 'display'])->where('id', '[0-9]+');;
    });

    // ============================== PRODUCT ==============================
    $prefix         = 'product';
    $controllerName = 'product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                             ['as' => $controllerName,                       'uses' => $controller . 'index']);
        Route::get('form/{id?}',                                    ['as' => $controllerName . '/form',             'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                                         ['as' => $controllerName . '/save',             'uses' => $controller . 'save']);
        Route::post('storeMedia',                                   ['as' => $controllerName . '/storeMedia',       'uses' => $controller . 'storeMedia']);
        Route::post('deleteMedia',                                  ['as' => $controllerName . '/deleteMedia',       'uses' => $controller . 'deleteMedia']);
        Route::get('delete/{id}',                                   ['as' => $controllerName . '/delete',           'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',                   ['as' => $controllerName . '/status',           'uses' => $controller . 'status']);
        Route::get('change-type-{type}/{id}',                       ['as' => $controllerName . '/type',             'uses' => $controller . 'type']);
        Route::post('addFormAttr',                                   ['as' => $controllerName . '/addFormAttr',      'uses' => $controller . 'addFormAttr']);
        Route::get('change-category-{category_id}/{id}',            ['as' => $controllerName . '/changeCategory',   'uses' => $controller . 'changeCategory']);
    });

    // ============================== GROUP ATTRIBUTE ==============================
    $prefix         = 'group-attribute';
    $controllerName = 'group-attribute';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst', explode("-", $controllerName)))  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== ATTRIBUTE ==============================
    $prefix         = 'attribute';
    $controllerName = 'attribute';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                           'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',                 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',                 'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',               'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',               'uses' => $controller . 'status']);
        Route::get('change-price-{status}/{id}',        ['as' => $controllerName . '/change-price-status',  'uses' => $controller . 'changePriceStatus']);
        Route::get('change-type-{type}/{id}',           ['as' => $controllerName . '/type',                 'uses' => $controller . 'type']);
        Route::get('showAttribute',                     ['as' => $controllerName . '/showAttribute',        'uses' => $controller . 'showAttribute']);
    });

    // ============================== COUPON ==============================
    $prefix         = 'coupon';
    $controllerName = 'coupon';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        // Route::get('change-type-{type}/{id}',           ['as' => $controllerName . '/type',        'uses' => $controller . 'type']);
    });
    // ============================== FEESHIP ==============================
    $prefix         = 'feeship';
    $controllerName = 'feeship';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
    // ============================== CHANGE PASSWORD ==============================
    $prefix         = 'change-password';
    $controllerName = 'change-password';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = implode(array_map('ucfirst', explode("-", $controllerName)))  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'changePassword']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
    // ============================== FAQ ==============================
    $prefix         = 'faq';
    $controllerName = 'faq';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-category-{category}/{id}',  ['as' => $controllerName . '/category',    'uses' => $controller . 'category'])->where('id', '[0-9]+');
    });
    // ============================== REVIEW ==============================
    $prefix         = 'review';
    $controllerName = 'review';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-product-{product}/{id}',     ['as' => $controllerName . '/product',    'uses' => $controller . 'product'])->where('id', '[0-9]+');
        Route::get('change-star-{star}/{id}',           ['as' => $controllerName . '/star',    'uses' => $controller . 'star'])->where('id', '[0-9]+');
    });
    // ============================== GALLERY ==============================
    $prefix         = 'gallery';
    $controllerName = 'gallery';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('picture',                                 ['as' => $controllerName . '/picture',                  'uses' => $controller . 'picture']);
        Route::get('video',                                 ['as' => $controllerName . '/video',                  'uses' => $controller . 'video']);
    });

    // ============================== EMPLOYEE ==============================
    $prefix         = 'employee';
    $controllerName = 'employee';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                  'uses' => $controller . 'index']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       ['as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   ['as' => $controllerName . '/ordering',     'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });

    // ============================== RESERVATION ==============================
    $prefix         = 'reservation';
    $controllerName = 'reservation';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 ['as' => $controllerName,                           'uses' => $controller . 'index']);
        Route::get('calendar',                          ['as' => $controllerName . '/calendar',             'uses' => $controller . 'calendar']);
        Route::get('form/{id?}',                        ['as' => $controllerName . '/form',                 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             ['as' => $controllerName . '/save',                 'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       ['as' => $controllerName . '/delete',               'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-type-booking-{type}/{id}',   ['as' => $controllerName . '/changeTypeBooking',    'uses' => $controller . 'changeTypeBooking'])->where('id', '[0-9]+');
        Route::get('change-room-{room_id}/{id}',        ['as' => $controllerName . '/changeRoom',           'uses' => $controller . 'changeRoom'])->where('id', '[0-9]+');
    });
});
