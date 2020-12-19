@php
    $src = asset("images/product") . "/";
    $arrImage = json_decode($item['thumb'], true);
    // $imageMain = array_shift($arrImage)['imageName'];
@endphp
<div class="col-lg-9">
    <div class="wrapper">
        <div class="gallery3">
            <div class="gallery__block">
                <div class="gallery__inner" style="width: 8835px; left: -870px;">
                    @foreach ($arrImage as $item)
                    <div class="gallery__img-block" style="width: 870px;">
                        <img src="{!! $src . $item['imageName']!!}" alt="{!! $item['imageAlt'] !!}" class="gallery__img-block__img" />
                    </div>
                    @endforeach       
                </div>
                <div class="gallery__controls-buttons"><span class="prev"></span><span class="next"></span></div>
            </div>
            {{-- <div class="gallery__fullscreen__wrap fullscreen_gallery3">
                <span class="gallery__fullscreen__exit"></span>
                <div class="gallery__fake"></div>
                <div class="gallery__fullscreen__controls"><span class="prev"></span><span class="next"></span></div>
            </div> --}}
        </div>
    </div>
</div>


