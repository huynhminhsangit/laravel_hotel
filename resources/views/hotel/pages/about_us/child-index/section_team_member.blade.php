@php
    $src = url('images') . '/' . $folderImage . '/';
@endphp
<section class="section-team">
    <div class="container">
        <div class="team">
            <h2 class="heading text-center">{{ $titleSection }}</h2>
            {{--
            <p class="sub-heading text-center">Lorem Ipsum is simply dummy text of the printing</p>
            --}}
            <div class="team_content">
                <div class="row">
                    @foreach ($items as $item)
                        <!-- ITEM -->
                        <div class="col-xs-6 col-md-3">
                            <div class="team_item text-center">
                                <div class="img">
                                    <a href="#"><img src="{!! $src . $item['thumb'] !!}" alt="#" class="rs-200-200"/></a>
                                </div>
                                <div class="text">
                                    <h2>{!! $item['fullname'] !!}</h2>
                                    <span>{!! $item['position'] !!}</span>
                                    <div class="team-share">
                                        <a href="tel:{!! $item['phone'] !!}" title="Gọi ngay"><i class="fa fa-phone" aria-hidden="true"></i> {!! $item['phone'] !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END / ITEM -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
