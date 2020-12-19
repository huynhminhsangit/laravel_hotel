@php
    // ob_start();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    @include('hotel.elements.head')
</head>

<body>
    @include('hotel.elements.header')
    @yield('content')
    @include('hotel.elements.footer')
    @include('hotel.elements.scroll_top')
    @include('hotel.elements.script')
</body>

</html>
@php
// $content = ob_get_clean();
// echo \App\Libs\TinyMinify::html($content, $options = [
//     'collapse_whitespace' => false,
//     'disable_comments' => false,
// ]);
@endphp
