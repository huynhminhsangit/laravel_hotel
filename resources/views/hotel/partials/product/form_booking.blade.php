@php
    $src  = url('images/setting') . '/';
    $logo = json_decode(json_decode($itemsSetting[0]['value'], true)['logo'], true)[2];
    use App\Helpers\Template;
@endphp
<div class="col-lg-3">
    <!-- FORM BOOK -->
    <div class="product-detail_book">
        <div class="product-detail_total">
            <img src="{{ $src . $logo }}" alt="#" class="icon-logo">
            <h6>Giá chỉ từ</h6>
            <p class="price">
                <span class="amout">{!! Template::showPrice($item['price'], 'right') !!}</span> /ngày
            </p>
        </div>
        <div class="product-detail_form">
            <div class="sidebar">
                <!-- WIDGET CHECK AVAILABILITY -->
                <div class="widget widget_check_availability">
                    <div class="check_availability">
                        <div class="check_availability-field">
                            <label>Ngày đến</label>
                            <div class="input-group date" data-date-format="dd-mm-yyyy" id="datepicker1">
                                <input class="form-control wrap-box" type="text" placeholder="Ngày đến">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="check_availability-field">
                            <label>Ngày đi</label>
                            <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                                <input class="form-control wrap-box" type="text" placeholder="Ngày đi">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="check_availability-field">
                            <label>Người lớn</label>
                            <select class="awe-select bs-select-hidden">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select><div class="btn-group bootstrap-select awe-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="1"><span class="filter-option pull-left">1</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">1</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">2</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">3</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">4</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
                        </div>
                        <div class="check_availability-field">
                            <label>Trẻ em</label>
                            <select class="awe-select bs-select-hidden">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select><div class="btn-group bootstrap-select awe-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="1"><span class="filter-option pull-left">1</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">1</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">2</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">3</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">4</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET CHECK AVAILABILITY -->
            </div>
            <button class="btn btn-room btn-product">Đặt ngay</button>
        </div>
    </div>
    <!-- END / FORM BOOK -->
</div>
