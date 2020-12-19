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
                    <th class="column-title">Tên sản phẩm</th>
                    <th class="column-title">Ảnh đại diện</th>
                    <th class="column-title">Danh mục</th>
                    <th class="column-title">Giá</th>
                    <th class="column-title">Trạng thái</th>
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
                            $name            = Highlight::show($val['name'], $params['search'], 'name');
                            $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name'], 'product');
                            $categoryName    = Template::showItemSelect($controllerName, $val['id'], $val['category_id'], 'changeCategory', 'type-category', $itemsCategory);
                            $status          = Template::showItemStatus($controllerName, $val['id'], $val['status']);
                            $price           = Template::showPrice($val['price'], 'right');
                            $listBtnAction   = Template::showButtonAction($controllerName, $val['id']);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="25%">{!! $name !!}</td>
                            <td width="15%">
                                <p>{!! $thumb !!}</p>
                            </td>
                            <td >{!! $categoryName !!}</td>
                            <td>{!! $price   !!}</td>
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
