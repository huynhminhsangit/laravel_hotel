<meta charset="UTF-8">
<title>{!! $titlePage ?? '' !!} - Sky Luxury Hotel & Resort</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{!! $metaDescription ?? '' !!}">
<meta name="keywords" content="{!! $metaKeyword ?? ''!!}">
<meta name="title" content="{!! $metaTitle ?? ''!!}">
<!-- SHARE FB -->
<meta property="og:url"                content="{{ url()->current()}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{!! $metaTitle ?? ''!!}" />
<meta property="og:description"        content="{!! $metaDescription ?? '' !!}" />
<meta property="og:image"              content="{!! asset('images/thumb/thumb.jpg') !!}" />
<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- CSS LIBRARY -->
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/ionicons-2.0.1/css/ionicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/gallery.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/vit-gallery.css') }}">
<link rel="shortcut icon" type="text/css" href="{{ asset('images/setting/favicon.png') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('hotel/assets/toastr/toastr.min.css') }}" />
<!-- MAIN STYLE -->
<link rel="stylesheet" href="{{ asset('hotel/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('hotel/css/my-custom.css') . '?v=' . time() }}" rel="stylesheet">
