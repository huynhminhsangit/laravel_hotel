@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr    = config('zvn.template.form_input');
    $formCkeditorAttr = config('zvn.template.form_ckeditor');
    $formLabelAttr    = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Select status', 'contact' => 'đã liên hệ', 'uncontact' => 'chưa liên hệ'];
    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');

    $elements = [
        [
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::text('email', $item['email'] ?? '',  $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr)
        ],[
            'element' => $inputHiddenID . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST',
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
