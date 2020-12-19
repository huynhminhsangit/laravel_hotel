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
                    <th class="column-title">Mã coupon</th>
                    {{-- <th class="column-title">Trạng thái</th> --}}
                    <th class="column-title">Loại coupon</th>
                    <th class="column-title">Giá trị</th>
                    <th class="column-title">Ngày bắt đầu</th>
                    <th class="column-title">Ngày kết thúc</th>
                    <th class="column-title">Tổng có</th>
                    <th class="column-title">Sử dụng</th>
                    <th class="column-title">Giá bắt đầu</th>
                    <th class="column-title">Giá kết thúc</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $code            = Highlight::show($val['code'], $params['search'], 'code');

                            $type            = Template::showItemTypeCoupon($val['type']);
                            $value           = ($val['type'] === 'direct') ? Template::showPrice($val['value']) : $val['value'] . '%';
                            $start           = Template::showDateCreated($val['start'], 'not-paragraph');
                            $end             = Template::showDateCreated($val['end'], 'not-paragraph');
                            $total           = $val['total'];
                            $total_use       = $val['total_use'];
                            $start_price     = Template::showPrice($val['start_price']);
                            $end_price       = Template::showPrice($val['end_price']);
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%">{!! $code !!}</td>
                            <td>{!! $type !!}</td>
                            <td>{!! $value !!}</td>
                            <td>{!! $start !!}</td>
                            <td>{!! $end !!}</td>
                            <td>{!! $total !!}</td>
                            <td>{!! $total_use !!}</td>
                            <td>{!! $start_price !!}</td>
                            <td>{!! $end_price !!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
