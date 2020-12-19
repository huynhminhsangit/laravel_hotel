@php
    $check_in = $errors->messages()['check_in'][0] ?? '';
    $check_out = $errors->messages()['check_out'][0] ?? '';
    $now = date("d-m-Y");
    $nextDay = date('d-m-Y', strtotime(' +1 day'));
@endphp
<div class="product-detail_book">
    <form action="{!! route('reservation/confirm') !!}" method="post">
        <div class="product-detail_total">
            <h6 >Giá chỉ từ</h6>
            <p class="price">
                <span class="amout">{{ number_format($itemProduct['price']).'đ' }}</span> / ngày
            </p>
        </div>
        <div class="product-detail_form">
            <div class="sidebar">
                <!-- WIDGET CHECK AVAILABILITY -->
                <div class="widget widget_check_availability">
                    <div class="check_availability">
                        <div class="check_availability-field">
                            <label>Ngày nhận phòng</label>
                            <div class="input-group date" data-date-format="dd-mm-yyyy" id="datepicker1">
                                <input class="form-control wrap-box" type="text" name="check_in" value="{{ $now }}">
                                <span class="input-group-addon"><i class="fa fa-calendar"  aria-hidden="true"></i></span>
                            </div>
                            @if (!empty($check_in))
                                <br/>
                                <span style="color:red">{{ $check_in }}</span>
                            @endif
                        </div>
                        <div class="check_availability-field">
                            <label>Ngày trả phòng</label>
                            <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                                <input class="form-control wrap-box" type="text" name="check_out" value="{{ $nextDay }}">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            @if (!empty($check_out))
                                <br/>
                                <span style="color:red">{{ $check_out }}</span>
                            @endif
                        </div>
                        <div class="check_availability-field">
                            <label>Người Lớn</label>
                            <select class="awe-select" name="adult">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="check_availability-field">
                            <label>Trẻ Em</label>
                            <select class="awe-select" name="children">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET CHECK AVAILABILITY -->
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="room_id" value="{!! $itemProduct['id'] !!}">
            <input type="hidden" name="room_name" value="{!! $itemProduct['name'] !!}">
            <input type="hidden" name="room_price" value="{!! $itemProduct['price'] !!}">
            <button class="btn btn-room btn-product">Đặt ngay</button>
        </div>
    </form>
</div>
<div class="reservation-date" style="margin-top:5px">
    <!-- HEADING -->
    <h3 class="reservation-heading" style="padding:5px 20px">Thông Tin Đặt Phòng</h3>
    <!-- END / HEADING -->
    <ul style="padding: 10px 20px;">
        <li>
            <span>Thời gian:</span>
            <span id="time_check">1 ngày 1 đêm</span>
        </li>
        <li>
            <span>Tổng tiền:</span>
            <span id="total_price">{{ number_format($itemProduct['price']).'đ' }}</span>
        </li>
    </ul>
</div>
