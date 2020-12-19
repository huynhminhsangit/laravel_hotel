@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');


    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb'] ?? '');

    $elements = [
        [
            'label'   => Form::label('fullname', 'Họ và tên', $formLabelAttr),
            'element' => Form::text('fullname', $item['fullname'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('position', 'Chức vụ', $formLabelAttr),
            'element' => Form::text('position', $item['position']??'',  $formInputAttr )
        ],
        [
            'label'   => Form::label('phone', 'Điện thoại', $formLabelAttr),
            'element' => Form::text('phone', $item['phone'] ?? '',  $formInputAttr )
        ],
        [
            'label'   => Form::label('ordering', 'Sắp xếp', $formLabelAttr),
            'element' => Form::number('ordering', $item['ordering'] ?? '',  $formInputAttr )
        ],
        [
            'label'   => Form::label('thumb', 'Ảnh đại diện', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null ,
            'type'    => "thumb"
        ],
        [
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
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
