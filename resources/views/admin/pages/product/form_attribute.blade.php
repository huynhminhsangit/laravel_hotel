@php
    use App\Helpers\Template;
    $groupAttributeName = ['default' => '- Chọn thuộc tính -'] + $groupAttributeName;
    $groupAttrID = $item['group_attribute_id']??'';
@endphp
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title',['title' => 'Thuộc tính'])
        <div class="x_content">
            <div class="form-group">
                <div class="row">
                <div class="col-md-11">
                    {!!Form::select('group_attribute_id', $groupAttributeName, $groupAttrID,$formInputAttr)!!}
                </div>
                <div class="col-md-1" style="text-align: center">
                    <a href="javascript:void(0)" title="Thêm" class="btn btn-success" id="add-more-attr"><i class="fa fa-plus"></i></a>
                </div>
                </div>
            </div>
            <div id="attribute-content">
                @if ($item['id'])
                    @php
                        $arrAttribute = json_decode($item['attribute'], true);
                        $xhtml = '<div class="form-group">';
                            if($arrAttribute){
                                foreach($arrAttribute as $key => $value){
                                    $xhtml .= '
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-control" type="text" name="attr['.$key.'][name]" value="'.array_shift($value).'" />
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control attr-value" name="attr['.$key.'][value][]"  multiple="multiple">';
                                            foreach($value['value'] as $keyAttrValue => $valueAttrValue){
                                                $xhtml .= '<option value="'.$valueAttrValue.'" selected>'.$valueAttrValue.'</option>';
                                            }
                                        $xhtml .=  '</select>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:void(0)" class="btn btn-danger delete-attr"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>';
                                }
                            }
                        $xhtml .= '</div>';
                    @endphp
                    {!! $xhtml !!}
                @endif
            </div>
        </div>
    </div>
    <div style="display:none" id="group-attr-id">{{ $groupAttrID }}</div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {

        $('.attr-value').select2({tags: true,placeholder: "Nhập xong nhấn Enter để nhập tiếp"});
        $("ul.select2-selection__rendered").sortable({
            containment: 'parent',
            // stop: function(event, ui) {
            // // event target would be the <ul> which also contains a list item for searching (which has to be excluded)
            //     var arr = Array.from($(event.target).find('li:not(.select2-search)').map(function () {
            //         return $(this).text().substring(1);
            //     }))
            // },
            update: function() {
                orderSortedValues();
            }
        });

        orderSortedValues = function() {
        var value = ''
            $(".attr-value").parent().find("ul.select2-selection__rendered").children("li[title]").each(function(i, obj){

                var element = $(".attr-value").children('option').filter(function () { return $(this).html() == obj.title });
                moveElementToEndOfParent(element)
            });
        };

        moveElementToEndOfParent = function(element) {
            var parent = element.parent();

            element.detach();

            parent.append(element);
        };

        var content = $('#attribute-content').html();
        $('select[name=group_attribute_id]').change(function() {
        var id = $(this).val();
            if($('#group-attr-id').html() == id) {
                $('#attribute-content').html(content);
            } else {
                if(id != 'default') {
                    $.ajax({
                        type: 'POST',
                        url: "{{route($controllerName.'/addFormAttr')}}",
                        data: {id: id},
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#attribute-content').html(data);
                            $('.attr-value').select2({tags: true});
                            $('.delete-attr').click(function() {
                                $(this).parent().parent().remove();
                            });

                        }
                    });
                }
            }
        });
        $('#add-more-attr').click(function() {
            let key = Math.floor(Math.random() * 10000);
            var html = '<div class="form-group"><div class="row"><div class="col-md-3"><input class="form-control" type="text" name="attr['+key+'][name]" ></div><div class="col-md-8"><select class="form-control attr-value" name="attr['+key+'][value][]" multiple="multiple"></select></div><div class="col-md-1"><a href="javascript:void(0)" title="Xóa" class="btn btn-danger delete-attr"><i class="fa fa-trash"></i></a></div></div></div>';
            $('#attribute-content').append(html);
            $('.attr-value').select2({tags: true});
            $('.delete-attr').click(function() {
                $(this).parent().parent().remove();
            });
        });
        $('.delete-attr').click(function() {
            $(this).parent().parent().remove();
        });
    });
</script>

