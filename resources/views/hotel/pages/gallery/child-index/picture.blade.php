@foreach ($items as $key => $value)
  @php
    $active = (!isset(request()->video) && $key == 'all') ? 'in active' : '';  
  @endphp
    <div id="{{ $key }}" class="tab-pane fade {{ $active }}">
        <div class="product ">
            <div class="row">
              @foreach ($value as $item)
                <div class="gallery_product col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                  <div class="wrap-box-1">
                      <div class="box-img">
                          <a class="lightbox " href="{{ asset("storage/$controllerName/$key/{$item->getFilename()}") }}" data-littlelightbox-group="gallery" >
                            <img src="{{ asset("storage/gallery/$key/{$item->getFilename()}") }}" class="img-responsive" alt="Product" title="images products">
                          </a>
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
@endforeach