@extends('news.main')
@section('content')
<div class="section-category">
    @include('news.block.breadcrumb', ['item' =>['name'=> 'Liên hệ']])
    <div class="content_container container_category">
        <div class="featured_title">
            <div class="container">
                <div class="row">
                    @include ('news.templates.alert')
                    @include('news.pages.contact.child-index.introduce', ['item' => $itemsSetting])
                    @include('news.pages.contact.child-index.form_contact')
                    @include('news.pages.contact.child-index.map', ['item' => $itemsSetting])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
