@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue   = ['default' => 'Chọn trạng thái', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeMenuValue = ['default' => 'Chọn kiểu menu', 'direct' => config('zvn.template.type_menu.direct.name'), 'category' => config('zvn.template.type_menu.category.name'),  'product' => config('zvn.template.type_menu.product.name'),  'article' => config('zvn.template.type_menu.article.name')];
    $typeOpenValue = ['default' => 'Chọn kiểu mở', '_blank' => config('zvn.template.type_open._blank.name'), '_parent' => config('zvn.template.type_open._parent.name')];

    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');

    $elements = [
        [
            'label'   => Form::label('name', 'Tên menu', $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('link', 'Link', $formLabelAttr),
            'element' => Form::text('link', $item['link'] ?? '',  $formInputAttr )
        ],
        [
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr)
        ],
        [
            'label'   => Form::label('type_menu', 'Kiểu menu', $formLabelAttr),
            'element' => Form::select('type_menu', $typeMenuValue, $item['type_menu'] ?? 'default', $formInputAttr)
        ],
        [
            'label'   => Form::label('type_open', 'Kiểu mở', $formLabelAttr),
            'element' => Form::select('type_open', $typeOpenValue, $item['type_open'] ?? 'default', $formInputAttr)
        ],
        [
            'label'   => Form::label('parent_id', 'Thuộc về menu', $formLabelAttr),
            'element' => Form::select('parent_id', $nodes, $item['parent_id'] ?? '', $formInputAttr)
        ],
        [
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
