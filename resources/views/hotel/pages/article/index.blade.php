@extends('hotel.main')
@section('content')
@include('hotel.block.top-banner',[
    'breadcrumb' => $breadcrumb,
    'title' => 'Bài Viết'
    ])

<div class="section-blog blog-detail">
    <div class="container">
        <div class="blog">
            <div class="row">
                <div class=" col-lg-8 col-md-8 col-md-push-4">
                    <div class="blog-content">
                            {{-- @include('hotel.pages.category_article.child-index.search') --}}
                            @include('hotel.pages.article.child-index.article',['item' => $items])
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-md-pull-8">
                    @include('hotel.pages.category_article.child-index.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
