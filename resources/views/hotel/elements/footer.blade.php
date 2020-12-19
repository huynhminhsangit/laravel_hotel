@php
    $general = json_decode($itemsSetting[0]['value'], true);
    $arrHotline = explode(',',$general['hotline']);
    $email   = json_decode($itemsSetting[1]['value'], true);
    $social  = json_decode($itemsSetting[2]['value'], true);
    $logo    = json_decode($general['logo'], true);
@endphp
<!--FOOTER-->
<footer class="footer-sky">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                    <div class="icon-email">
                        <a href="#" title="Email"><img src="{{ asset('hotel/images/Home-1/footer-top-icon-l.png') }}" alt="Email" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                    <div class="textbox">
                        {{-- <form class="form-inline" action="{!! route('subscribe/save') !!}" method="POST"> --}}
                        <form class="form-inline" data-href="" id="form-subscribe">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control" value="" id="input-email" placeholder="Nhập địa chỉ email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    {{-- {{ csrf_field() }} --}}
                                    <button class="btn btn-secondary" type="submit" id="btn-subscribe">
                                        <i class="ion-android-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 text-right">
                    <div class="footer-icon-l">
                        <a href="{!! $social['facebook'] !!}" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        {{-- <a href="#" title="Tripadvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a> --}}
                        <a href="{!! $social['youtube'] !!}" title="Youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /footer-top -->
    <div class="footer-mid">
        <div class="container">
            <div class="row padding-footer-mid">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="footer-logo text-center list-content">
                        <a href="index.html" title="Skyline"><img src="{{ asset('images/setting').'/'.$logo['logo_footer'] }}" alt="Image"></a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-lg-offset-1 col-md-offset-1  ">
                    <div class="list-content">
                        <ul>
                            <li><a href="{!! route('about-us/index') !!}" title="">Về chúng tôi</a></li>
                            <li><a href="{!! route('faq/index') !!}" title="">FAQ</a></li>
                            <li><a href="{!! route('gallery/index') !!}" title="">Hình ảnh</a></li>
                            <li><a href="{!! route('gallery/index',['video' => 'video']) !!}" title="">Video</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-6 col-lg-3 col-lg-offset-1 col-md-offset-1 ">
                    <div class="list-content ">
                        <ul>
                            <li><a href="#" title="">Kết nối với chúng tôi</a></li>
                            <li><a href="{!! route('contact') !!}" title="">Liên hệ</a></li>
                            <li><a href="mailto:{!! $email['email'] !!}" title="">Email: {!! $email['email'] !!}</a></li>
                            <li><a href="tel:{!!  array_shift($arrHotline) ?? '' !!}" title="">Hotline: {!!  array_shift($arrHotline) ?? '' !!}</a></li>
                            {{-- <li><a href="#" title="">Contact Us</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding text-center">
                    {!! $general['copyright'] !!}
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- END / FOOTER-->
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Check Local Storage email exists
        let emailSubscribe = localStorage.getItem('email-subscribe');

        if(emailSubscribe){
            $('#input-email').val(emailSubscribe);
        }
        let $formSubscribe = $('#form-subscribe');
        $formSubscribe.on('submit', (e) => {
            let url = "{!! route('subscribe/save') !!}";
            e.preventDefault();
            let valueEmail = $('#input-email').val();
            if(valueEmail === '' || valueEmail === 'undefined'){
                alert('Vui lòng nhập email');
            }else{
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: 'post',
                    url: url,
                    dataType: "json",
                    data: {email: valueEmail},
                    success: function(result) {
                        // set local storage email-subscribe
                        localStorage.setItem("email-subscribe", valueEmail);
                        showToastrNotify(result.status.class, result.status.message);

                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }
        });
    });
</script>
