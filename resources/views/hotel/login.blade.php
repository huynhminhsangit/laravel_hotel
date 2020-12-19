<!DOCTYPE html>
<html>
<head>
	@include('shop.elements.head')
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
                @yield('content')
			</div>
		</div>
	</section>
    @include('shop.elements.script')
</body>
</html>
