$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('body').on('click', '.add-wishlist', function (e) {
    e.preventDefault();
    let product_id = $(this).attr('product-id');
    let qty = $(this).attr('qty');
    
    $.ajax({
        url: '/wishlist/add',
        method: 'POST',
        data: {
            product_id,
            qty,
        },
        success: function (response) {
            $(`a.favorite[product-id="${product_id}"]`).removeClass("add-wishlist").addClass("remove-wishlist active");
        }
    });
});

$('body').on('click', '.remove-wishlist', function (e) {
    e.preventDefault();
    let product_id = $(this).attr('product-id');
    $.ajax({
        url: '/wishlist/remove',
        method: 'POST',
        data: {
            product_id,
        },
        success: function (reponse) {
            $(`a.favorite[product-id="${product_id}"]`).removeClass("remove-wishlist active").addClass("add-wishlist");
            $('#wishlist').html(reponse.wishlist_list);
        }
    });
});
