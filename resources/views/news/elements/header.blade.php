@php
    use App\Models\MenuModel;
    use App\Models\CategoryArticleModel;
    use App\Models\CategoryProductModel;
    use App\Helpers\URL;
    use App\Helpers\Template;

    $menuModel     = new MenuModel();
    $itemsMenu     = $menuModel->listItems(null, ['task' => 'news-list-items']);
    $categoryModel = new CategoryArticleModel();
    $itemsCategory = $categoryModel->where('status', 'active')->withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toTree()->toArray();
    $categoryProductModel = new CategoryProductModel();
    $itemsCategoryProduct = $categoryProductModel->where('status', 'active')->withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toTree()->toArray();
    $xhtmlMenu = '';
    $xhtmlMenuMobile = '';

    if (count($itemsMenu) > 0) {
        $xhtmlMenu = '<nav class="main_nav">
                        <ul class="main_nav_list d-flex flex-row align-items-center justify-content-start">';
        $xhtmlMenuMobile = '<nav class="menu_nav"><ul class="menu_mm">';
        $categoryIdCurrent = Route::input('category_id');
        foreach ($itemsMenu as $item) {
            $link        = $item['link'];
            $classActive = ($categoryIdCurrent+1 == $item['id']) ? 'class="active"' : '';
            // $classActive = '';
            if($item['type_menu']  == 'category'){
                $xhtmlMenu .= sprintf('<li %s><a href="%s">%s <i class="fa fa-angle-down"></i></a>', $classActive, $link, $item['name']);
                $xhtmlMenu .= Template::recursiveMenu($itemsCategory);
                $xhtmlMenu .= '</li>';
            }else{
                $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a>', $classActive, $link, $item['name']);
            }

        }

        if (session('userInfo')) {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/logout'), 'Logout');
        }else {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/login'), 'Login');
        }
        $xhtmlMenu .= $xhtmlMenuUser . '</ul></nav>';
        $xhtmlMenuMobile .= $xhtmlMenuUser . '</ul></nav>';
    }

@endphp

<header class="header">

    <!-- Header Content -->
    <div class="header_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justfy-content-start">
                        <div class="logo_container">
                            <a href="{!! route('home') !!}">
                                <div class="logo"><span>ZEND</span>VN</div>
                            </a>
                        </div>
                        <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
                            <a href="#">
                                <div class="background_image" style="background-image:url({{asset('news/images/zendvn-online.png') }});background-size: contain"></div>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Navigation & Search -->
    <div class="header_nav_container" id="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">

                        <!-- Logo -->
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo"><span>ZEND</span>VN</div>
                            </a>
                        </div>

                        <!-- Navigation -->
                        {!! $xhtmlMenu !!}

                        <!-- Hamburger -->
                        <div class="hamburger ml-auto menu_mm"><i class="fa fa-bars  trans_200 menu_mm" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>

    {!! $xhtmlMenuMobile !!}


</div>
