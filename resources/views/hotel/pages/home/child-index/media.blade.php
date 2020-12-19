@php
    $index = strpos($itemsMedia['link'],'list=');
    $videoID = substr($itemsMedia['link'],$index+5);
@endphp
<!-- OUR-GALLERY-->
<section class="gallery-our">
    <div class="container-fluid">
        <div class="gallery">
            <h2 class="title-gallery">Media</h2>
            <div class="outline"></div>
            <br/>
            <div id="video" class="tab-content">
                <div class="row"></div>
            </div>
            <!-- end-tab-content -->
            <div class="text-center">
                <a href="{{ route('gallery/index',['video' => 'video']) }}" class="btn btn-default btn-our text-uppercase">xem thêm</a>
            </div>
        </div>
        <!-- /gallery -->
    </div>
    <!-- /container -->
</section>
<!-- END / OUR GALLERY -->
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        var iframe = '';
        var youtubeThumb = '';var youtubeId = '';
        $.get(
            "https://www.googleapis.com/youtube/v3/playlistItems",{
            part : 'snippet',
            playlistId : '{{ $videoID }}',
            type : 'video',
            maxResults:9,
            key: 'AIzaSyA0t1ZWwuetBOrr5TfpKbqTFLJAtyFze4E'},
            function(data) {
                $.each(data.items,function(key, value) {
                    var id = value.snippet.resourceId.videoId;
                    iframe += `<div class="col-md-4"><iframe style="width:100%;height:200px" src="https:\/\/www.youtube.com/embed/${id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
                    youtubeId += value.snippet.resourceId.videoId+",";
                    youtubeThumb += value.snippet.thumbnails.medium.url+",";
                });
                document.cookie = youtubeId+'|||||'+youtubeThumb;
                $('#video').first().html(iframe);
            }
        );

    });
</script>
