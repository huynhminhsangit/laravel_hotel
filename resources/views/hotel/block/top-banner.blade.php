<section class="banner-tems text-center">
  <div class="container">
      <div class="banner-content">
          <h2>{{ $titlePage ??'' }}</h2>
          @if (!empty($breadcrumb))
            <p>@include('hotel.block.breadcrumb')</p>
          @endif
      </div>
  </div>
</section>
