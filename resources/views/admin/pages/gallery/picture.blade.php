@extends('admin.main')
@section('content')

<div class="x_panel">
    @include('admin.templates.x_title',['title' => 'Hình Ảnh'])
    @php
        $prefixAdmin = config('zvn.url.prefix_admin');
    @endphp
    <iframe src="{{url('admin123/laravel-file-manager')}}" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>
</div>

@endsection


