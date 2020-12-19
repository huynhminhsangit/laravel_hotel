@php
    use App\Helpers\Template as Template;
    use App\Helpers\Highlight as Highlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Thông tin khách hàng</th>
                    <th class="column-title">Phòng</th>
                    <th class="column-title">Ngày đến</th>
                    <th class="column-title">Ngày đi</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index         = $key + 1;
                            $class         = ($index % 2 == 0) ? "even" : "odd";
                            $id            = $val['id'];
                            $code          = Highlight::show($val['code'], $params['search'], 'code');
                            $fullname      = Highlight::show($val['fullname'], $params['search'], 'fullname');
                            $email         = Highlight::show($val['email'], $params['search'], 'email');
                            $phone         = Highlight::show($val['phone'], $params['search'], 'phone');
                            $checkIn       = Template::showDateCreated($val['check_in'], 'not-paragraph');
                            $checkOut      = Template::showDateCreated($val['check_out'], 'not-paragraph');
                            $roomName      = Template::showItemSelect($controllerName, $val['id'], $val['room_id'], 'changeRoom', 'type-category', $itemsProduct);
                            $note          = $val['note'];
                            $status        = Template::showItemSelect($controllerName, $val['id'], $val['status'], 'changeTypeBooking', 'type-booking');
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="25%">
                                <p><strong>Mã đặt chỗ: {!! $code !!}</strong></p>
                                <p><strong>Họ và tên:</strong> {!! $fullname !!}</p>
                                <p><strong>Email:</strong> {!! $email!!}</p>
                                <p><strong>Điện thoại:</strong> {!! $phone !!}</p>
                                <p><strong>Ghi chú:</strong> {!! $note !!}</p>
                            </td>
                            <td>{!! $roomName !!}</td>
                            <td>{!! $checkIn !!}</td>
                            <td>{!! $checkOut !!}</td>
                            <td>{!! $status !!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 7])
                @endif
            </tbody>
        </table>
    </div>
</div>
