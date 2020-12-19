<div class="x_title">
    <h2>{{ $title }}</h2>
    <ul class="nav navbar-right panel_toolbox">
        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        @if (isset($countContact) && isset($section))
            <h2>Hôm nay có <span style="color:red;font-weight:bold">{{ $countContact }}</span> người liên hệ</h2>
        @endif
    </ul>
    <div class="clearfix"></div>
</div>
