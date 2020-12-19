@php
    // add default category
    $itemsCategory = ['default' => '-Chọn danh mục-'] + $itemsCategory;
    // override class
    $formLabelAttr['class'] = 'control-label col-md-4 col-sm-4 col-xs-12';
@endphp
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'Danh mục'])
    <div class="x_content">
        <div class="form-group">
            {{ Form::label('category_id', 'Danh mục', $formLabelAttr) }}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{ Form::select('category_id', $itemsCategory, $item['category_id'] ?? '', $formInputAttr) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Trạng thái', $formLabelAttr) }}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{ Form::select('status', $statusValue, $item['status'] ?? 'default', $formInputAttr) }}
            </div>
        </div>
    </div>
</div>
