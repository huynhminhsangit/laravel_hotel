@extends('hotel.main')
@section('content')
@include('hotel.block.top-banner',[
    'breadcrumb' => $breadcrumb,
    'title' => 'Faq'
    ])
    @include('hotel.pages.faq.child-index.style')
    <div class="section-blog blog-detail">
        <div class="container">
            <div class="blog">
                <div class="row">
                    <div class=" col-lg-8 col-md-8 col-md-push-4">
                        <div class="blog-content">
                            <div class="wrapper">
                                @foreach ($items as $item)
                                    <div class="accordion">
                                        <div class="accordion_tab">
                                            {{ $item['question'] }}
                                            <div class="accordion_arrow">
                                                <img src="https://i.imgur.com/PJRz0Fc.png" alt="arrow">
                                            </div>
                                        </div>
                                        <div class="accordion_content">
                                            <div class="accordion_item">
                                            {{-- <p class="item_title">Accordion SubTitle</p> --}}
                                            <p>{!! $item['answer'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-md-pull-8">
                        @include('hotel.pages.faq.child-index.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script>
    $(".accordion_tab").click(function(){
      $(this).parent().toggleClass("active");
      $(this).toggleClass("active");
});
</script>
@endsection
