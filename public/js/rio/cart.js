$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('body').on('click', '.add-cart', function (e) {
    e.preventDefault();
    let product_id = $(this).attr('product-id');
    let qty = $(this).attr('qty');
    let options = [];
    $.ajax({
        url: '/cart/add',
        method: 'POST',
        data: {
            product_id,
            qty,
            options
        },
        success: function (reponse) {
            $('.cart-html').html(reponse.cart_list);
            $('.box-html').html(reponse.box_list);
            $('.total-box').text(reponse.total);
            $(`a.box-btn[product-id="${product_id}"]`).removeClass("add-cart").addClass("remove-cart grey");
            $(`a.box-btn[product-id="${product_id}"]`).text('В корзинe');
            $('.count-product').text(reponse.count);
        }
    });
});

$('body').on('click', '.remove-cart', function (e) {
    e.preventDefault();
    let  product_id = $(this).attr('product-id');
    $.ajax({
        url: '/cart/remove',
        method: 'POST',
        data: {
             product_id
        },
        success: function (reponse) {
            $('.cart-html').html(reponse.cart_list);
            $('.box-html').html(reponse.box_list);
            $('.total-box').text(reponse.total);
            $(`a.box-btn[product-id="${product_id}"]`).removeClass("remove-cart grey").addClass("add-cart");
            $(`a.box-btn[product-id="${product_id}"]`).text('В корзину');
            $('.count-product').text(reponse.count);
            $('.old-price').text(reponse.old_price);
            $('.sale-product').text(reponse.sale);
        }
    });
});
var timer = 0;
setTimeout(function () {
$('body').on('click', '.update-cart-add', function (e) {
    e.preventDefault();
    let row_id = $(this).attr('row-id');
    let qty = $(this).attr('qty');
    clearTimeout(timer);
    timer = setTimeout(function () {
        $.ajax({
            url: '/cart/update',
            method: 'POST',
            data: {
                row_id,
                qty
            },
            success: function (reponse) {
                $('.cart-html').html(reponse.cart_list);
                $('.count-product').text(reponse.count);
                $('.total-box').text(reponse.total);
                $('.old-price').text(reponse.old_price);
                $('.sale-product').text(reponse.sale);
            }
        });
    }, 1000);
});
}, 1000);

setTimeout(function () {
$('body').on('click', '.update-cart-remove', function (e) {
    e.preventDefault();
    let row_id = $(this).attr('row-id');
    let qty = $(this).attr('qty');
    
    clearTimeout(timer);
    timer = setTimeout(function () {
        $.ajax({
            url: '/cart/update',
            method: 'POST',
            data: {
                row_id,
                qty
            },
            success: function (reponse) {
                $('.cart-html').html(reponse.cart_list);
                $('.count-product').text(reponse.count);
                $('.total-box').text(reponse.total);
                $('.old-price').text(reponse.old_price);
                $('.sale-product').text(reponse.sale);
            }
        });
    }, 1000);
});
}, 1000);



$('body').on('click', '.qty-changers', function (e) {
    e.preventDefault();

    var current = parseInt($(this).siblings('.current-qty').text());
    var initial = parseInt($(this).attr('qty'));

    if ($(this).hasClass('subs') && current > 1) {
        current -= 1;
    } else if ($(this).hasClass('add')) {
        current += 1;
    }

    $(this).siblings('.current-qty').text(current);
    $(this).attr('qty', current);
});


$('body').on('click', '.btn-modal-product', function (e) {
    e.preventDefault();
    let product_id = $(this).attr('product-id');
    $.ajax({
        url: '/open_modal',
        method: 'POST',
        data: {
            product_id,
        },
        success: function (reponse) {
            $('#modal_content').html(reponse.product);
            $('#product-modal').modal('show');
            setTimeout(function () {
            $('.slick-modal').slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false, 
                responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    dots: false,
                  }
                }]
            });
            $('#modal_content .images').addClass('open');
            }, 200);

            setTimeout(function () {
                $('#product-modal').removeClass('not-show');
            }, 400);
        }
    });
});

$('#product-modal').on('hidden.bs.modal', function () {
   $('#product-modal').addClass('not-show');
});