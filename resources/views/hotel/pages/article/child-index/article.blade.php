@php
    use App\Helpers\URL;
    use App\Helpers\Template;
    $date = strtotime($item['created']);
    $linkArticle = URL::linkArticle($item['id'],$item['name']);
    $content = $item['content'];
    @endphp
        <article class="post">
            <div class="entry-media">
                <a href="{{ $linkArticle }}" class=" hover-zoom"><img height="346" src="{{ asset('images/article/'.$item['thumb']) }}" alt="#"></a>
                <span class="posted-on"><strong>{{ date('d',$date) }}</strong>{{ date('M',$date) }}</span>
            </div>
            <div class="entry-header">
                <h2 class="entry-title"><a href="{{ $linkArticle }}">{{ $item['name'] }}</a></h2>
                <p class="entry-meta">
                    <span class="entry-author">
                        <span class="screen-reader-text">đăng bởi </span>
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
                </p>
            </div>
            <div class="entry-content">
                <p>{!! $content !!}</p>
            </div>
        </article>
        <div class="share-tag">
            @if (!empty($item['tags_name']))
                    <span class="entry-tags">
                        <span><i class="fa fa-tag" aria-hidden="true"></i> Tags:
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
                    </span>
                    @endif
            <a href="#" title=""> <i class="fa fa-share-alt" aria-hidden="true"></i>Share</a>
            <a href="#" title=""> <i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" title=""> <i class="ion-ios-glasses" aria-hidden="true"></i></a>
            <a href="#" title=""> <i class="fa fa-vimeo" aria-hidden="true"></i></a>
            <a href="#" title=""> <i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" title=""> <i class=" ion-social-googleplus" aria-hidden="true"></i></a>
            <a href="#" title=""> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>

