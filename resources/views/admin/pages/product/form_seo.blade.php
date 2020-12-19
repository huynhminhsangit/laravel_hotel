@php
    $arrMeta = json_decode($item['meta'], true);
    if(!empty($item['id']) && count($arrMeta) > 0){
        $metaTitle       = $arrMeta['title'];
        $metaDescription = $arrMeta['description'];
        $metaKeyword     = $arrMeta['keyword'];
    }

@endphp
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'SEO'])
    <div class="x_content">
        <div class="form-group">
            {{ Form::label('meta_title', 'Meta Title', $formLabelAttr) }}
            <div class="col-md-9">
                {{ Form::text('meta_title', $metaTitle ?? '', ['class' => $formInputAttr, 'name' => 'arrMeta[title]']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('meta_description', 'Meta Description', $formLabelAttr) }}
            <div class="col-md-9">
                {{ Form::textarea('meta_description', $metaDescription ?? '', ['class' => $formInputAttr, 'rows' => 5, 'name' => 'arrMeta[description]']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('meta_keyword', 'Meta Keyword', $formLabelAttr) }}
            <div class="col-md-9">
                <select class="form-control attr-value" name="arrMeta[keyword][]"  multiple="multiple">';
                    @if ($item['id'] && $metaKeyword != null)
                        @foreach ($metaKeyword as $meta)
                            <option value="{!! $meta !!}" selected>{!! $meta !!}</option>
                        @endforeach
                    @endif

                </select>
            </div>
        </div>
    </div>
</div>

