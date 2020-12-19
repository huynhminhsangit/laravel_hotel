@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor     = config('zvn.template.form_ckeditor');
    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeMenuValue      = ['default' => 'Select type menu', 'direct' => config('zvn.template.type_menu.direct.name'), 'category' => config('zvn.template.type_menu.category.name')];
    $typeOpenValue      = ['default' => 'Select type open', '_blank' => config('zvn.template.type_open._blank.name'), '_parent' => config('zvn.template.type_open._parent.name')];

    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');
    $itemCategory = ['default' => 'Select Category'] + $itemCategory;
    $elements = [
        [
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttr),
            'element' => Form::text('ordering', $item['ordering'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr)
        ],[
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemCategory, $item['category_id'], $formInputAttr)
        ],[
            'label'   => Form::label('question', 'Question', $formLabelAttr),
            'element' => Form::text('question', $item['question'] ?? '',  $formInputAttr )
        ],[
            'label'   => Form::label('answer', 'Answer',  $formLabelAttr),
            'element' => Form::textarea('answer', $item['answer'] ?? '',  $formCkeditor)
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
