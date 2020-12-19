@php
    $srcThumb = asset('/images/product/');
@endphp
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Hình ảnh'])
        <div class="x_content">
            <div class="form-group">
                <label for="document">Hình ảnh</label>
                <div class="needsclick dropzone draggable sortable" id="document-dropzone">

                </div>
            </div>
    </div>
</div>
<script>

    $( ".sortable" ).sortable({
      revert: true
    });
    $( ".dz-preview dz-processing dz-image-preview dz-complete" ).draggable({
      connectToSortable: ".sortable",
    //   helper: "clone",
      revert: "invalid"
    });
        var uploadedDocumentMap = {};
        var fileList = {};
        var url = $('#main-form').attr('action');

        Dropzone.options.documentDropzone = {

            url: '{!! route("product/storeMedia") !!}',
            // url: url,
            // autoProcessQueue: false,
            acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            previewTemplate: `
            <div class="dz-preview dz-file-preview">
                <img data-dz-thumbnail />
                <input type="text" name="thumb[alt][]" placeholder="Nhập alt của hình">
            </div>`,
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="thumb[name][]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name;

            },
            removedfile: function(file)
            {
                var filename = file.imageName;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    url: '{!! route("product/deleteMedia") !!}',
                    data: {filename: filename},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function () {
                @if(isset($item) && $item['thumb'])
                    var files = JSON.parse({!! json_encode($item['thumb']) !!});
                    for(i in files){
                        var file = files[i];
                        var src = "{{ asset('/images/product') }}"+'/'+file.imageName;
                        this.displayExistingFile(file, src);
                        $(file.previewElement).append('<input type="hidden" name="thumb[name][]" value="'+file.imageName+'">');
                        $(file.previewElement).find('input[name="thumb[alt][]"]').val(file.imageAlt);
                    }
                @endif
            }
        }
</script>
