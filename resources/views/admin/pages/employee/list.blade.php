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
                    <th class="column-title">Họ và tên</th>
                    <th class="column-title">Ảnh đại diện</th>
                    <th class="column-title">Vị trí</th>
                    <th class="column-title">Điện thoại</th>
                    <th class="column-title">Sắp xếp</th>
                    {{-- <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th> --}}
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
                            $name            = Highlight::show($val['fullname'], $params['search'], 'fullname');
                            $position        = Highlight::show($val['position'], $params['search'], 'position');
                            $phone           = $val['phone'];
                            $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name'], $controllerName);
                            $ordering        = Template::showItemOrdering($controllerName, $id, $val['ordering'], 'ordering');
                            // $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            // $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="20%">{!! $name !!}</td>
                            <td>{!! $thumb !!}</td>
                            <td>{!! $position !!}</td>
                            <td>{!! $phone !!}</td>
                            <td width="10%">{!! $ordering !!}</td>
                            {{-- <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td> --}}
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 9])
                @endif
            </tbody>
        </table>
    </div>
</div>
