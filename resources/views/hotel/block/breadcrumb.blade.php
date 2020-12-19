@php
    use App\Helpers\URL;
@endphp
<a href="{!! route('home')!!}" style="color:#fff">Trang chủ</a> /
@if (!empty($breadcrumb))
    @foreach ($breadcrumb as $key => $value)
        @if ($key === array_key_last($breadcrumb))
            <span>{{$value['name']}}</span>
        @else
            @php
                if(isset($value['link'])) {
                    $link = $value['link'];
                } else {
                    $link = URL::linkCategoryArticle($value['id'],$value['name']);
                }
            @endphp
            <a href="{{$link}}" style="color:#fff">{{$value['name']}}</a> /
        @endif
    @endforeach
@endif
