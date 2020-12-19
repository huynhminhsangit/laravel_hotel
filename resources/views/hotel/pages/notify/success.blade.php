@php
    $src = url('images') . '/' . $folderImage . '/';
@endphp
@extends('hotel.main')
@section('content')
    <section class="body-page" style="background: url({!! $src.'comming.jpg' !!}) no-repeat center center;">
        <div class="container">
            <div class="content">
                <h3 class="h3-404">Thông tin đặt chỗ của bạn đã được lưu lại!</h3>
                <h3 class="h3-404">Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi!</h3>
                <p class="p-404 size">Bạn bấm vào <a href="{!! route('home') !!}" title="Trang chủ">đây </a> để trở về trang chủ nhé!</p>
            </div>
        </div>
    </section>
@endsection
