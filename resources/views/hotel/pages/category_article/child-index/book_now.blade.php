@php
    $now = date("d-m-Y");
    $nextDay = date('d-m-Y', strtotime(' +1 day'));
    $product = DB::table('product')->select('id','name')->where('status','active')->pluck('name','id')->toArray();
@endphp
<form action="{!! route('reservation/confirm') !!}" method="post">
  {{ csrf_field() }}
<div class="widget widget_check_availability widget-1">
  <h4 class="widget-title">Thông tin</h4>
  <div class="check_availability">
      <div class="check_availability-field">
          <label>Ngày nhận phòng</label>
          <div class="input-group date" data-date-format="dd-mm-yyyy" id="datepicker1">
              <input class="form-control wrap-box" type="text" placeholder="Arrival Date" name="check_in" value="{{ $now }}">
              <span class="input-group-addon"><i class="fa fa-calendar"  aria-hidden="true"></i></span>
          </div>
      </div>
      <div class="check_availability-field">
          <label>Ngày trả phòng</label>
          <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
              <input class="form-control wrap-box" type="text" placeholder="Departure Date" name="check_out" value="{{ $nextDay }}">
              <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
      </div>
      <div class="check_availability-field">
        <label>Phòng</label>
        <select class="awe-select" name="room">
            @foreach ($product as $key => $value)
              <option value="{{ $key.'|'.$value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
      <div class="check_availability-field">
          <label>Người lớn</label>
          <select class="awe-select" name="adult">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
          </select>
      </div>
      <div class="check_availability-field">
          <label>Trẻ em</label>
          <select class="awe-select" name="children">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
          </select>
      </div>
      <button class="btn-room btn">Đặt Phòng</button>
  </div>
</div>
</form>
