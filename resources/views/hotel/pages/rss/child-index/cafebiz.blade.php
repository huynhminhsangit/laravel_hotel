@php
    $data  = file_get_contents($item['link']);
    $xml   = new SimpleXMLElement($data);
    $i     = 1;
    $xhtml = '<div id="cafebiz" class="tabcontent" style="display: block;"><div class="posts">';
    foreach ($xml->channel->item as $item) {
        if($i == 6)  break;
        $link  = $item->link;
        $title = $item->title;
        $pubDate = $item->pubDate;
        preg_match_all('#.*src="(.*)".*span>(.*)<end>#imsU', $item->description . '<end>', $matches);
        $image       = $matches[1][0];
        $description = $matches[2][0];
        $xhtml .= sprintf('
        <div class="post_item post_h_large">
            <div class="row">
                <div class="col-lg-5">
                    <div class="post_image">
                        <img src="%s" alt="%s" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="post_content">
                        <div class="post_title">
                            <a href="%s">%s</a></div>
                        <div class="post_info d-flex flex-row align-items-center justify-content-start">
                            <div class="post_author d-flex flex-row align-items-center justify-content-start">
                                <div class="post_author_name">Lưu Trường Hải Lân</div>
                            </div>
                            <div class="post_date">%s</div>
                        </div>
                        <div class="post_text"><p>%s</p></div>
                    </div>
                </div>
            </div>
        </div>', $image, $title, $link, $title, $pubDate, $description);
         $i++;
    }
    $xhtml .= '</div></div>';
    echo $xhtml;
@endphp


