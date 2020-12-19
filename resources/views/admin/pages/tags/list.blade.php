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
                    <th class="column-title">Tên</th>
                    <th class="column-title">Số lần gắn Tag</th>
                    <th class="column-title">Tạo mới</th>
                    {{-- <th class="column-title">Trạng thái</th> --}}
                    <th class="column-title">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $countTags       = $items->countTags[$id];
                            $name           = Highlight::show($val['name'], $params['search'], 'name');
                            // $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $countTags !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            {{-- <td>{!! $status !!}</td> --}}
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
