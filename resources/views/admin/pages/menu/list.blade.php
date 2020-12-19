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
                    <th class="column-title">Kiểu menu</th>
                    <th class="column-title">Kiểu mở</th>
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
                            $link            = Highlight::show($val['link'], $params['search'], 'link');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $ordering        = Template::showOrderingUpDown($controllerName, $val['id'], 'menu');
                            $type_menu       = Template::showItemSelect($controllerName, $id, $val['type_menu'], 'type_menu', 'type-menu');
                            $type_open       = Template::showItemSelect($controllerName, $id, $val['type_open'], 'type_open', 'type-open');
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="15%" title="{!! $link !!}">{!! $name !!}</td>
                            <td>{!! $ordering !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $type_menu !!}</td>
                            <td>{!! $type_open !!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 8])
                @endif
            </tbody>
        </table>
    </div>
</div>
