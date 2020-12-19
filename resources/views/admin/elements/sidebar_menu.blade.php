<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('admin/img/img.jpg') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{!! session()->get('userInfo')['fullname'] !!}</h2>
    </div>
</div>
<!-- /menu profile quick info -->
<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Thống kê</a></li>
            <li class=""><a><i class="fa fa-ticket"></i> Đặt phòng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('reservation/calendar') }}"></i>Xem dạng lịch</a></li>
                    <li><a href="{{ route('reservation') }}"></i>Xem dạng danh sách</a></li>
                </ul>
            </li>

            <li class=""><a><i class="fa fa-building-o"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('category-article') }}"> Danh mục</a></li>
                    <li><a href="{{ route('article') }}"> Bài viết</a></li>
                    <li><a href="{{ route('rss') }}"> Tin tức tổng hợp</a></li>
                    <li><a href="{{ route('tags') }}"> Tags</a></li>
                </ul>
            </li>
            <li><a href="{{ route('slider') }}"><i class="fa fa-tv"></i> Slider</a></li>
            <li><a href="{{ route('menu') }}"><i class="fa fa-bars"></i> Menu</a></li>
            {{-- <li><a href="{{ route('user') }}"><i class="fa fa-user"></i> Người dùng</a></li> --}}
            <li class=""><a><i class="fa fa-building-o"></i> Quản lý phòng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('group-attribute') }}"> Nhóm thuộc tính</a></li>
                    <li><a href="{{ route('attribute') }}">Thuộc tính</a></li>
                    <li><a href="{{ route('category-product') }}">Danh mục phòng</a></li>
                    <li><a href="{{ route('product') }}"> Phòng</a></li>
                    <li><a href="{{ route('coupon') }}"> Mã giảm giá</a></li>
                    {{-- <li><a href="{{ route('feeship') }}"> Phí vận chuyển</a></li> --}}
                </ul>
            </li>
            <li class=""><a><i class="fa fa-cogs"></i> Cài đặt <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('setting') }}">Cài đặt</a></li>
                    <li><a href="{{ route('log-viewer::dashboard') }}">Log</a></li>
                </ul>
            </li>
            <li><a href="{{ route('contact') }}"><i class="fa fa-book"></i>Liên hệ</a></li>
            <li><a href="{{ route('subscribe') }}"><i class="fa fa-bell"></i>Theo dõi</a></li>
            <li><a href="{{ route('employee') }}"><i class="fa fa-users"></i>Nhân viên</a></li>
            <li><a><i class="fa fa-question"></i>Hỏi Đáp (FAQ)<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('category-faq') }}">Danh mục</a></li>
                    <li><a href="{{ route('faq') }}">Hỏi đáp</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-image"></i>Gallery<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('gallery/picture') }}">Hình Ảnh</a></li>
                    <li><a href="{{ route('gallery/video') }}">Video</a></li>
                </ul>
            </li>
            <li><a href="{{ route('review') }}"><i class="fa fa-star"></i> Review</a></li>
            <li><a href="{{ route('change-password') }}"><i class="fa fa-unlock"></i>Đổi Mật Khẩu</a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
