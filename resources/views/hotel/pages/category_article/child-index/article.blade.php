@php
    use App\Helpers\URL;
    use App\Helpers\Template;
@endphp
@if (!empty($items))
    @foreach ($items as $item)
    @php
        $date = strtotime($item['created']);
        $linkArticle = URL::linkArticle($item['id'],$item['name']);
        $content = Template::showContent($item['content'],500);
    @endphp
        <article class="post">
            <div class="entry-media">
                <a href="{{ $linkArticle }}" class=" hover-zoom"><img height="346" src="{{ asset('images/article/'.$item['thumb']) }}" alt="#"></a>
                <span class="posted-on"><strong>{{ date('d',$date) }}</strong>{{ date('M',$date) }}</span>
            </div>
            <div class="entry-header">
                <h2 class="entry-title"><a href="{{ $linkArticle }}">{{ $item['name'] }}</a></h2>
            </div>
            <div class="entry-content">
                <p>{!! $content !!}</p>
            </div>
            <div class="entry-footer">
                <p class="entry-meta">
                    </span>
                    <span class="entry-author">
                        <span class="screen-reader-text">đăng bởi:</span>
                    <a class="entry-author-link">
                        <span class="entry-author-name">{!! $item['created_by'] !!}</span>
                    </a>
                    </span>
                    <span class="entry-categories">
                        @php
                            $linkCategory = URL::linkCategoryArticle($item['category_id'],$item['category_name']);
                        @endphp
                        <a href="{{ $linkCategory }}">{{ $item['category_name'] }}</a>
                    </span>
                    {{-- <span class="entry-comments-link">
                        <a href="#">3 Comments</a>
                    </span> --}}
                    @if (!empty($item['tags_name']))
                    <span class="entry-tags">
                        <span class="screen-reader-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
                        @foreach ($item['tags_name'] as $key => $value)
                            @php
                                $linkTags = URL::linkTags($key,$value);
                            @endphp
                            @if ($key === array_key_last($item['tags_name']))
                                <a href="{{$linkTags}}">{{$value}}</a>
                            @else
                                <a href="{{$linkTags}}">{{$value}}</a> -
                            @endif
                        @endforeach
                    </span>
                    @endif
                </p>
            </div>
        </article>
    @endforeach
@endif
