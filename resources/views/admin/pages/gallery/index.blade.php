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
@endphp
@include ('admin.templates.zvn_notify')
<div class="x_panel">
    @include('admin.templates.x_title',['title' => 'Hình Ảnh'])
    @php
        $prefixAdmin = config('zvn.url.prefix_admin');
    @endphp
    <iframe src="{{url('admin123/laravel-file-manager')}}" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
</div>
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
@endsection


