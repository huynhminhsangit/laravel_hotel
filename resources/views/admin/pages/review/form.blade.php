@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $statusValue   = ['default' => 'Chọn trạng thái', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $starValue     = [
        'default' => 'Chọn số sao',
        '1'       => config('zvn.template.star.1.name'),
        '2'       => config('zvn.template.star.2.name'),
        '3'       => config('zvn.template.star.3.name'),
        '4'       => config('zvn.template.star.4.name'),
        '5'       => config('zvn.template.star.5.name')
    ];
    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb'] ?? '');

    $elements = [
        [
            'label'   => Form::label('name', 'Tên KH', $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('content', 'Nhận xét', $formLabelAttr),
            'element' => Form::textarea('content', $item['content']??'',  $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr)
        ],[
            'label'   => Form::label('star', 'Số sao', $formLabelAttr),
            'element' => Form::select('star', $starValue, $item['star'] ?? 'default', $formInputAttr)
        ],[
            'label'   => Form::label('product_id', 'Thuộc về phòng',  $formLabelAttr),
            'element' => Form::select('product_id', $itemsProduct, $item['product_id'] ?? '',  $formInputAttr)
        ],[
            'label'   => Form::label('thumb', 'Hình KH', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null ,
            'type'    => "thumb"
        ],[
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
