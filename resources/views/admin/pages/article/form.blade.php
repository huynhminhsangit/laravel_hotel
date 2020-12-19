@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formLabelAttr    = config('zvn.template.form_label');
    $formInputAttr    = config('zvn.template.form_input');
    $formCkeditor     = config('zvn.template.form_ckeditor');
    $statusValue      = ['default' => '- Select Status-', 'active' => Config::get('zvn.template.status.active.name'), 'inactive' => Config::get('zvn.template.status.inactive.name')];
    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');
    $inputHiddenThumb = Form::hidden('thumb_current', $item['thumb'] ?? '');
    $tagsHTML = '<select class="form-control col-md-6 col-xs-12 tags" name="tags[]"  multiple="multiple">';
        if(!empty($item['id']) && !empty($tags)) {
            foreach ($tags as $key => $value) {
                $tagsHTML .= '<option value="'.$value.'" selected>'.$value.'</option>';
            }
        }
    $tagsHTML .= '</select>';

    $elements = [
        [
            'label'   => Form::label('name', 'Tên bài viết',  $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '',  $formInputAttr)
        ],
        [
            'label'   => Form::label('content', 'Nội dung',  $formLabelAttr),
            'element' => Form::textarea('content', $item['content'] ?? '',  $formCkeditor)
        ],
        [
            'label'   => Form::label('status', 'Trạng thái',  $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'] ?? 'default',  $formInputAttr)
        ],
        [
            'label'   => Form::label('category_id', 'Thuộc về danh mục',  $formLabelAttr),
            'element' => Form::select('category_id', $nodes, $item['category_id'] ?? '',  $formInputAttr)
        ],
        [
            'label'   => Form::label('thumb', 'Hình ảnh',  $formLabelAttr),
            'element' => Form::file('thumb',  $formInputAttr),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']): null,
            'type'    => 'thumb'
        ],
        [
            'label'   => Form::label('meta_keyword', 'Meta Keyword',  $formLabelAttr),
            'element' => Form::text('meta_keyword', $item['meta_keyword'] ?? '',  $formInputAttr)
        ],
        [
            'label'   => Form::label('meta_description', 'Meta Description',  $formLabelAttr),
            'element' => Form::textarea('meta_description', $item['meta_description'] ?? '',  $formInputAttr)
        ],
        [
            'label'   => Form::label('tags', 'Thẻ',  $formLabelAttr),
            'element' => $tagsHTML
        ],
        [
            'element' =>$inputHiddenID. $inputHiddenThumb. Form::submit('Save', ['class' => 'btn btn-success']),
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

<script src="{{asset('admin/asset/select2/js/select2.min.js')}}"></script>
<script>
    $('.tags').select2({tags: true});
</script>

@endsection
