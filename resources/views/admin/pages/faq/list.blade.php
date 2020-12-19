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
                    <th class="column-title">Info</th>
                    <th class="column-title">Category</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ordering</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th>
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
                            $category        = Template::showSelectCategory($itemCategory,$controllerName,$id,$val['category_id'],'category');
                            $question        = Highlight::show($val['question'], $params['search'], 'question');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $ordering        = Template::showItemOrdering($controllerName, $id, $val['ordering'], 'ordering');
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="40%">
                                <p><strong>Question:</strong> {!! $question !!}</p>
                            </td>
                            <td>{!! $category !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $ordering !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
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
