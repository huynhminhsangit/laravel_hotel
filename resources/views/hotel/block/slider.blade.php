@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp
@if (count($itemsSlider) > 0)
    <!-- SLIDER -->
    <section class="section-slider height-v">
        <div id="index12" class="owl-carousel  owl-theme">
            @foreach ($itemsSlider as $key => $value)
                @php
                    $name        = $value['name'];
                    $description = $value['description'];
                    $thumb       = URL::linkImage('slider', $value['thumb']);
                @endphp
                <div class="item">
                    <img alt="Third slide" src="{!! $thumb !!}" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>{!! $name !!}</h1>
                        <p><span class="line-t"></span>{!! $description !!} <span class="line-b"></span></p>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{!! route('reservation/checkAvailable') !!}" method="post" id="checkAvailable">
                @csrf
                <input type="hidden" name="adult" value="1">
                <input type="hidden" name="children" value="0">
            <div class="check-avail">
                <div class="container">
                    <div class="arrival date-title ">
                        <label>Ngày đến </label>
                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" type="text" name="check_in">
                            <span class="input-group-addon"><img src="{{ asset('hotel/images/Home-1/date-icon.png') }}" alt="#"></span>
                        </div>
                    </div>
                    <div class="departure date-title ">
                        <label>Ngày đi </label>
                        <div id="datepickeri" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" type="text" name="check_out">
                            <span class="input-group-addon"><img src="{{ asset('hotel/images/Home-1/date-icon.png') }}" alt="#"></span>
                        </div>
                    </div>
                    <div class="adults date-title ">
                        <label>Người lớn</label>
                        <form>
                            <div class=" carousel-search">
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle " data-toggle="dropdown" href="#" >1</a>
                                    
                                    <ul class="dropdown-menu" name="check_in" id="adult">
                                        <li><a>1</a></li>
                                        <li><a>2</a></li>
                                        <li><a>3</a></li>
                                        <li><a>4</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="children date-title ">
                        <label>Trẻ em</label>
                            <div class=" carousel-search">
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle " data-toggle="dropdown" href="#">0</a>
                                    <ul class="dropdown-menu" name="check_out" id="children">
                                        <li><a>0</a></li>
                                        <li><a>1</a></li>
                                        <li><a>2</a></li>
                                        <li><a>3</a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="find_btn date-title">
                        <div class="text-find">
                            Kiểm tra
                                <br>phòng trống
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- END / SLIDER -->
@endif
<script>
    var click = document.querySelector('.text-find');
    click.addEventListener('click',function(e) {
        //showMaintenanceNotify();
        document.querySelector('#checkAvailable').submit();
    })
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $('.dropdown-menu#children a').click(function(e){
        $('input[name=children]').val(e.target.textContent);
    });
    $('.dropdown-menu#adult a').click(function(e){
        $('input[name=adult]').val(e.target.textContent);
    });
</script>
