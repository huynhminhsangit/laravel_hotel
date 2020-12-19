@php
    use App\Helpers\URL;
    use App\Helpers\Template;
@endphp
@extends('hotel.main')
@section('content')
    @include('hotel.block.top-banner',['titlePage' => 'Chọn phòng'])
    <section class="section-reservation-page">
        <div class="container">
            <div class="reservation-page">
                <!-- STEP -->
                @include('hotel.pages.reservation.child-chooseRoom.reservation_step')
                <!-- END / STEP -->
                <div class="row">
                    <!--  SIDEBAR -->
                    <form action="{!! route('reservation/confirm') !!}" method="post" id="mainForm">
                        @csrf
                    @include('hotel.pages.reservation.child-chooseRoom.sidebar')
                    <!-- CONTENT -->
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <div class="reservation_content">
                            <!-- RESERVATION ROOM -->
                            <div class="reservation-room">
                                <!-- ITEM -->
                                @foreach ($itemsProduct as $key => $value)
                                @php
                                    $name = $value['name'];
                                    $id = $value['id'];
                                    $link = URL::linkProduct($value['id'],$value['name']);
                                    $price = number_format($value['price']).'đ';
                                    $thumb = json_decode($value['thumb'],true);
                                    $thumb = Template::showItemThumb('product',$thumb[0]['imageName'],$thumb[0]['imageAlt']);
                                    $content = Template::getStringByLength($value['content'],250);
                                    $attr = [];
                                    $attribute = json_decode($value['attribute'],true);
                                    foreach ($attribute as $key02 => $value02) { 
                                        if($value02['name'] == 'main') $attr['main'] = $value02['value'];
                                    }
                                @endphp
                                    <div class="reservation-room_item">
                                        <h2 class="reservation-room_name"><a href="{{ $link }}">{{ $name }}</a></h2>
                                        <div class="reservation-room_img">
                                            <a href="{{ $link }}">{!! $thumb !!}</a>
                                        </div>
                                        <div class="reservation-room_text">
                                            <div class="reservation-room_desc">
                                                <p>{!! $content !!}</p>
                                                <ul>
                                                    @foreach ($attr['main'] as $item)
                                                        <li>{{ $item }}</li>  
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <a href="{{ $link }}" class="reservation-room_view-more">Xem Thêm</a>
                                            <div class="clear"></div>
                                            <p class="reservation-room_price">
                                                <span class="reservation-room_amout">{{ $price }}</span> / Ngày
                                            </p>
                                            <button type="button" class="btn btn-room" data-id="{{ $id }}" data-name="{{ $name }}" data-price="{{ $value['price'] }}">Đặt Phòng</button>
                                        </div>
                                        <hr>
                                    </div>
                                    <!-- END / ITEM -->
                                @endforeach
                            </div>
                            <!-- END / RESERVATION ROOM -->
                        </div>
                        
                    </div>
                </form>    
                </div>
            </div>
        </div>
    </section>
<script>
    $('button[type=button]').click(function() {
        var check_in = $('input[name=check_in]').val();
        check_in = moment(check_in,'DD MM YYYY');
        var check_out = $('input[name=check_out]').val();
        check_out = moment(check_out,'DD MM YYYY');
        var diffDay = check_out.diff(check_in,'days');
        if(diffDay < 0) {
            errorNotify('Ngày đến ngày đi không hợp lệ');
        } else {
            var id = $(this).data('id');
            var price = $(this).data('price');
            var name = $(this).data('name');
            $('#mainForm').append('<input type="hidden" name="room_id" value="'+id+'" >');
            $('#mainForm').append('<input type="hidden" name="room_price" value="'+price+'" >');
            $('#mainForm').append('<input type="hidden" name="room_name" value="'+name+'" >');
            $('#mainForm').submit();
        }
    });
</script>
@endsection
