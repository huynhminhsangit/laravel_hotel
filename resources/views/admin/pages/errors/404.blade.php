{{-- <!DOCTYPE html>
<html>
<head>
	<title>Page Not Found</title>
</head>
<body>
    <h1>Sorry, Page Not Found</h1>
    <img src="{{ asset('images/error/404.jpg') }}" alt="404 page">
    <a href="{{ route('dashboard') }}">Go to Home</a>
</body>
</html> --}}
@extends('admin.main')
@section('content')
<h1>Sorry, Page Not Found</h1>
<img src="{{ asset('images/notice/404.jpg') }}" alt="404 page">
<a href="{{ route('dashboard') }}">Go to Home</a>
@endsection
