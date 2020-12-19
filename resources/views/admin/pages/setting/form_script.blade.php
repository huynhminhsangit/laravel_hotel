@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr   = config('zvn.template.form_input');
    $formLabelAttr   = config('zvn.template.form_label');
    $value           = json_decode($itemScript['value'], true);
    $inputHiddenID   = Form::hidden('id', $itemScript['id'] ?? '');
    $inputHiddenTask = Form::hidden('task_script', 'change-setting-script');
    $elements = [
        [
            'label'   => Form::label('map', 'Google Map', $formLabelAttr),
            'element' => Form::textarea('map', $value['map'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('script_head', 'Script sau head', $formLabelAttr),
            'element' => Form::textarea('script_head', $value['script_head'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('script_body', 'Script sau body', $formLabelAttr),
            'element' => Form::textarea('script_body', $value['script_body'] ?? '',  $formInputAttr )
        ],[
            'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@if (session('task') == 'change-setting-script')
    @include ('admin.templates.error')
@endif
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
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
