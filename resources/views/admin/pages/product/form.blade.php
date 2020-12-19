@extends('admin.main')
@php

    use App\Helpers\Template;

    $formLabelAttr    = config('zvn.template.form_label');
    $formInputAttr    = config('zvn.template.form_input');
    $formCkeditor     = config('zvn.template.form_ckeditor');
    $formDropZone     = config('zvn.template.form_dropzone');
    $statusValue      = ['default' => '- Select Status-', 'active' => Config::get('zvn.template.status.active.name'), 'inactive' => Config::get('zvn.template.status.inactive.name')];
    $inputHiddenID    = Form::hidden('id', $item['id'] ?? '');

    $elements = [
        [
            'label'   => Form::label('name', 'Tên phòng',  $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '',  ['class' =>$formInputAttr, 'onchange' => 'createSlug(this)']),
            'type'    => 'input-product'
        ],
        [
            'label'   => Form::label('slug', 'Slug',  $formLabelAttr),
            'element' => Form::text('slug', $item['slug'] ?? '', ['class' =>$formInputAttr]),
            'type'    => 'input-product'
        ],
        [
            'label'   => Form::label('price', 'Giá',  $formLabelAttr),
            'element' => Form::text('price', $item['price'] ?? '',  ['class' =>$formInputAttr]),
            'type'    => 'input-product'
        ],
        [
            'label'   => Form::label('content', 'Nội dung',  $formLabelAttr),
            'element' => Form::textarea('content', $item['content'] ?? '',  $formCkeditor),
            'type'    => 'input-product'
        ],
        [
            'element' =>$inputHiddenID,
            'type'    => 'btn-submit'
        ],
    ];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false, 'page' => 'product'])
    @include ('admin.templates.error')

        {{ Form::open([
            'method'         => 'POST',
            'url'            => route("$controllerName/save"),
            'accept-charset' => 'UTF-8',
            'files'=> true,
            'enctype'        => 'multipart/form-data',
            'class'          => 'form-horizontal form-label-left',
            'id'             => 'main-form' ])  }}
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                @include('admin.pages.product.form_detail')
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                @include('admin.pages.product.form_category')
                {{-- @include('admin.pages.product.form_setting') --}}
                @include('admin.pages.product.form_seo')
            </div>
        </div>
        <div class="row">
            @include('admin.pages.product.form_attribute')
        </div>
        <div class="row">
            @include('admin.pages.product.form_image')
        </div>
        {{ Form::close() }}


@endsection
