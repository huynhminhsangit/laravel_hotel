<div class="product-detail_tab-content tab-content">
    <div class="tab-pane fade active in" id="overview">
        <div class="product-detail_overview">
            @include('hotel.pages.product.child-index.tab-overview')
        </div>
    </div>
    <div class="tab-pane fade" id="amenities">
        @include('hotel.pages.product.child-index.tab-amenities')
    </div>
    <div class="tab-pane fade" id="review">
        <div class="product-detail_package">
            @include('hotel.pages.product.child-index.tab-review')
        </div>
    </div>
    <div class="tab-pane fade" id="calendar">
        <div class="product-detail_package">
            @include('hotel.pages.product.child-index.tab-calendar')
        </div>
    </div>
</div>