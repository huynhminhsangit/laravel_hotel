@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formLabelAttr    = config('zvn.template.form_label');
    $formInputAttr    = config('zvn.template.form_input');
    $statusValue      = ['default' => 'Chọn trạng thái', 'active' => Config::get('zvn.template.status.active.name'), 'inactive' => Config::get('zvn.template.status.inactive.name')];
    $changePriceValue = ['default' => 'Chọn kiểu thay đổi giá', 'yes' => Config::get('zvn.template.change_price_status.yes.name'), 'no' => Config::get('zvn.template.change_price_status.no.name')];
    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');
    $elements         = [
        [
            'label'   => Form::label('name', 'Tên thuộc tính',  $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '',  $formInputAttr)
        ],
        [
            'label'   => Form::label('status', 'Trạng thái',  $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default',  $formInputAttr)
        ],
        [
            'label'   => Form::label('change_price', 'Thay đổi giá',  $formLabelAttr),
            'element' => Form::select('change_price', $changePriceValue, $item['change_price'] ?? 'default',  $formInputAttr)
        ],
        [
            'label'   => Form::label('group_attribute_id', 'Thuộc về nhóm thuộc tính',  $formLabelAttr),
            'element' => Form::select('group_attribute_id', $groupAttribute, null, ['class' => $formInputAttr, 'multiple' => true, 'name' => 'group_attribute_id[]'])
        ],
        [
            'element' =>$inputHiddenID. Form::submit('Save', ['class' => 'btn btn-success']),
            'type'    => 'btn-submit'
        ],
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
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#group_attribute_id').select2();
        var data = {!! $item['group_attribute_id'] !!}
        $('#group_attribute_id').val(data);
        $('#group_attribute_id').trigger('change');
    });
</script>
