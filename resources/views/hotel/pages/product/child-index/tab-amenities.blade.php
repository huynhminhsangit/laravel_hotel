<div class="product-detail_amenities">
  <p style="font-weight: bold">CÁC TIỆN NGHI SẴN CÓ</p>
  <div class="row">
    @php
    $attr = [];
    $attribute = json_decode($itemProduct['attribute'],true);
    foreach ($attribute as $key => $value) { 
        if($value['name'] != 'main' && $value['name'] != 'special' && $value['name'] != 'service') {
          $attr[$value['name']] = $value['value'];
        }
    }
    @endphp
    @foreach ($attr as $key => $value)
      <div class="col-xs-6 col-lg-4">  
          <h6>{{ $key }}</h6>
          <ul>
              @foreach ($value as $item)
                <li>{{ $item }}</li>
              @endforeach
          </ul>
      </div>
    @endforeach
  </div>
</div>