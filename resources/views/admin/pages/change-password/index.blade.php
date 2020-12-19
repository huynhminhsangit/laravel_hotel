@extends('admin.main')
@section('content')
@php
    use App\Helpers\Template as Template; 
    use App\Helpers\Form as FormTemplate; 
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $elements = [
        [
        'label' => Form::label('current_password', 'Current Password',$formLabelAttr),
        'element' => Form::text('current_password', null,$formInputAttr),
        ],
        [
        'label' => Form::label('new_password', 'New Password',$formLabelAttr),
        'element' => Form::text('new_password', null,$formInputAttr),
        ],
        [
        'label' => Form::label('password_confirmation', 'Password Confirmation',$formLabelAttr),
        'element' => Form::text('password_confirmation', null,$formInputAttr),
        ],
        [
        'type' => 'btn-submit',
        'element' => Form::submit('Save',['class' => 'btn btn-success'])
        ]
    ];
@endphp
@include ('admin.templates.error')
@include ('admin.templates.zvn_notify')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title',['title' => 'Form Change Password'])
        <div class="x_content">
        {!! Form::open([
                'method' => 'POST',
                'url' => route("$controllerName/save"),
                'accept-charset' => 'UTF-8',
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal form-label-left',
                'id' => 'main-form'
        ]) !!}
        {!! FormTemplate::show($elements,$errors) !!}
        {!! Form::close() !!}
        </div> 
    </div>
</div> 
@endsection


