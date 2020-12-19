@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr   = config('zvn.template.form_input');
    $formLabelAttr   = config('zvn.template.form_label');
    $value           = json_decode($itemSeo['value'], true);
    $inputHiddenID   = Form::hidden('id', $itemSeo['id'] ?? '');
    $inputHiddenTask = Form::hidden('task_seo', 'change-setting-seo');
    $elements = [
        [
            'label'   => Form::label('meta_keyword', 'Meta Keywork', $formLabelAttr),
            'element' => Form::text('meta_keyword', $value['meta_keyword'] ?? '', $formInputAttr )
        ],[
            'label'   => Form::label('meta_description', 'Meta Description', $formLabelAttr),
            'element' => Form::textarea('meta_description', $value['meta_description'] ?? '',  $formInputAttr )
        ],[
            'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@if (session('task') == 'change-setting-seo')
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
