@extends('admin.main')
@php
    use App\Helpers\Template as Template;
    $xhtmlButtonFilter   = Template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status'], $params['search']);
    $xhtmlAreaSearch     = Template::showAreaSearch($controllerName, $params['search']);
    $arrSelectFilterDay  = ['all' => '- Tất cả -', 'today' => 'Hôm nay', 'yesterday' => 'Hôm qua', 'this_week' => 'Tuần này', 'this_month' => 'Tháng này', 'last_month' => 'Tháng trước'];
    $xhtmlCategoryFilter = Template::showSelectFilter($controllerName,$arrSelectFilterDay,$params['filter']['date'],'date');
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
                            {!! $xhtmlButtonFilter !!}
                        </div>
                        <div class="col-md-6">{!! $xhtmlAreaSearch !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            {!! Form::label('filter_date', 'Lọc theo ngày', null) !!}
                            {!! $xhtmlCategoryFilter !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Danh sách'])
                @include('admin.pages.reservation.list')
            </div>
        </div>
    </div>

    @if (count($items) > 0)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title', ['title' => 'Phân trang'])
                    @include('admin.templates.pagination')
                </div>
            </div>
        </div>
    @endif
@endsection
