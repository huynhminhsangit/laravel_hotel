@extends('admin.main')
@section('content')
    @include ('admin.templates.zvn_notify')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Cấu hình website'])
                @include('admin.pages.setting.list')
            </div>
        </div>
    </div>
@endsection
