
@if($item['display'] == 'list')
    @include('news.pages.category_nested.child-index.category_list')
@elseif($item['display'] == 'grid')
    @include('news.pages.category_nested.child-index.category_grid')
@endif


