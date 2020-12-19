@extends('hotel.main')
@section('content')
    @include('hotel.block.top-banner',['titlePage' => 'Đặt phòng'])
    @include('hotel.pages.reservation.child-index.step_confirm')
@endsection
