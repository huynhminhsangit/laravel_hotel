@php
    $src = asset("images/product") . "/";
    $arrImage = json_decode($item['thumb'], true);
    $imageMain = array_shift($arrImage)['imageName'];
@endphp
<div class="col-lg-6">
    <div class="product-slick slick-initialized slick-slider">
        <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
        <div class="slick-list draggable">
            <div class="slick-track" style="opacity: 1; width: 2160px;">
                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 540px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                    <div>
                        <div style="width: 100%; display: inline-block;"><img src="{!! $src.$imageMain !!}" alt="" class="img-fluid blur-up image_zoom_cls-0 lazyloaded"></div>
                    </div>
                </div>
                <div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -540px; top: 0px; z-index: 998; opacity: 0;">
                    <div>
                        <div style="width: 100%; display: inline-block;"><img src="{!! $src.$imageMain !!}" alt="" class="img-fluid blur-up image_zoom_cls-1 lazyloaded"></div>
                    </div>
                </div>
                <div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -1080px; top: 0px; z-index: 998; opacity: 0;">
                    <div>
                        <div style="width: 100%; display: inline-block;"><img src="{!! $src.$imageMain !!}" alt="" class="img-fluid blur-up image_zoom_cls-2 lazyloaded"></div>
                    </div>
                </div>
                <div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 540px; position: relative; left: -1620px; top: 0px; z-index: 998; opacity: 0;">
                    <div>
                        <div style="width: 100%; display: inline-block;"><img src="{!! $src.$imageMain !!}" alt="" class="img-fluid blur-up image_zoom_cls-3 lazyloaded"></div>
                    </div>
                </div>
            </div>
        </div>
        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
    </div>
    <div class="row">
        <div class="col-12 p-0">
            <div class="slider-nav slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 2090px; transform: translate3d(-570px, 0px, 0px);">
                        <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/1.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/2.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/1.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/2.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                        <div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 190px;">
                            <div>
                                <div style="width: 100%; display: inline-block;"><img src="{{asset('shop/assets/images/pro3/27.jpg')}}" alt="" class="img-fluid blur-up lazyloaded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
