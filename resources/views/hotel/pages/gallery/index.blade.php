@extends('hotel.main')
@section('content')
@include('hotel.block.top-banner',[
    'breadcrumb' => $breadcrumb,
    'title' => 'Thư viện'
    ])

<div class="gallery-our wrap-gallery-restaurant gallery_1">
    <div class="container">
        <div class="gallery gallery-restaurant">
            <ul class="nav nav-tabs text-uppercase">
                @php
                    $activeVideo = isset(request()->video) ? 'active' : '';
                    $activeDefault = isset(request()->video) ? '' : 'active';
                @endphp
                <li class="{{ $activeDefault }}"><a data-toggle="tab" href="#all">Mọi thứ</a></li>
                <li><a data-toggle="tab" href="#room">Phòng  </a></li>
                <li><a data-toggle="tab" href="#food">Ăn uống  </a></li>
                <li><a data-toggle="tab" href="#entertaiment">Giải trí  </a></li>
                <li class="{{ $activeVideo }}"><a data-toggle="tab" href="#video"> Video</a></li>
            </ul>
            <br/>
            <div class="tab-content">
            @include('hotel.pages.gallery.child-index.picture')
            @include('hotel.pages.gallery.child-index.video')
            </div>
            <!-- end-tab-content -->
        </div>
        <!-- /gallery -->
    </div>
    <!-- /container -->
</div>

@endsection
