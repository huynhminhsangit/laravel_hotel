@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeSource  = ['default' => 'Select type source', 'vnexpress' => config('zvn.template.type_source.vnexpress.name'), 'cafebiz' => config('zvn.template.type_source.cafebiz.name')];

    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');

    $elements = [
        [
            'label'   => Form::label('name', 'Tên', $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr)
        ],[
            'label'   => Form::label('link', 'Link', $formLabelAttr),
            'element' => Form::text('link', $item['link'] ?? '',  $formInputAttr )
        ],[
            'label'   => Form::label('type_source', 'Kiểu nguồn', $formLabelAttr),
            'element' => Form::select('type_source', $typeSource, $item['type_source'] ?? 'default', $formInputAttr)
        ],[
            'label'   => Form::label('ordering', 'Sắp xếp', $formLabelAttr),
            'element' => Form::text('ordering', $item['ordering'] ?? '', $formInputAttr )
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
