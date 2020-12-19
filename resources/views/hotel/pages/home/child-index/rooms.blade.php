@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp
<!-- OUR-ROOMS-->
<section class="rooms">
    <div class="container">
        <h2 class="title-room">Phòng nghỉ</h2>
        <div class="outline"></div>
        <p class="rooms-p">Khi bạn tổ chức một bữa tiệc hoặc đoàn tụ gia đình, các lễ kỷ niệm đặc biệt cho phép bạn gắn kết với nhau hơn</p>
        <div class="wrap-rooms">
            <div class="row">
                <div id="rooms" class="owl-carousel owl-theme">
                    @if (count($itemsProduct) > 0)
                        @foreach ($itemsProduct as $index => $item)
                            @php
                                $name      = $item['name'];
                                $arrThumb  = json_decode($item['thumb'], 'true');
                                $thumbName = array_shift($arrThumb)['imageName'];
                                $thumbAlt  = array_shift($arrThumb)['imageAlt'];
                                $price     = Template::showPrice($item['price']);
                                $thumbName = URL::linkImage('product', $thumbName);
                                $link      = URL::linkProduct($item['id'], $item['name']);
                            @endphp
                            <div class="item">
                                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <a href="{!! $link !!}"><img src="{!! $thumbName !!}" class="img-responsive" alt="{!! $thumbAlt !!}" title="{!! $name !!}"></a>
                                        </div>
                                        <div class="rooms-content">
                                            <h4 class="sky-h4"><a href="{!! $link !!}">{!! $name !!}</a></h4>
                                            <p class="price">{!! $price !!} / ngày</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</section>
<!-- END / ROOMS -->
