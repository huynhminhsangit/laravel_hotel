<!-- OUR-GALLERY-->
<section class="gallery-our">
    <div class="container-fluid">
        <div class="gallery">
            <h2 class="title-gallery">Thư viện</h2>
            <div class="outline"></div>
            <ul class="nav nav-tabs text-uppercase">
                <li class="active"><a data-toggle="tab" href="#all">Khách sạn & Địa điểm lân cận</a></li>
                <li><a data-toggle="tab" href="#room">Phòng/Nội thất </a></li>
                <li><a data-toggle="tab" href="#food">Ăn uống</a></li>
                <li><a data-toggle="tab" href="#entertaiment">Giải trí</a></li>
            </ul>
            <br/>
            <div class="tab-content">

                @foreach ($itemsGallery as $key => $value)
                    @php
                        $active = ($key == 'all') ? 'in active' : '';
                        $limit = 0;
                    @endphp
                        <div id="{{ $key }}" class="tab-pane fade {{ $active }}">
                            <div class="product ">
                                <div class="row">
                                @foreach ($value as $item)
                                @php
                                    $limit++;
                                @endphp
                                <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                    <div class="wrap-box">
                                        <div class="box-img">
                                            <img src="{{ asset("storage/gallery/$key/{$item->getFilename()}") }}" class="img-responsive" alt="Product" title="images products">
                                        </div>
                                        <div class="gallery-box-main">
                                            <div class="gallery-icon">
                                                <a class="lightbox " href="{{ asset("storage/gallery/$key/{$item->getFilename()}") }}" data-littlelightbox-group="gallery" title="Flying is life"><i class="ion-ios-plus-empty" aria-hidden="true" ></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    if($limit == 8) break;
                                @endphp
                                @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            <!-- end-tab-content -->
            <div class="text-center">
                <a href="{{ route('gallery/index') }}" class="btn btn-default btn-our text-uppercase">xem thêm</a>
            </div>
        </div>
        <!-- /gallery -->
    </div>
    <!-- /container -->
</section>
<!-- END / OUR GALLERY -->
