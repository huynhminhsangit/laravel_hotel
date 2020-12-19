@extends('hotel.main')
@section('content')
    @include('hotel.block.top-banner',['titlePage' => 'Về chúng tôi'])
    @include('hotel.pages.about_us.child-index.section_about_us', ['titleSection'=> 'Về chúng tôi', 'items' => $itemsSetting])
    @include('hotel.pages.about_us.child-index.section_team_member', ['titleSection'=> 'Nhân sự chủ chốt','items' => $itemsEmployee,
    'folderImage' => $folderImage['section_team_member']])
@endsection
