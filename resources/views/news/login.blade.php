<!DOCTYPE html>
<html>
<head>
	@include('news.elements.head')
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper my-auto">
                @yield('content')
			</div>
		</div>
	</section>
    @include('news.elements.script')
</body>
</html>
