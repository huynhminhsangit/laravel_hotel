@php
    use App\Helpers\URL;
    $result = DB::table('article')->select('name','thumb','created','id')->where('status','active')->orderBy('id','desc')->limit(4)->get()->toArray();
    $result = json_decode(json_encode($result), true);
@endphp
<div class="widget widget_recent_entries ">
  <h4 class="widget-title">Bài viết gần đây</h4>
  <ul>
      @foreach ($result as $item)
      @php
          $date = strtotime($item['created']);
          $time = date('H:i',$date);
          $linkArticle = URL::linkArticle($item['id'],$item['name']);
      @endphp
        <li>
          <div class="img">
              <a href="{{ $linkArticle }}"><img src="{{asset('images/article/'.$item['thumb'])}}" alt="#"></a>
          </div>
          <div class="text">
            <a href="{{ $linkArticle }}">{{ $item['name'] }}</a>
              <span class="date">đăng ngày {{date('d/m/Y',$date)}}</span>
              {{-- <span class="date">at {{$time}}, {{date('D d M Y',$date)}}</span> --}}
          </div>
        </li>
      @endforeach
  </ul>
</div>
