
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Cấu hình'])
        <div class="x_content">
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-1', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Sản phẩm mới') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-2', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Hiển thị nút đặt hàng') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-3', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Sản phẩm nổi bật') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-4', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Hiển thị tư vấn - liên hệ') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-5', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Sản phẩm khuyến mãi') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-sm-6 col-xs-12">
                    {{ Form::checkbox('new_product-6', 'new_product') }}
                </div>
                <div class="col-md-11 col-sm-6 col-xs-12">
                    {{ Form::label('new_product', 'Hiện ở trang chủ') }}
                </div>
            </div>
        </div>
    </div>
