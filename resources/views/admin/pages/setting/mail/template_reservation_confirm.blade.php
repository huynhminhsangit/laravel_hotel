@php
    use App\Helpers\Template;
@endphp
<!DOCTYPE html>
<html>
<head>
 <title>How To Send Email In Laravel 8 With SMTP Example - phpcodingstuff.com</title>
</head>
<body>
    <p>Thông tin đặt chỗ của bạn {{ $detail['fullname'] }} như sau: </p>
    <ul>
        <li>Mã đặt chỗ: {{ $detail['reservation_code'] }}</li>
        <li>Họ tên: {{ $detail['fullname'] }}</li>
        <li>Số điện thoại: {{ $detail['phone'] }}</li>
        <li>Email: {{ $detail['email'] }}</li>
        <li>Ngày đến: {{ $detail['check_in'] }}</li>
        <li>Ngày đi: {{ $detail['check_out'] }}</li>
        <li>Loại phòng: {{ $detail['room_name'] }}</li>
        <li>Giá: {{ Template::showPrice($detail['price']) }}</li>
        <li>Thời gian nhận phòng: {{ $detail['time_check_in'] }}</li>
        <li>Ghi chú: {{ $detail['note'] }}</li>
    </ul>
</body>
</html>
