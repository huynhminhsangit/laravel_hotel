<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/favicon.ico" type="image/ico"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{!! $titlePage?? 'Form' !!}  | Admin</title>
<!-- Bootstrap -->
<link href="{{ asset('admin/asset/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('admin/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ asset('admin/asset/nprogress/nprogress.css') }}" rel="stylesheet">
<!-- iCheck -->
<link href="{{ asset('admin/asset/iCheck/skins/flat/green.css') }}" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{ asset('admin/asset/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
<!-- Dropzone -->
<link href="{{ asset('admin/asset/dropzone/basic.css') }}" rel="stylesheet">
<link href="{{ asset('admin/asset/dropzone/dropzone.css') }}" rel="stylesheet">
<!-- jquery-ui -->
<link href="{{ asset('admin/asset/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
<!-- select2 -->
<link href="{{ asset('admin/asset/select2/css/select2.min.css') }}" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{ asset('admin/css/custom.min.css') }}" rel="stylesheet">
<!-- Custom Style -->
<link href="{{ asset('admin/css/mycss.css') . '?v=' . time() }}" rel="stylesheet">
<!-- tui-calendar -->
<link href="{{ asset('admin/asset/tui-calendar/tui-calendar.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/asset/tui-calendar/tui-date-picker.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/asset/tui-calendar/tui-time-picker.min.css') }}" rel="stylesheet">

<!-- jQuery -->
<script src="{{ asset('admin/js/jquery/dist/jquery.min.js') }}"></script>
<!-- Dropzone -->
<script src="{{asset('admin/asset/dropzone/dropzone.js')}}"></script>
<!-- jquery-ui -->
<script src="{{asset('admin/asset/jquery-ui/jquery-ui.js')}}"></script>

