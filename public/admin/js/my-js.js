// SHOW NOTIFY WITH NOTIFY JS LIB
function showNotify(element, typeMessage, message) {
    if (typeMessage == false) {
        $(element).notify(
            message, { className: "error", position: "top", },
        );
    }
    if (typeMessage == true) {
        $(element).notify(
            message, { className: "success", position: "top", },
        );
    }
}
// RELOAD PAGE
function refreshPage() {
    setInterval("location.reload()", 3000);
}
// CREATE SLUG FROM TITLE
function createSlug(input) {
    var input, slug;
    //Lấy text từ thẻ input title
    input = document.getElementById('name').value;

    //Đổi chữ hoa thành chữ thường
    slug = input.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}

$(document).ready(function() {
    let $btnSearch = $("button#btn-search");
    let $btnClearSearch = $("button#btn-clear-search");
    let $inputSearchField = $("input[name  = search_field]");
    let $inputSearchValue = $("input[name  = search_value]");


    $("a.select-field").click(function(e) {
        e.preventDefault();

        let field = $(this).data('field');
        let fieldName = $(this).html();
        $("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
        $inputSearchField.val(field);
    });
    // SEARCH
    $btnSearch.click(function() {

        var pathname = window.location.pathname;
        let params = ['filter_status'];
        let searchParams = new URLSearchParams(window.location.search); // ?filter_status=active

        let link = "";
        $.each(params, function(key, param) { // filter_status
            if (searchParams.has(param)) {
                link += param + "=" + searchParams.get(param) + "&" // filter_status=active
            }
        });

        let search_field = $inputSearchField.val();
        let search_value = $inputSearchValue.val();

        if (search_value.replace(/\s/g, "") == "") {
            alert("Nhập vào giá trị cần tìm !!");
        } else {
            window.location.href = pathname + "?" + link + 'search_field=' + search_field + '&search_value=' + search_value;
        }
    });
    // CLEAR SEARCH
    $btnClearSearch.click(function() {
        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);

        params = ['filter_status'];

        let link = "";
        $.each(params, function(key, param) {
            if (searchParams.has(param)) {
                link += param + "=" + searchParams.get(param) + "&"
            }
        });

        window.location.href = pathname + "?" + link.slice(0, -1);
    });
    // DELETE CONFIRM
    $('.btn-delete').on('click', function() {
        if (!confirm('Bạn có chắc muốn xóa phần tử?'))
            return false;
    });
    // wire up shown event
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        // console.log("tab shown...");
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    // read hash from page load and change tab
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }
    // Submit form product form
    $('#submit-all').click(function() {
        $('#main-form').submit();
    });

    let $btnStatus = $('.btn-status');
    let $btnPrice = $('.btn-price');
    let $btnFooter = $('.btn-footer');
    let $inputOrdering = $('.input-ordering');
    let $selectChangeDefault = $('.select-type-default');
    let $selectChangeTypeMenu = $('.select-type-menu');
    let $selectChangeTypeOpen = $('.select-type-open');
    let $selectCategory = $('.select-type-category');
    let $selectBooking = $('.select-type-booking');
    $selectCategory.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'select-type-category');
    });
    $selectBooking.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'select-type-booking');
    });
    $btnStatus.on('click', function(event) {
        event.preventDefault(); // dừng không cho thực hiện thao tác mặc định của đối tượng
        callAjax($(this), $(this).attr('href'), 'status');
    });
    $btnPrice.on('click', function(event) {
        event.preventDefault(); // dừng không cho thực hiện thao tác mặc định của đối tượng
        callAjax($(this), $(this).attr('href'), 'change-price');
    });
    $btnFooter.on('click', function(event) {
        event.preventDefault(); // dừng không cho thực hiện thao tác mặc định của đối tượng
        callAjax($(this), $(this).attr('href'), 'is-footer');
    });
    $inputOrdering.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'ordering');
    });
    $selectChangeDefault.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'select-type-default');
    });
    $selectChangeTypeMenu.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'select-type-menu');
    });
    $selectChangeTypeOpen.on('change', function(event) {
        callAjax($(this), $(this).data('url').replace('new_value', $(this).val()), 'select-type-open');
    });

    function callAjax(element, url, type) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(result) {
                if (result) {
                    switch (type) {
                        case 'status':
                            var element = $('.status-modified-' + result.id);
                            element.attr('href', result.link);
                            element.removeClass(element.data('class'));
                            element.addClass(result.status.class);
                            element.data('class', result.status.class);
                            element.html(result.status.name);
                            break;
                        case 'is-footer':
                            var element = $('.footer-modified-' + result.id);
                            element.attr('href', result.link);
                            element.removeClass(element.data('class'));
                            element.addClass(result.status.class);
                            element.data('class', result.status.class);
                            element.html(result.status.name);
                            break;
                        case 'ordering':
                            var element = $('.input-ordering-' + result.id);
                            break;
                        case 'select-type-default':
                            var element = $('.select-type-default-' + result.id);
                            break;
                        case 'select-type-menu':
                            var element = $('.select-type-menu-' + result.id);
                            break;
                        case 'select-type-open':
                            var element = $('.select-type-open-' + result.id);
                            break;
                        case 'select-type-category':
                            var element = $('.select-type-category-' + result.id);
                            break;
                        case 'select-type-booking':
                            var element = $('.select-type-booking-' + result.id);
                            break;
                        case 'change-price':
                            var element = $('.change-price-modified-' + result.id);
                            element.attr('href', result.link);
                            element.removeClass(element.data('class'));
                            element.addClass(result.status.class);
                            element.data('class', result.status.class);
                            element.html(result.status.name);
                            showNotify(element, result.typeMessage, result.message)
                            break;
                    }
                }
                showNotify(element, result.typeMessage, result.message)
            },
            // complete: refreshPage,
        });
    }
    // Filter Select
    let $selectFilter = $("select[name = select_filter]");
    $selectFilter.on('change', function() {
        var pathname = window.location.pathname;
        let searchParams = new URLSearchParams(window.location.search);
        params = ['page', 'filter_status', 'search_field', 'search_value'];
        let link = "";
        $.each(params, function(key, value) {
            if (searchParams.has(value)) {
                link += value + "=" + searchParams.get(value) + "&";
            }
        });
        let filter = $(this).data('filter');
        let value = $(this).val();
        window.location.href = pathname + "?" + link + 'filter_' + filter + '=' + value;
    });


    // RANDOM COUPON CODE
    $('#random-code').on('click', () => {
        let code = makeid(10);
        $('#code').attr('value', code);
        console.log(code);
    });

    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    // FORMAT CURRENCY
    // $('.format-currency').on('change', function() {
    //     let original_amount = $(this).val();
    //     let amount = new Intl.NumberFormat('vi-VN', {
    //         style: 'currency',
    //         currency: 'VND',
    //     }).format(original_amount);
    //     $(this).val(amount);
    //     $('#original_start_price').val(original_amount);
    //     console.log($('#original_start_price').attr('val', original_amount));
    // });



});