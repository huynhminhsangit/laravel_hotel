<!-- LOAD JQUERY -->
<script type="text/javascript" src="{{ asset('hotel/js/jquery-1.12.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/vit-gallery.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/jquery.countTo.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/jquery.appear.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/jquery.littlelightbox.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/assets/toastr/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/bootstrap-datepicker.js') }}"></script>
<!-- Custom jQuery -->
<script type="text/javascript" src="{{ asset('hotel/js/sky.js')}}"></script>
<script type="text/javascript" src="{{ asset('hotel/js/my-custom-js.js'. '?v=' . time()) }}"></script>
@php
    use App\Helpers\Template;
    Template::showNotify();
@endphp
