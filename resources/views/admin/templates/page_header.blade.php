@php
    $pageTitle = 'Quản lý ' . implode(' ',array_map('ucfirst',explode("-",$controllerName)));

    $pageButton= sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route($controllerName));
    if($pageIndex == false && !empty($page)){
        switch ($page) {
            case 'product':
            $pageButton= sprintf('<a id="submit-all" class="btn btn-info"><i class="fa fa-save"></i> Lưu và quay về</a>');
            $pageButton.= sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route($controllerName));
                break;
            case 'contact':
            case 'subscribe':
            case 'reservation':
            case 'tags':
                $pageButton= sprintf('');
                break;
        }
    }
    if($pageIndex == true) {
        $pageButton= sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>', route($controllerName . '/form'));
    }
@endphp
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>{{  $pageTitle }}</h3>
    </div>
    <div class="zvn-add-new pull-right">
        {!! $pageButton !!}
    </div>
</div>
