@extends('news.main')
@section('content')
<div class="section-category">
    @include('news.block.breadcrumb',['item' => ['name' => 'Tin Tức Tổng Hợp']])
    <div class="content_container container_category">
        <div class="featured_title">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-9">
                        @include('news.pages.rss.child-index.category', ['item' => $itemsRss])
                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <h3>Giá vàng</h3>
                            <div id="box-gold" data-url="{{ route('rss/getGold') }}">
                                <img src="{{ asset('images/rss/loading.gif') }}" alt="loading.gif">
                            </div>
                            <h3>Giá coin</h3>
                            <div id="box-coin" data-url="{{ route('rss/getCoin') }}">
                                <img src="{{ asset('images/rss/loading.gif') }}" alt="loading.gif">
                            </div>
                            <!-- Latest Posts -->
                            {{-- @include ('news.block.latest_posts', ['items' => []]) --}}

                            <!-- Advertisement -->
                            {{-- @include ('news.block.advertisement', ['itemsAdvertisement' => []]) --}}

                            <!-- MostViewed -->
                            {{-- @include ('news.block.most_viewed', ['itemsMostViewed' => []]) --}}

                            <!-- Tags -->
                            {{-- @include ('news.block.tags', ['itemsTags' => []]) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('news.pages.rss.child-index.template_box')
@endsection
