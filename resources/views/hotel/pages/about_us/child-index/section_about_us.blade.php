@php
    $general = json_decode($items[0]['value'], true);
    $arrParagraphs = explode('</p>', $general['introduce']);
@endphp
<section class="section-about">
    <div class="container">
        <div class="row">
            <div class="wrap-about">
                <!-- ITEM -->
                <div class="about-item about-right">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-left col-lg-push-6 col-md-push-6">
                        <div class="img">
                            <img src="{{ asset('hotel/images/About/about-1.jpg') }}" alt="#" class="img-responsive" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-right col-lg-pull-6 col-md-pull-6">
                        <div class="text">
                            <h2 class="heading">{!! $titleSection !!}</h2>
                            <div class="desc">
                                @foreach ($arrParagraphs as $key => $item)
                                @if ($key == 1)
                                    @continue
                                @endif
                                    <p>{!! $item !!}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END / ITEM -->
            </div>
        </div>
    </div>
</section>
