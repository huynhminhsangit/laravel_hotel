@php
  $nextMonth = date('Y-m-d', strtotime('+1 month'));
  $id = request()->product_id;
  $result = DB::table('reservation')->select('check_in','check_out')->where('room_id',$id)->get()->toArray();
  $result = json_decode(json_encode($result), true);
  $currentMonth = date('m');
  $currentYear = date('Y');
  $dayInMonth = [];
  $dayInNextMonth = [];
  foreach ($result as $key => $value) {
    $tmp = [];
    if(date("Ym", strtotime($value['check_in'])) == $currentYear.$currentMonth) {
      $tmp[] = (int)date('d',strtotime($value['check_in']));
      $tmp[] = (int)date('d',strtotime($value['check_out']));
      if(!empty($tmp)) {
        if($tmp[0] > $tmp[1]) {
          for($i = $tmp[0]; $i <= date('t'); $i++) {
            $dayInMonth []= $i;
          }
        } else {
          for($i = $tmp[0];$i <= $tmp[1]; $i++) {
            $dayInMonth []= $i;
          }
        }
      }
      if(date("Ym", strtotime($value['check_out'])) == date("Y",strtotime($nextMonth)).date("m",strtotime($nextMonth))) {
        for ($i=1; $i <= $tmp[1] ; $i++) { 
          $dayInNextMonth []= $i;
        }
      }

    } else if(date("Ym", strtotime($value['check_in'])) == date("Y",strtotime($nextMonth)).date("m",strtotime($nextMonth)) ) {
     
      $tmp[] = (int)date('d',strtotime($value['check_in']));
      $tmp[] = (int)date('d',strtotime($value['check_out']));
      if(!empty($tmp)) {
        for($i = $tmp[0];$i <= $tmp[1]; $i++) {
          $dayInNextMonth []= $i;
        }
      }
    } 
  }

@endphp
<div class="product-detail_calendar-wrap row">
  <div class="col-sm-6">
      <!-- CALENDAR ITEM -->
      <div class="calendar_custom">
          <div class="calendar_title">
            <span class="calendar_month">{{ date("F") }}</span>
              <span class="calendar_year">{{ date("Y") }}</span>
              <a href="#" class="calendar_prev calendar_corner"><i class="ion-ios-arrow-thin-left"></i></a>
          </div>
          <table class="calendar_tabel">
              <thead>
                  <tr>
                      <th>Su</th>
                      <th>Mo</th>
                      <th>Tu</th>
                      <th>We</th>
                      <th>Th</th>
                      <th>Fr</th>
                      <th>Sa</th>
                  </tr>
              </thead>
              <tr>
                  <td></td>
                @php
                    $loopPosition = [[1,6],[7,13],[14,20],[21,27],[28,date('t')]];
                    $xhtml = '';
                    foreach ($loopPosition as $key => $value) {
                      $xhtml .= '<tr>';
                      for ($i=$value[0]; $i <= $value[1]; $i++) {  
                        if($i == 1) $xhtml .= '<td></td>';
                        if(in_array($i,$dayInMonth)) {
                          $check = 'not-available';
                        } else $check = '';
                          $xhtml .= '<td class="'.$check.'"><a href="#"><small>'.$i.'</small></a></td>';
                      }
                      $xhtml .= '</tr>';
                    }
                    echo $xhtml;
                @endphp
              </tr>
              
          </table>
      </div>
      <!-- END CALENDAR ITEM -->
  </div>
  <div class="col-sm-6">
      <!-- CALENDAR ITEM -->
      <div class="calendar_custom">
          <div class="calendar_title">
              <span class="calendar_month">{{ date("F",strtotime($nextMonth)) }}</span>
              <span class="calendar_year">{{ date("Y",strtotime($nextMonth)) }}</span>
              <a href="#" class="calendar_next calendar_corner"><i class="ion-ios-arrow-thin-right"></i></a>
          </div>
          <table class="calendar_tabel">
              <thead>
                  <tr>
                      <th>Su</th>
                      <th>Mo</th>
                      <th>Tu</th>
                      <th>We</th>
                      <th>Th</th>
                      <th>Fr</th>
                      <th>Sa</th>
                  </tr>
              </thead>
              <tr>
                  <td></td>
                  @php
                    $loopPosition = [[1,6],[7,13],[14,20],[21,27],[28,date("t",strtotime($nextMonth))]];
                    $xhtml = '';
                    foreach ($loopPosition as $key => $value) {
                      $xhtml .= '<tr>';
                      for ($i=$value[0]; $i <= $value[1]; $i++) {  
                        if($i == 1) $xhtml .= '<td></td>';  
                        if(in_array($i,$dayInNextMonth)) {
                          $check = 'not-available';
                        } else $check = '';
                          $xhtml .= '<td class="'.$check.'"><a href="#"><small>'.$i.'</small></a></td>';
                      }
                      $xhtml .= '</tr>';
                    }
                    echo $xhtml;
                  @endphp
          </table>
      </div>
      <!-- END CALENDAR ITEM -->
  </div>
  <div class="calendar_status text-center col-sm-12">
      <span>Còn Phòng</span>
      <span class="not-available">Hết Phòng</span>
  </div>
</div>