<?php

return [
    'url'                   => [
        'prefix_admin'      => 'admin123',
        'prefix_news'       => '/',
    ],
    'table'         => ['reservation', 'contact', 'menu', 'slider', 'article', 'product', 'employee', 'faq'],
    'galleryFolder' => ['all','room','food','entertaiment'],
    'dashboard'     => [
        'reservation' => ['icon' => 'fa fa-star', 'name' => 'Đặt phòng'],
        'contact'     => ['icon' => 'fa fa-tachometer', 'name' => 'Liên hệ'],
        'article'     => ['icon' => 'fa fa-newspaper-o', 'name' => 'Bài viết'],
        'slider'      => ['icon' => 'fa fa-sliders', 'name' => 'Slider'],
        'menu'        => ['icon' => 'fa fa-bars', 'name' => 'Menu'],
        'product'     => ['icon' => 'fa fa-trophy', 'name' => 'Phòng'],
        'employee'    => ['icon' => 'fa fa-tasks', 'name' => 'Nhân viên'],
        'faq'         => ['icon' => 'fa fa-question-circle', 'name' => 'Câu hỏi thường gặp'],
    ],
    'format'                => [
        'long_time'         => 'H:i:s d/m/Y',
        'short_time'        => 'd/m/Y',
    ],
    'template'              => [
        'email_subject'        => [
            'email_reservation' => 'Sky Luxury Hotel & Resort xác nhận thông tin đặt phòng của khách hàng ',
            'email_contact'     => 'Sky Luxury Hotel & Resort xác nhận thông tin liên hệ của khách hàng ',
            'default'           => 'Sky Luxury Hotel & Resort thông báo',
        ],
        'form_input'        => [
            'class'         => 'form-control col-md-6 col-xs-12'
        ],
        'form_label'        => [
            'class'         => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_edit'   => [
            'class'         => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],
        'form_ckeditor'     => [
            'class'         => 'form-control col-md-6 col-xs-12 ckeditor'
        ],
        'form_dropzone'     => [
            'class'         => 'form-control col-md-6 col-xs-12 dropzone'
        ],
        'form_ordering'     => [
            'class'         => 'form-control text-center'
        ],
        'form_input_price'  => [
            'class'         => 'form-control col-md-6 col-xs-12 format-currency'
        ],
        'status'            => [
            'all'           => ['name' => 'Tất cả', 'class' => 'btn-success'],
            'active'        => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive'      => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info'],
            'block'         => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'default'       => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
            'called'        => ['name' => 'Đã gọi', 'class' => 'btn-success'],
            'pending'       => ['name' => 'Chưa gọi', 'class' => 'btn-danger'],
            'unfollow'      => ['name' => 'Hủy theo dõi', 'class' => 'btn-danger'],
            'follow'        => ['name' => 'Đang theo dõi', 'class' => 'btn-success'],
            'booked'        => ['name' => 'Đặt chỗ', 'class' => 'btn-warning'],
            'confirm'       => ['name' => 'Giữ chỗ', 'class' => 'btn-primary'],
            'checkin'       => ['name' => 'Nhận phòng', 'class' => 'btn-success'],
            'cancel'        => ['name' => 'Hủy', 'class' => 'btn-danger'],
        ],
        'is_home'           => [
            'yes'           => ['name' => 'Hiển thị', 'class' => 'btn-primary'],
            'no'            => ['name' => 'Không hiển thị', 'class' => 'btn-warning']
        ],
        'is_footer'         => [
            'yes'           => ['name' => 'Hiển thị', 'class' => 'btn-primary'],
            'no'            => ['name' => 'Không hiển thị', 'class' => 'btn-warning']
        ],
        'change_price_status'      => [
            'yes'           => ['name' => 'Thay đổi giá', 'class' => 'btn-success'],
            'no'            => ['name' => 'Không thay đổi giá', 'class' => 'btn-info']
        ],
        'display'           => [
            'list'          => ['name' => 'Danh sách'],
            'grid'          => ['name' => 'Lưới'],
        ],
        'type_booking'      => [
            'booked'        => ['name' => 'Đặt chỗ', 'class' => 'btn-warning'],
            'confirm'       => ['name' => 'Giữ chỗ', 'class' => 'btn-primary'],
            'checkin'       => ['name' => 'Nhận phòng', 'class' => 'btn-success'],
            'cancel'        => ['name' => 'Hủy', 'class' => 'btn-danger'],
        ],
        'type_menu'         => [
            'direct'        => ['name' => 'Link trực tiếp'],
            'category'      => ['name' => 'Danh mục'],
            'product'       => ['name' => 'Sản phẩm'],
            'article'       => ['name' => 'Bài viết'],
        ],
        'type_coupon'       => [
            'direct'        => ['name' => 'Giảm trực tiếp'],
            'percent'       => ['name' => 'Giảm theo phần trăm'],
            'default'       => ['name' => 'Chưa xác định'],
        ],
        'type_open'         => [
            '_blank'        => ['name' => 'Mở ở cửa sổ mới'],
            '_parent'       => ['name' => 'Mở ở cửa sổ hiện tại'],
        ],
        'type_source'       => [
            'vnexpress'     => ['name' => 'Kiểu vnexpress'],
            'cafebiz'       => ['name' => 'Kiểu cafebiz'],
        ],
        'type'              => [
            'featured'      => ['name' => 'Nổi bật'],
            'normal'        => ['name' => 'Bình thường'],
        ],
        'level'             => [
            'admin'         => ['name' => 'Quản trị hệ thống'],
            'member'        => ['name' => 'Người dùng bình thường'],
        ],
        'search'            => [
            'all'         => ['name' => 'Tìm kiếm tất cả'],
            'id'          => ['name' => 'Tìm theo ID'],
            'name'        => ['name' => 'Tìm theo Tên'],
            'username'    => ['name' => 'Tìm theo Username'],
            'fullname'    => ['name' => 'Tìm theo Họ và tên'],
            'email'       => ['name' => 'Tìm theo Email'],
            'description' => ['name' => 'Tìm theo Mô tả'],
            'link'        => ['name' => 'Tìm theo Link'],
            'content'     => ['name' => 'Tìm theo Nội dung'],
            'question'    => ['name' => 'Tìm theo Câu hỏi'],
            'position'    => ['name' => 'Tìm theo Vị trí'],
            'phone'       => ['name' => 'Tìm theo Điện thoại'],
            'code'        => ['name' => 'Tìm theo Mã đặt chỗ'],

        ],
        'star' => [
            '1' => ['name' => '1 Star'],
            '2' => ['name' => '2 Star'],
            '3' => ['name' => '3 Star'],
            '4' => ['name' => '4 Star'],
            '5' => ['name' => '5 Star']
        ],
        'button'            => [
            'edit'          => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => '/form'],
            'delete'        => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => '/delete'],
            'info'          => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => '/delete'],
        ]
    ],
    'config'                => [
        'message'           => [
            'success'       => 'Cập nhật thành công',
            'error'         => 'Cập nhật thất bại',
        ],
        'email_name'           => [
            'default'       => 'Sky Luxury Hotel & Resort',
        ],
        'notify_frontend'   => [
            'success'   => 'ZendVN đã nhận được thông tin của bạn, chúng tôi sẽ phản hồi lại sớm nhất.',
            'subscribe' => ['class' => 'success', 'message'=>'Đăng ký theo dõi thành công!'],
        ],
        'search'            => [
            'default'          => ['all', 'id', 'fullname'],
            'slider'           => ['all', 'id', 'name', 'description', 'link'],
            'category-faq'     => ['all', 'name'],
            'article'          => ['all', 'name', 'content'],
            'user'             => ['all', 'username', 'email', 'fullname'],
            'menu'             => ['all', 'name', 'link'],
            'category-article' => ['all', 'name'],
            'category-product' => ['all', 'name'],
            'product'          => ['all', 'name', 'content'],
            'rss'              => ['all', 'name', 'link'],
            'group-attribute'  => ['all', 'name'],
            'attribute'        => ['all', 'name'],
            'contact'          => ['all', 'fullname', 'email'],
            'coupon'           => ['all', 'id', 'code'],
            'feeship'          => ['all', 'id', 'code'],
            'faq'              => ['all', 'name', 'email', 'question'],
            'review'           => ['all', 'name', 'content'],
            'employee'         => ['all', 'fullname', 'position'],
            'reservation'      => ['all', 'fullname', 'phone', 'code'],
            'tags'             => ['all', 'name'],
        ],
        'button'            => [
            'default'          => ['edit', 'delete'],
            'slider'           => ['edit', 'delete'],
            'category-faq'     => ['edit', 'delete'],
            'article'          => ['edit', 'delete'],
            'user'             => ['edit'],
            'menu'             => ['edit', 'delete'],
            'category-article' => ['edit', 'delete'],
            'category-product' => ['edit', 'delete'],
            'product'          => ['edit', 'delete'],
            'rss'              => ['edit', 'delete'],
            'group-attribute'  => ['edit', 'delete'],
            'attribute'        => ['edit', 'delete'],
            'contact'          => ['delete'],
            'coupon'           => ['edit', 'delete'],
            'feeship'          => ['edit', 'delete'],
            'faq'              => ['edit', 'delete'],
            'review'           => ['edit', 'delete'],
            'subscribe'        => ['delete'],
            'tags'             => ['delete'],
            'employee'         => ['edit', 'delete'],
            'reservation'      => ['delete'],
        ]
    ]

];
