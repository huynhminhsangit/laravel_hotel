@extends('hotel.main')
@section('content')
@include('hotel.block.top-banner',['breadcrumb' => $breadcrumb])
@php
    use App\Helpers\URL;
    $thumb = json_decode($itemProduct['thumb'],true);
@endphp
<section class="section-product-detail">
    <div class="container">
        <!-- DETAIL -->
        <div class="product-detail margin">
            <div class="row">
                <div class="col-lg-9">
                    <!-- LAGER IMGAE -->
                    <div class="wrapper">
                        <div class="gallery3">
                            @foreach ($thumb as $item)
                                @php
                                    $imageName = $item['imageName'];
                                    $imageAlt = $item['imageAlt'];
                                    $thumb       = URL::linkImage('product', $item['imageName']);
                                @endphp
                                <div class="gallery__img-block  " style="height:590px;overflow:hidden;">
                                    <span class="">{!! $imageAlt !!}</span>
                                    <img src="{!! $thumb !!}" alt="{!! $imageAlt !!}" class="">
                                </div>
                            @endforeach
                            <div class="gallery__controls">
                            </div>
                        </div>
                    </div>
                    <!-- END / LAGER IMGAE -->
                </div>
                <div class="col-lg-3">
                    <!-- FORM BOOK -->
                    @include('hotel.pages.product.child-index.book-detail')
                    <!-- END / FORM BOOK -->
                </div>
            </div>
        </div>
        <!-- END / DETAIL -->
        <!-- TAB -->
        <div class="product-detail_tab">
            <div class="row">
                <div class="col-md-3">
                    <ul class="product-detail_tab-header">
                        <li class="active"><a href="#overview" data-toggle="tab">Tổng Quan</a></li>
                        <li><a href="#amenities" data-toggle="tab">Tiện Nghi</a></li>
                        <li><a href="#review" data-toggle="tab">Review</a></li>
                        <li><a href="#calendar" data-toggle="tab">Calendar</a></li>
                        {{-- <li><a href="#calendar" data-toggle="tab">Calendar</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-9">
                    @include('hotel.pages.product.child-index.tab-content')
                </div>
            </div>
        </div>
        <!-- END / TAB -->
        <!-- ANOTHER ACCOMMODATION -->
        <div class="product-detail">
            <h2 class="product-detail_title">Phòng Khác</h2>
            @include('hotel.pages.product.child-index.another-room',['items' => $anotherRoom])
        </div>
        <!-- END / ANOTHER ACCOMMODATION -->
    </div>
</section>

@endsection
