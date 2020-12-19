@extends('admin.main')
@php
    use App\Helpers\Template as Template;
    $xhtmlCategoryFilter = Template::showSelectFilter($controllerName,$itemsProduct,$params['filter']['room'],'room');
@endphp
@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false, 'page' => $controllerName])
    @include ('admin.templates.zvn_notify')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Bộ lọc'])
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('filter_date', 'Lọc theo phòng', null) !!}
                            {!! $xhtmlCategoryFilter !!}
                        </div>
                        <div class="col-md-2">
                            <div class="lnb-calendars-item">
                                <label>
                                    <input type="checkbox" class="tui-full-calendar-checkbox-round" value="1" checked="" />
                                    <span style="border-color: #099ade; background-color: #099ade;"></span>
                                    <span>Đặt chỗ</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="lnb-calendars-item">
                                <label>
                                    <input type="checkbox" class="tui-full-calendar-checkbox-round" value="1" checked="" />
                                    <span style="border-color:#f59042; background-color: #f59042;"></span>
                                    <span>Giữ chỗ</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="lnb-calendars-item">
                                <label>
                                    <input type="checkbox" class="tui-full-calendar-checkbox-round" value="1" checked="" />
                                    <span style="border-color:#075e1d; background-color: #075e1d;"></span>
                                    <span>Nhận phòng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Lịch'])
                @include('admin.pages.reservation.calendar')
            </div>
        </div>
    </div>
@endsection
