@php
    $cookie = Cookie::get();
    $videoGallery = '';
    foreach ($cookie as $key => $value) {
      if(str_contains($key,'|||||')) {
        $videoGallery = $key;
      }
    }
    $videoGallery = explode('|||||',$videoGallery);
    $youtube['id'] = explode(',',$videoGallery[0]);
    $youtube['thumb'] = explode(',',$videoGallery[1]);
    array_pop($youtube['id']);array_pop($youtube['thumb']);
    $active = isset(request()->video) ? 'in active' : ''; 
@endphp
<div id="video" class="tab-pane fade {{ $active }}">
  <div class="product ">
    <div class="row" id="videoGallery">
        @php
            $xhtml = '';
            for($i = 0; $i < 8; $i++) {
              $id = $youtube['id'][$i];
              $thumb = str_replace('_','.',$youtube['thumb'][$i]);
              $xhtml .= '<div class="gallery_product col-lg-3 col-md-4 col-sm-6 col-xs-6">
                          <div class="wrap-box-1">
                            <div class="box-img">
                                <a class="lightbox " href="#" data-littlelightbox-group="gallery" title="Flying is life"><img src="'.$thumb.'" alt="#" class="img-responsive"></a>
                                <div class="section-video ">
                                  <a class="btn-play" href="#modal-video-'.$id.'"></a>
                                  <div id="modal-video-'.$id.'" class="modal-video" data-video="https://www.youtube.com/embed/'.$id.'" data-query-string="ecver=1&amp;autoplay=1&amp;showinfo=0&amp;controls=0&amp;modestbranding=1" src=""><iframe allowfullscreen="" height="394" src="https://www.youtube.com/embed/'.$id.'"></iframe></div>
                                </div>
                            </div>
                          </div>
                        </div>';
            }
            echo $xhtml;
        @endphp
    </div>
  </div>
</div>