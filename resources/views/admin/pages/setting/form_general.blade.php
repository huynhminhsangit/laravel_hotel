@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr         = config('zvn.template.form_input');
    $formCkEditorAttr      = config('zvn.template.form_ckeditor');
    $formLabelAttr         = config('zvn.template.form_label');
    $value                 = json_decode($itemGeneral['value'], true);
    $thumb                 = json_decode($value['logo'], true);
    $inputHiddenID         = Form::hidden('id', $itemGeneral['id'] ?? '');
    $inputHiddenLogoTop    = Form::hidden('logo_top_current', $thumb['logo_top'] ?? '');
    $inputHiddenLogoFooter = Form::hidden('logo_footer_current', $thumb['logo_footer'] ?? '');
    $inputHiddenFavicon    = Form::hidden('favicon_current', $thumb['favicon'] ?? '');
    $inputHiddenTask       = Form::hidden('task_general', 'change-setting-general');

    $elements = [
        [
            'label'   => Form::label('logo_top', 'Logo Top', $formLabelAttr),
            'element' => Form::file('logo_top', $formInputAttr ),
            'thumb'   => (!empty($itemGeneral['id'])) ? Template::showItemThumb($controllerName, $thumb['logo_top'] ?? '', 'favicon.ico') : null,
            'type'    => "thumb"
        ],
        [
            'label'   => Form::label('logo_footer', 'Logo Footer', $formLabelAttr),
            'element' => Form::file('logo_footer', $formInputAttr ),
            'thumb'   => (!empty($itemGeneral['id'])) ? Template::showItemThumb($controllerName, $thumb['logo_footer'] ?? '', 'favicon.ico') : null,
            'type'    => "thumb"
        ],
        [
            'label'   => Form::label('favicon', 'Favicon', $formLabelAttr),
            'element' => Form::file('favicon', $formInputAttr ),
            'thumb'   => (!empty($itemGeneral['id'])) ? Template::showItemThumb($controllerName, $thumb['favicon'] ?? '', 'favicon.ico') : null,
            'type'    => "thumb"
        ],
        [
            'label'   => Form::label('hotline', 'Hotline', $formLabelAttr),
            'element' => Form::text('hotline', $value['hotline'] ?? '',  $formInputAttr )
        ],
        [
            'label'   => Form::label('copyright', 'Copy right', $formLabelAttr),
            'element' => Form::text('copyright', $value['copyright'] ?? '',  $formInputAttr )
        ],
        [
            'label'   => Form::label('working_date', 'Thời gian làm việc', $formLabelAttr),
            'element' => Form::text('working_date', $value['working_date'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('slogan', 'Slogan', $formLabelAttr),
            'element' => Form::text('slogan', $value['slogan'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('location', 'Địa chỉ', $formLabelAttr),
            'element' => Form::text('location', $value['location'] ?? '', $formInputAttr )
        ],
        [
            'label'   => Form::label('introduce', 'Giới thiệu', $formLabelAttr),
            'element' => Form::textarea('introduce', $value['introduce'] ?? '', $formCkEditorAttr )
        ],
        [
            'element' => $inputHiddenID . $inputHiddenLogoTop . $inputHiddenLogoFooter . $inputHiddenFavicon.$inputHiddenTask. Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@if (session('task') == 'change-setting-general')
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
