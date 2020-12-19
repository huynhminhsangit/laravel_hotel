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
                    <th class="column-title">Review Info</th>
                    <th class="column-title">Ảnh đại diện</th>
                    <th class="column-title">Danh mục</th>
                    <th class="column-title">Star</th>
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
                            $name          = Highlight::show($val['name'], $params['search'], 'name');
                            $content       = Highlight::show($val['content'], $params['search'], 'content');
                            $thumb         = Template::showItemThumb($controllerName, $val['thumb'], $val['name'], $controllerName);
                            $product       = Template::showItemSelect($controllerName, $id, $val['product_id'], 'product', 'type-category', $itemsProduct);
                            $star          = Template::showItemSelect($controllerName,$id,$val['star'],'star');
                            $status        = Template::showItemStatus($controllerName, $id, $val['status']);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="30%">
                                <p><strong>Tên KH:</strong> {!! $name !!}</p>
                                <p><strong>Nhận xét:</strong> {!! $content!!}</p>
                            </td>
                            <td>{!! $thumb !!}</td>
                            <td>{!! $product !!}</td>
                            <td>{!! $star !!}</td>
                            <td>{!! $status !!}</td>
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
