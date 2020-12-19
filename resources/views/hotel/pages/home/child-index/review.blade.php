<!-- TESTIMONOALS -->
<section class="testimonials">
    <div class="testimonials-h">
        <div class="testimonials-content">
            <div class="container">
                <div id="testimonials" class="owl-carousel owl-theme">
                    @foreach ($itemsReview as $item)
                        @php
                            $name = $item['name'];
                            $reviewContent = $item['content'];
                            $avatar = url('images/review'). '/' .$item['thumb'];
                            $star = $item['star'];
                        @endphp
                        <div class="item ">
                            <div class="img-testimonials"><img src="{!! $avatar !!}" alt="#"></div>
                            <p class="testimonials-p">&quot;{!! $reviewContent !!}​‌&quot;</p>
                            <h5 class="sky-h5">{!! $name !!}</h5>
                            <p class="testimonials-p1">{!! $star !!} star</p>
                        </div>
                    @endforeach

                    {{-- <div class="item">
                        <div class="img-testimonials"><img src="images/Home-1/about-testimonials-img.png" alt="#"></div>
                        <p class="testimonials-p"><span>“</span>​‌ Thisis the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing onthe cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your <span>​‌​‌”</span> ocean view window and then to top it all off...</p>
                        <h5 class="sky-h5">JULIA ROSE</h5>
                        <p class="testimonials-p1">From Los Angeles, California</p>
                    </div>
                    <div class="item">
                        <div class="img-testimonials"><img src="images/Home-1/about-testimonials-img.png" alt="#"></div>
                        <p class="testimonials-p"><span>“</span>​‌ This is the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your <span>​‌​‌”</span> ocean view window and then to top it all off...</p>
                        <h5 class="sky-h5">JULIA ROSE</h5>
                        <p class="testimonials-p1">From Los Angeles, California</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / TESTIMONOALS -->
