@php
    $check_in = date('d-m-Y',strtotime($params['check_in']));
    $check_out = date('d-m-Y',strtotime($params['check_out']));
    $adult = $params['adult'];
    $children = $params['children'];
@endphp
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="sidebar">
        <!-- WIDGET CHECK AVAILABILITY -->
        <div class="widget widget_check_availability widget-1">
            <h4 class="widget-title">Thông tin</h4>
            <div class="check_availability">
                <div class="check_availability-field">
                    <label>Ngày trả phòng</label>
                    <div class="input-group date" data-date-format="dd-mm-yyyy" id="datepicker1">
                        <input class="form-control wrap-box" type="text" placeholder="Arrival Date" name="check_in" value="{{ $check_in }}">
                        <span class="input-group-addon"><i class="fa fa-calendar"  aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="check_availability-field">
                    <label>Ngày nhận phòng</label>
                    <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control wrap-box" type="text" placeholder="Departure Date" name="check_out" value="{{ $check_out }}">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="check_availability-field">
                    <label>Người lớn</label>
                    <select class="awe-select" id="adult" onchange="changeAdult()">
                        @php
                            for($i = 1; $i <= 4; $i++) {
                                $selected = ($i == $adult) ? 'selected' : '';
                                echo '<option '.$selected.'>'.$i.'</option>';
                            }
                        @endphp
                    </select>
                    <input type="hidden" name="adult" value="{{ $adult }}">
                </div>
                <div class="check_availability-field">
                    <label>Trẻ em</label>
                    <select class="awe-select" id="children" onchange="changeChildren()">
                        @php
                            for($i = 0; $i <= 3; $i++) {
                                $selected = ($i == $children) ? 'selected' : '';
                                echo '<option '.$selected.'>'.$i.'</option>';
                            }
                        @endphp
                    </select>
                    <input type="hidden" name="children" value="{{ $children }}">
                </div>
            </div>
        </div>
        <!-- END / WIDGET CHECK AVAILABILITY -->
    </div>
</div>
<!--  END/SIDEBAR -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function changeChildren() {
        $('input[name=children]').val($('#children').val());
    }
    function changeAdult() {
        $('input[name=adult]').val($('#adult').val());
    }
</script>