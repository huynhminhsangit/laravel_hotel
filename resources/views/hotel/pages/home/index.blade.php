@extends('hotel.main')
@section('content')

    @include ('hotel.block.slider')
    @include ('hotel.pages.home.child-index.rooms')
    @include ('hotel.pages.home.child-index.about_us')
    @include ('hotel.pages.home.child-index.featured')
    @include ('hotel.pages.home.child-index.review')
    {{-- @include ('hotel.pages.home.child-index.event') --}}
    {{-- @include ('hotel.pages.home.child-index.news') --}}
    @include ('hotel.pages.home.child-index.gallery')
    @include ('hotel.pages.home.child-index.media')

@endsection
