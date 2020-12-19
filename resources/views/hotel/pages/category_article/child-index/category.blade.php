@php
    use  App\Helpers\URL;
    $result = DB::table('article as a')->join('category_article as c', 'a.category_id', '=', 'c.id')->select(DB::raw('c.name,c.id,count(c.id) as count'))->where('c.status','active')->groupBy('a.category_id')->get();
    $result = json_decode(json_encode($result), true);
@endphp
@if (!empty($result))
  <div class="widget widget_categories">
    <h4 class="widget-title">Danh Mục</h4>
    <ul>
        @foreach ($result as $key => $value)
        @php
            $link = URL::linkCategoryArticle($value['id'],$value['name']);
        @endphp
          <li><a href="{{ $link }}">{{ $value['name'] }} &nbsp;({{ $value['count'] }})</a></li>
        @endforeach
    </ul>
  </div>
@endif
