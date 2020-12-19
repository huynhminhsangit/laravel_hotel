@php
    $src = url('images') . '/' . $folderImage . '/';
@endphp
@extends('hotel.main')
@section('content')
    <section class="body-page" style="background: url({!! $src.'comming.jpg' !!}) no-repeat center center;">
        <div class="container">
            <div class="content">
                <h1 class="page404">Bảo trì</h1>
                <h3 class="h3-404">Chức năng này đang được xây dựng!</h3>
                <p class="p-404 size">bấm vào <a href="{!! route('home') !!}" title="Trang chủ">đây </a> để trở về trang chủ</p>
            </div>
        </div>
    </section>
@endsection
