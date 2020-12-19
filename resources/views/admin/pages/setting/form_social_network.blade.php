@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr   = config('zvn.template.form_input');
    $formLabelAttr   = config('zvn.template.form_label');
    $value           = json_decode($itemSocial['value'], true);
    $inputHiddenID   = Form::hidden('id', $itemSocial['id'] ?? '');
    $inputHiddenTask = Form::hidden('task_social', 'change-setting-social');
    $elements = [
        [
            'label'   => Form::label('facebook', 'Facebook', $formLabelAttr),
            'element' => Form::text('facebook', $value['facebook'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('group', 'Group Facebook', $formLabelAttr),
            'element' => Form::text('group', $value['group'] ?? '',  $formInputAttr )
        ],[
            'label'   => Form::label('fan_page', 'Fan Page', $formLabelAttr),
            'element' => Form::text('fan_page', $value['fan_page'] ?? '', $formInputAttr)
        ],[
            'label'   => Form::label('youtube', 'Youtube', $formLabelAttr),
            'element' => Form::text('youtube', $value['youtube'] ?? '',  $formInputAttr )
        ],[
            'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@if (session('task') == 'change-setting-social')
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
