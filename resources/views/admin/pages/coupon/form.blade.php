@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr         = config('zvn.template.form_input');
    $formLabelAttr         = config('zvn.template.form_label');
    $formInputPrice        = config('zvn.template.form_input_price');
    $statusValue           = ['default' => '- Chọn trạng thái -', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeCouponValue       = ['default' => '- Chọn loại coupon -', 'direct' => config('zvn.template.type_coupon.direct.name'), 'percent' => config('zvn.template.type_coupon.percent.name')];
    $inputHiddenID         = Form::hidden('id', $item['id'] ?? '');

    $elements = [
        [
            'label'   => Form::label('code', 'Mã coupon', $formLabelAttr),
            'element' => Form::text('code', $item['code'] ?? Str::random(10), ['class' =>$formInputAttr, 'id' => 'code']),
            'button' => Form::button('<i class="fa fa-refresh"></i>'),
            'type'    => "input-code"
        ],
        [
            'label'   => Form::label('total', 'Tổng có', $formLabelAttr),
            'element' => Form::number('total', $item['total'] ?? '', ['class' => $formInputAttr, 'min' => 0 ])
        ],
        [
            'label'   => Form::label('start_price', 'Giá bắt đầu', $formLabelAttr),
            'element' => Form::number('start_price', $item['start_price'] ?? '', ['class' => $formInputPrice, 'id' => 'start_price', 'min'=>0])
        ],
        [
            'label'   => Form::label('end_price', 'Giá kết thúc', $formLabelAttr),
            'element' => Form::number('end_price', $item['end_price'] ?? '', ['class' => $formInputPrice, 'min'=> 0])
        ],
        [
            'label'   => Form::label('type', 'Loại coupon', $formLabelAttr),
            'element' => Form::select('type', $typeCouponValue, $item['type'] ?? 'default', $formInputAttr)
        ],
        [
            'label'   => Form::label('value', 'Giá trị', $formLabelAttr),
            'element' => Form::number('value', $item['value'] ?? '', ['class' => $formInputAttr, 'min'=> 0] )
        ],
        [
            'label'   => Form::label('start', 'Ngày bắt đầu (tháng/ngày/năm)', $formLabelAttr),
            'element' => Form::date('start', $item['start'] ?? \Carbon\Carbon::now(), $formInputAttr)
        ],
        [
            'label'   => Form::label('end', 'Ngày kết thúc (tháng/ngày/năm)', $formLabelAttr),
            'element' => Form::date('end', $item['end'] ?? \Carbon\Carbon::now(), $formInputAttr)
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
