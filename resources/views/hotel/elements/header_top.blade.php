@php
    $general = json_decode($itemsSetting[0]['value'], true);
    $arrHotline = explode(',',$general['hotline']);

    $xhtmlMenuUser = '';
    if (session('userInfo')) {
        $xhtmlMenuUser .= '<li class="dropdown"><a href="#">'.session('userInfo')['fullname'].'</a></li>';
        $xhtmlMenuUser .= sprintf('<li class="dropdown"><a href="%s" title="%s" class="dropdown-toggle">%s</a></li>', route('dashboard'), 'ACP', 'ACP');
        $xhtmlMenuUser .= sprintf('<li class="dropdown"><a href="%s" title="%s" class="dropdown-toggle">%s</a></li>', route('auth/logout'), 'Đăng xuất', 'Đăng xuất');
    }else {
        $xhtmlMenuUser .= sprintf('<li class="dropdown"><a href="%s" title="%s" class="dropdown-toggle">%s</a></li>', route('auth/login'), 'Đăng nhập', 'Đăng nhập');
    }
@endphp
<div class="container">
    <!--HEADER-TOP-->
    <div class="header-top">
        <div class="header-top-left">
            {{-- <span><i class="ion-android-cloud-outline"></i>18 °C</span> --}}
            <span><i class="ion-ios-location-outline"></i>{!! $general['location'] ?? '' !!}</span>
            <span><i class="fa fa-phone" aria-hidden="true"></i> {!!  array_shift($arrHotline) ?? '' !!}</span>
        </div>
        <div class="header-top-right">
            <ul>
                {!! $xhtmlMenuUser !!}
                {{-- <li class="dropdown"><a href="login.html" title="Login" class="dropdown-toggle">LOGIN</a></li>
                <li class="dropdown"><a href="register.html" title="Register" class="dropdown-toggle">REGISTER</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">USD <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="#">USD</a></li>
                        <li><a href="#">EUR</a></li>
                    </ul>
                </li> --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">VI <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="javascript:void(0);" onclick="showMaintenanceNotify()">ENG</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END/HEADER-TOP -->
</div>
