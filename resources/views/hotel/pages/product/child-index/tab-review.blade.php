@php
    use App\Helpers\Template;
    $id = request()->product_id;
    $result = DB::table('review')->select('name','content','star','thumb')->where('product_id',$id)->where('status','active')->orderBy('star','desc')->get()->toArray();
    $result = json_decode(json_encode($result),true);
@endphp
@foreach ($result as $value)
@php
    $thumb = Template::showItemThumb('review',$value['thumb'],null)
@endphp
    <div class="row">
        <div class="col-md-3">{!! $thumb !!}</div>
        <div class="col-md-9">
            <h5>{{ $value['name'] }}</h5>
            <p>
            @php
                $starHtml = '';
                for($i = 0; $i < $value['star']; $i++) {
                    $starHtml .= '<i class="fa fa-star" style="margin-right:3px"></i>';
                }
                echo $starHtml;
            @endphp
            </p>
            <p>{{ $value['content'] }}</p>   
        </div>
    </div>
    <hr>
@endforeach