@php
    $diff = abs(strtotime($params['check_out']) - strtotime($params['check_in']));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $params['room_price'] = $days * $params['room_price'];
@endphp
<section class="section-reservation-page">
    <div class="container">
        <div class="reservation-page">
            <!-- STEP -->
            <div class="reservation_step">
                <ul>
                    <li>
                        <a href="#"><span>1.</span> Chọn ngày</a>
                    </li>
                    <li>
                        <a href="#"><span>2.</span> Chọn phòng</a>
                    </li>
                    <li class="active">
                        <a href="#"><span>3.</span> Xác nhận</a>
                    </li>
                </ul>
            </div>
            <!-- END / STEP -->
            <div class="row">
                <!-- SIDEBAR -->
                <div class="col-md-4 col-lg-3">
                    <div class="reservation-sidebar">
                        <!-- RESERVATION DATE -->
                        <div class="reservation-date">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Dates</h2>
                            <!-- END / HEADING -->
                            <ul>
                                <li>
                                    <span>Ngày nhận phòng</span>
                                    <span>{!! $params['check_in'] !!}</span>
                                </li>
                                <li>
                                    <span>Ngày trả phòng</span>
                                    <span>{!! $params['check_out'] !!}</span>
                                </li>
                                {{-- <li>
                                    <span>Total Nights</span>
                                    <span>2</span>
                                </li> --}}
                                <li>
                                    <span>Tổng phòng</span>
                                    <span>1</span>
                                </li>
                                <li>
                                    <span>Tổng khách</span>
                                    <span>{!! $params['adult'] . ' người lớn và '. $params['children'] .' trẻ em'!!}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END / RESERVATION DATE -->
                        <!-- ROOM SELECT -->
                        <div class="reservation-room-selected selected-4">
                            <!-- HEADING -->
                            <h2 class="reservation-heading">Phòng đã đặt</h2>
                            <!-- END / HEADING -->
                            <!-- ITEM -->
                            <div class="reservation-room-seleted_item">
                                {{-- <span class="reservation-option">2 Adult, 1 Child</span> --}}
                                <div class="reservation-room-seleted_name has-package">
                                    <h2><a href="#">{!! $params['room_name'] !!}</a></h2>
                                </div>
                                {{-- <div class="reservation-room-seleted_package">
                                    <h6>Space Price</h6>
                                    <ul>
                                        <li>
                                            <span>17 Decenber 2017</span>
                                            <span>$250.00</span>
                                        </li>
                                        <li>
                                            <span>24 Decenber 2017</span>
                                            <span>$320.00</span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span>Service</span>
                                            <span>Free</span>
                                        </li>
                                        <li>
                                            <span>Tax</span>
                                            <span>$30.00</span>
                                        </li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="reservation-room-seleted_total-room">
                                    TOTAL Room 1
                                    <span class="reservation-amout">$500.00</span>
                                </div> --}}
                            </div>
                            <!-- END / ITEM -->
                            <!-- TOTAL -->
                            <div class="reservation-room-seleted_total">
                                <label>Tổng cộng</label>
                                <span class="reservation-total">{!! number_format($params['room_price']).'đ' !!}</span>
                            </div>
                            <!-- END / TOTAL -->
                        </div>
                        <!-- END / ROOM SELECT -->
                    </div>
                </div>
                <!-- END / SIDEBAR -->
                <!-- CONTENT -->
                <div class="col-md-8 col-lg-9">
                    <div class="reservation_content">
                        <form action="{!! route('reservation/save') !!}" method="post" class="reservation-form">
                            <div class="reservation-billing-detail">
                                <h4>Thông tin người đặt</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Họ và tên<sup> *</sup></label>
                                        <input type="text" name="fullname" class="input-text" />
                                        <span style="color:red" class="error-fullname"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email<sup> *</sup></label>
                                        <input type="text" name="email" class="input-text" />
                                        <span style="color:red" class="error-email"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Điện thoại<sup> *</sup></label>
                                        <input type="text" name="phone" class="input-text" />
                                        <span style="color:red" class="error-phone"></span>
                                    </div>
                                </div>
                                <label>Ghi chú</label>
                                <textarea class="input-textarea" name="note" placeholder="Vui lòng ghi thêm yêu cầu của bạn ở đây, chúng tôi sẽ chuẩn bị trước khi bạn đến nhận phòng"></textarea>
                                {{ csrf_field() }}
                                <input type="hidden" name="room_id" value="{!! $params['room_id'] !!}">
                                <input type="hidden" name="room_name" value="{!! $params['room_name'] !!}">
                                <input type="hidden" name="price" value="{!! $params['room_price'] !!}">
                                <input type="hidden" name="check_in" value="{!! $params['check_in'] !!}">
                                <input type="hidden" name="check_out" value="{!! $params['check_out'] !!}">
                                <button class="btn btn-room btn4">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END / CONTENT -->
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $('.btn4').click(function(e) {
        e.preventDefault();
        var field = ['fullname','email','phone'];
        var check = true;
        $.each(field,function(key,value) {
            if($('input[name='+value+']').val().trim() == '') {
                check = false;
                $('span.error-'+value).text('Vui lòng nhập '+value);
            } else {
                check = true;
            }
        });
        if(check) $('.reservation-form').submit();
    });
</script>