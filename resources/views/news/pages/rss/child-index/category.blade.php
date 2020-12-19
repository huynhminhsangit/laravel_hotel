@foreach ($itemsRss as $item)
    @if ($item['type_source'] == 'vnexpress')
       @include('news.pages.rss.child-index.vnexpress')
    @elseif($item['type_source'] == 'cafebiz')
        @include('news.pages.rss.child-index.cafebiz')
    @endif
@endforeach





