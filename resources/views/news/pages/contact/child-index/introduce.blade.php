@php
    // $value = json_decode($item[0],true);
    $general = json_decode($item[0]['value'], true);
    $email   = json_decode($item[1]['value'], true);
    $social  = json_decode($item[2]['value'], true);
    // echo '<pre style="color: red;">';
    // print_r(explode(',',$general['hotline']));
    // echo '</pre>';
    $arrHotline = explode(',',$general['hotline']);
@endphp
<div class="col-lg-4 contact_col">
    <div class="contact_content">
        <div class="contact_title">Giới thiệu</div>
        @if ($general['introduce'])
            <div class="contact_text">
            {!! $general['introduce'] !!}
        </div>
        @endif
        <div class="contact_social">
            <ul class="contact_social_list d-flex flex-row align-items-center justify-content-start">
                @if ($social['facebook'])
                    <li><a href="{{ $social['facebook'] }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                @endif
                @if ($social['group'])
                    <li><a href="{{ $social['group'] }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                @endif    
                @if ($social['fan_page'])
                    <li><a href="{{ $social['fan_page'] }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                @endif
                @if ($social['youtube'])
                    <li><a href="{{ $social['youtube'] }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                @endif    
            </ul>
        </div>
        <div class="contact_info">
            <ul>
                @if ($general['location'])
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
                            <div class="contact_info_icon"><img src="{{ asset('news/images/icon_9.svg') }}" alt=""></div>
                        </div>
                        <div class="contact_info_content">{!! $general['location'] !!}</div>
                    </li>
                @endif
                @if ($email['email'])
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
                            <div class="contact_info_icon"><img src="{{ asset('news/images/icon_10.svg') }}" alt=""></div>
                        </div>
                        <div class="contact_info_content">{!! $email['email'] !!}</div>
                    </li>
                @endif
                @if ($general['hotline'])
                    <li class="d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
                            <div class="contact_info_icon"><img src="{{ asset('news/images/icon_11.svg') }}" alt=""></div>
                        </div>
                        @if (count($arrHotline) > 1)
                            @foreach ($arrHotline as $key => $hotline)
                                <div class="contact_info_content"> Hotline {{$key+1}}: {!! $hotline !!}</div>
                            @endforeach
                        @else
                            <div class="contact_info_content">Hotline: {!! $general['hotline'] !!}</div>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
