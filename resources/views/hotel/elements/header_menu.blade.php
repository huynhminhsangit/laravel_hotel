@php
    use App\Models\MenuModel;
    use App\Models\CategoryProductModel;
    use App\Models\ProductModel;
    use App\Models\CategoryArticleModel;
    use App\Helpers\URL;
    use App\Helpers\Template;
    use Illuminate\Support\Facades\Route;

    $menuModel  = new MenuModel();
    $itemsMenu = $menuModel->where('status', 'active')->defaultOrder()->get()->toTree()->toArray();
    $xhtmlMenu = '';
    if (count($itemsMenu) > 0) {
        $xhtmlMenu = '<ul class="nav navbar-nav navbar-right">';
        foreach ($itemsMenu[0]['children'] as $item) {
            $arrow = '';
            if(!empty($item['children']) || $item['type_menu'] == 'article' || $item['type_menu'] == 'product') {
                $arrow = '<b class="caret"></b>';
            }
            $link = $item['link'];
             // call show toastr warning replace redirect page maintenance
             $callFuncToastWarning = null;
             if(strpos($link,'maintenance')){
                $link = 'javascript:void(0)';
                $callFuncToastWarning = 'onclick="showMaintenanceNotify()"';
            }
            $xhtmlMenu .= sprintf('<li class="dropdown"><a href="%s" %s title="%s" target="%s">%s %s</a>', $link, $callFuncToastWarning, $item['name'], $item['type_open'], $item['name'], $arrow);
                if($item['type_menu'] == 'article') {
                    $categoryArticleModel = new CategoryArticleModel();
                    $itemsArticleMenu = $categoryArticleModel->where('status', 'active')->defaultOrder()->get()->toTree()->toArray();
                    $xhtmlMenu .= Template::recursiveMenu($itemsArticleMenu[0]['children'],'article');
                }
                if($item['type_menu'] == 'product') {
                    $productModel = new ProductModel();
                    $itemsProduct = $productModel->getItem(null, ['task' => 'menu-list-item']);
                    $xhtmlMenu .= Template::recursiveMenu($itemsProduct,'product');
                }
                if($item['children']) {
                    $xhtmlMenu .= Template::recursiveMenu($item['children']);
                }
            $xhtmlMenu .= '</li>';
        }
        $xhtmlMenu .= '</ul>';
    }
    $general = json_decode($itemsSetting[0]['value'], true);
    $logo    = json_decode($general['logo'], true);
@endphp
<!-- MENU-HEADER -->
<div class="menu-header">
    @php
        $bgMenu = (request()->path() == '/') ? '' : 'bg-menu';
    @endphp
    <nav class="navbar navbar-fixed-top {{ $bgMenu }}">
        <div class="container">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar "></span>
                    <span class="icon-bar "></span>
                    <span class="icon-bar "></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}" title="Skyline"><img src="{{ asset('images/setting').'/'.$logo['logo_top'] }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse">
                {!! $xhtmlMenu !!}
            </div>
        </div>
    </nav>
</div>
<!-- END / MENU-HEADER -->
