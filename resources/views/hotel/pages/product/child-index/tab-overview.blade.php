
<p>{!!$itemProduct['content']!!}</p>
<div class="row">
    <div class="col-xs-6 col-md-4">
        <h6>Thông Tin</h6>
        @php
            $attr = [];
            $attribute = json_decode($itemProduct['attribute'],true);
            foreach ($attribute as $key => $value) { 
                switch ($value['name']) {
                    case 'main':
                        $attr['main'] = $value['value'];
                        break;
                    case 'special':
                        $attr['special'] = $value['value'];
                        break;
                    case 'service':
                        $attr['service'] = $value['value'];
                        break;
                    default:
                        break;
                }
            }
        @endphp
        <ul>
            @foreach ($attr['main'] as $item)
                <li>{{ $item }}</li>  
            @endforeach
        </ul>
    </div>
    <div class="col-xs-6 col-md-4">
        <h6>Đặc Biệt</h6>
        <ul>
            @foreach ($attr['special'] as $item)
                <li>{{ $item }}</li>  
            @endforeach
        </ul>
    </div>
    <div class="col-xs-6 col-md-4">
        <h6>Dịch Vụ Khác</h6>
        <ul>
            @foreach ($attr['service'] as $item)
                <li>{{ $item }}</li>  
            @endforeach
        </ul>
    </div>
</div>