@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp
<div class="product-detail_content">
    <div class="row">
        <!-- ITEM -->
        @foreach ($items as $item)
        @php
            $link = URL::linkProduct($item['id'],$item['name']);
            $mainAttribute = [];
            $attribute = json_decode($item['attribute'],true);
            foreach ($attribute as $key => $value) {
                if($value['name'] == 'main') {
                    $mainAttribute = $value['value'];
                } else {
                }
            }
            $thumb = json_decode($item['thumb'],true);
            $thumb = Template::showItemThumb($controllerName,$thumb[0]['imageName'],$thumb[0]['imageAlt']);
        @endphp
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="product-detail_item">
                    <div class="img" style="height:150px;overflow:hidden;">
                        <a href="{{ $link }}">{!!$thumb!!}</a>
                    </div>
                    <div class="text">
                        <h2><a href="{{ $link }}">{{$item['name']}}</a></h2>
                        <ul>
                            <li><i class="fa fa-child" aria-hidden="true"></i>{{$mainAttribute[0]}}</li>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> {{$mainAttribute[3]}}</li>
                            <li><i class="fa fa-eye" aria-hidden="true"></i> {{$mainAttribute[2]}}</li>
                        </ul>
                        <a href="{{ $link }}" class="btn btn-room">Xem Thêm</a>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END / ITEM -->
    </div>
</div>