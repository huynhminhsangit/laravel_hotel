@extends('hotel.main',['titlePage' => 'Không tìm thấy trang yêu cầu '])
@section('content')

<section class="body-page">
  <div class="container">
      <div class="content">
          <h1 class="page404">404</h1>
          <h3 class="h3-404">Chúng tôi xin lỗi vì sự bất tiện này…</h3>
          <p class="p-404">Trang bạn tìm không tồn tại. Vui lòng quay trở lại trang chủ.</a></p>
              <a href="{{ route('home') }}" class="btn btn-danger">Quay Về trang chủ</a>
      </div>
  </div>
</section>


@endsection
