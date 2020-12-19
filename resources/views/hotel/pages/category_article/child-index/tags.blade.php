@php
    use App\Helpers\URL;
    $result = DB::table('tags')->select()->orderBy('id','desc')->limit(8)->pluck('name','id');
@endphp

<div class="widget widget_tag_cloud">
  <h4 class="widget-title">Tags</h4>
  <div class="tagcloud">
    @foreach ($result as $key => $value)
    @php
        $linkTags = URL::linkTags($key,$value);
    @endphp
      <a href="{{$linkTags}}">{{ $value }}</a>
    @endforeach
  </div>
</div>

