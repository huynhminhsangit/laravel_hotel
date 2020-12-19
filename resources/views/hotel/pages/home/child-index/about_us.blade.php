@php
use App\Helpers\Template;
    $general = json_decode($itemsSetting[0]['value'], true);
    $arrParagraphs = explode('</p>', $general['introduce']);
@endphp
<!-- ABOUT-US-->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                <div class="about-centent">
                    <h2 class="about-title">Về chúng tôi</h2>
                    <div class="line"></div>
                    @foreach ($arrParagraphs as $key => $item)
                        @if ($key == 1)
                            <p class="about-p">{!! $item . '...' !!}</p>
                            @break
                        @else
                            <p class="about-p">{!! $item !!}</p>
                        @endif
                    @endforeach

                    {{-- <p class="about-p">{!! Template::truncateString($general['introduce']) !!}</p> --}}
                    {{-- <p class="about-p1">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage ...</p> --}}
                    <a href="{!! route('about-us/index') !!}" class="read-more">Xem thêm </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ">
                <div class="about-img">
                    <div class="img-1">
                        <img src="{{ asset('hotel/images/Home-1/about-3.jpg') }}" class="img-responsive" alt="Image">
                        <div class="img-2">
                            <img src="{{ asset('hotel/images/Home-1/about-1.jpg') }}" class="img-responsive" alt="Image">
                        </div>
                        <div class="img-3">
                            <img src="{{ asset('hotel/images/Home-1/about-2.jpg') }}" class="img-responsive" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END/ ABOUT-US-->
