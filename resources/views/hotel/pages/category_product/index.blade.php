@php
    use App\Helpers\URL;
    use App\Helpers\Template;
@endphp
@extends('hotel.main')
@section('content')
@include('hotel.block.top-banner',[
    'breadcrumb' => $breadcrumb,
    'title' => 'Phòng Nghỉ'
    ])

<section class="body-room-6">
    <div class="container">
        <div class="wrap-room-6">
            @foreach ($itemsProduct as $key => $value)
            @php
                $index = $key + 1;
                $name = $value['name'];
                $link = URL::linkProduct($value['id'],$value['name']);
                $price = number_format($value['price']).'đ';
                $text = ($index % 2 == 0) ? 'text-1' : 'text';
                $thumb = json_decode($value['thumb'],true);
                $thumb = Template::showItemThumb('product',$thumb[0]['imageName'],$thumb[0]['imageAlt']);
                $content = Template::getStringByLength($value['content'],250);
                $attr = [];
                $attribute = json_decode($value['attribute'],true);
                foreach ($attribute as $key => $value) { 
                    if($value['name'] == 'main') $attr['main'] = $value['value'];
                }
            @endphp
                <div class="wrap-item ">
                    <div class="img" style="height:400px;overflow:hidden">
                        <a href="{{ $link }}" style="position:absolute;left:50%;top:50%;transform:translateY(-50%) translateX(-50%);">{!! $thumb !!}</a>
                    </div>
                    <div class="{{ $text }}">
                        <a href="{{ $link }}"><h2 class="h2-rooms">{{ $name }}</h2></a>
                        <h5 class="h5-room">{{ $price }} / ngày</h5>
                        <p>{!! $content !!}</p>
                        <ul>
                            @foreach ($attr['main'] as $item)
                                <li>{{ $item }}</li>  
                            @endforeach
                        </ul>
                        <a href="{{ $link }}" class="view-dateails btn btn-room">Xem Thêm</a>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>

@endsection
