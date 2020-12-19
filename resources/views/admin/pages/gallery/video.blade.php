@extends('admin.main')
@section('content')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $elements = [
        [
            'label'   => Form::label('link', 'Link Playlist', $formLabelAttr),
            'element' => Form::text('link', $item['link'] ?? '', $formInputAttr )
        ],
        [
            'element' => Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
    $index = strpos($item['link'],'list=');
    $videoID = substr($item['link'],$index+5);
@endphp
@include ('admin.templates.zvn_notify')
@include ('admin.templates.error')

<div class="x_panel">
    @include('admin.templates.x_title',['title' => 'Link Video'])
    {{ Form::open([
        'method'         => 'POST',
        'url'            => route("$controllerName/save"),
        'accept-charset' => 'UTF-8',
        'class'          => 'form-horizontal form-label-left',
        'id'             => 'main-form' ])  }}
    {!! FormTemplate::show($elements)  !!}
    {{ Form::close() }}
</div>
@if ($index)
    <div class="x_panel">
        @include('admin.templates.x_title',['title' => 'Video'])
        <div id="video">
            <div class="row"></div>
        </div>
    </div>
@endif

<script>
    $(document).ready(function() {
        var iframe = '';
        $.get(
            "https://www.googleapis.com/youtube/v3/playlistItems",{
            part : 'snippet', 
            playlistId : '{{ $videoID }}',
            type : 'video',
            maxResults:50,
            key: 'AIzaSyA0t1ZWwuetBOrr5TfpKbqTFLJAtyFze4E'},
            function(data) {
                $.each(data.items,function(key, value) {
                    var id = value.snippet.resourceId.videoId;
                    iframe += `<div class="col-md-4"><iframe style="width:100%;height:300px" src="https:\/\/www.youtube.com/embed/${id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
                });
                $('#video').first().html(iframe);
            }
        );
        
    });
</script>
@endsection

