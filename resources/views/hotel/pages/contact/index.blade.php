@extends('hotel.main',['titlePage' => $titlePage])
@section('content')
@include('hotel.block.top-banner',['breadcrumb' => $breadcrumb])
@php
    $general = json_decode($itemsSetting[0]['value'], true);
    $arrParagraphs = explode('</p>', $general['introduce']);
@endphp
<section class="section-contact">
    <div class="container">
        <div class="contact">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="text">
                        <h2>Contact</h2>
                        <p>{!! $arrParagraphs[0] ?? '' !!}</p>
                        <ul>
                            @if (!empty($contactSetting['location']))
                                <li><i class=" fa ion-ios-location-outline"></i>{{$contactSetting['location']}}</li>
                            @endif
                            @if (!empty($contactSetting['hotline']))
                                <li><i class="fa fa-phone" aria-hidden="true"></i>{{$contactSetting['hotline']}}</li>
                            @endif
                            @if (!empty($email['email']))
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$email['email']}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-lg-offset-1">
                    <div class="contact-form">
                        <form action="{{ route($controllerName.'/save') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="fullname" placeholder="Họ Tên" id="fullname">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="email" placeholder="Email" id="email">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="field-text" name="phone" placeholder="Số Điện Thoại" id="phone">
                                </div>
                                <div class="col-sm-12">
                                    <textarea cols="30" rows="10" name="message" class="field-textarea" placeholder="Lời Nhắn" id="message"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-room">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('hotel.pages.contact.child-index.map')
<script type="text/javascript" src="{{asset('hotel/js/jquery-1.12.4.min.js')}}"></script>
<script>
    var contact = localStorage.getItem('contact');
	if(contact) {
		contact = JSON.parse(contact);
		$.each(contact, function(key, value) {
			$('#'+key).val(value);
		}); 
	}

	$('button[type=submit]').click(function() {
		var contact = {
			'email'		: $('input[name=email]').val(),
			'phone' 	: $('input[name=phone]').val(),
			'fullname'  : $('input[name=fullname]').val(),
			'message'   : $('textarea[name=message]').val(),
		};
		localStorage.setItem("contact", JSON.stringify(contact));
	});
</script>
@endsection
