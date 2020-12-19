@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $value         = json_decode($itemEmail['value'], true);
    $inputHiddenID   = Form::hidden('id', $itemEmail['id'] ?? '');
    $inputHiddenTask = Form::hidden('task_email', 'change-setting-email');

    $elements = [
        [
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::text('email', $value['email'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::text('password', $value['password']??'',  $formInputAttr )
        ],
        [
            'label'   => Form::label('bcc', 'Bcc', $formLabelAttr),
            'element' => Form::text('bcc', $value['bcc']??'',  $formInputAttr )
        ],
        [
            'element' => $inputHiddenID . $inputHiddenTask .Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];

@endphp
@if (session('task') == 'change-setting-email')
    @include ('admin.templates.error')
@endif
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                {{ Form::open([
                    'method'         => 'POST',
                    'url'            => route($controllerName .'/save'),
                    'accept-charset' => 'UTF-8',
                    'class'          => 'form-horizontal form-label-left',
                    'id'             => 'main-form' ])  }}
                    {!! FormTemplate::show($elements)  !!}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
