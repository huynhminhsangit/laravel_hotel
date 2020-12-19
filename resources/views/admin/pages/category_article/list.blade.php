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
                    <th class="column-title">Name</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hiển thị Footer</th>
                    {{-- <th class="column-title">Kiểu hiện thị</th> --}}
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
                            $name            = Template::showNestedSetName($val['name'], $val['depth']);
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $isHome          = Template::showItemIsFooter($controllerName, $id, $val['is_footer']);
                            $display         = Template::showItemSelect($controllerName, $id, $val['display'], 'display');
                            $ordering        = Template::showOrderingUpDown($controllerName, $val['id']);
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="25%">{!! $name !!}</td>
                            <td>{!! $ordering !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $isHome  !!}</td>
                            {{-- <td>{!! $display !!}</td> --}}

                            {{-- <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td> --}}
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