@php
use App\Helpers\Template;
@endphp
<div class="col-lg-6 rtl-text">
    <div class="product-right">
        <h2 class="mb-0">{!! $item['name'] !!}</h2>
        {{-- <h4><del>$459.00</del><span>55% off</span></h4> --}}
        <h3>{!! Template::showPrice($item['price'], 'right') !!}</h3>
        {{-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --}}
        <div class="product-description border-product">
            {{-- <h6 class="product-title size-text">select size <span><a href="" data-toggle="modal" data-target="#sizemodal">size chart</a></span></h6>
            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body"><img src="{{asset('shop/assets/images/size-chart.jpg')}}" alt="" class="img-fluid blur-up lazyload"></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="size-box">
                <ul>
                    <li class="active"><a href="#">s</a></li>
                    <li><a href="#">m</a></li>
                    <li><a href="#">l</a></li>
                    <li><a href="#">xl</a></li>
                </ul>
            </div> --}}
            <h6 class="product-title">quantity</h6>
            <div class="qty-box">
                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                    <input type="text" name="quantity" class="form-control input-number" value="1">
                    <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span>
                </div>
            </div>
        </div>
        <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-solid">Thêm vào giỏ hàng</a> <a href="#" class="btn btn-solid">mua ngay</a>
        </div>
        <div class="border-product">
            <h6 class="product-title">Mô tả ngắn về sản phẩm</h6>
            <p>{!! $item['content'] !!}
            </p>
        </div>
        {{-- <div class="border-product">
            <h6 class="product-title">share it</h6>
            <div class="product-icon">
                <ul class="product-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
                <form class="d-inline-block">
                    <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                </form>
            </div>
        </div> --}}
        {{-- <div class="border-product">
            <h6 class="product-title">Time Reminder</h6>
            <div class="timer">
                <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                    </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                </p>
            </div>
        </div> --}}
    </div>
</div>
