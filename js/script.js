$(document).ready(function () {
    

    var added_items_to_cart = [];

    $(document).on('click', '.cart', function () {
        var id = $(this).data('id');
        if (added_items_to_cart.indexOf(id) === -1) {
            added_items_to_cart.push(id);
            var arr_length = added_items_to_cart.length;
            console.log(arr_length);
            $('#cart_count').text(arr_length);
        }
        $('.cart_link').show();
        $(this).addClass('bg-success text-light');
    })

    // Send the items id to cart.php
    $(document).on('click', '#view_cart', function () {
        var data_added_to_cart = added_items_to_cart;
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {
                'data_added_to_cart': data_added_to_cart,
                'added_to_cart': 1
            },
            success: function (response) {
                console.log(response);
            }
        });
    })


    $(document).on('click', '.remove-item', function () {
        var id = $(this).data('id');
        var clicked_btn = $(this).parent();
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {
                'remove_item': 1,
                'id': id
            },
            success: function (response) {
                clicked_btn.parent().remove();
            }
        });
    })

    $(document).on('click', '#confirm_order', function () {
        var name = $('#name').val();
        var inputAddress = $('#inputAddress').val();
        var inputCity = $('#inputCity').val();
        var delivery_method = $('#delivery_method').val();
        var inputPhone = $('#inputPhone').val();
        var items = $('textarea#ordered_products').val();
        console.log(items);
        $.ajax({
            type: "POST",
            url: "checkout.php",
            data: {
                'name': name,
                'inputAddress': inputAddress,
                'inputCity': inputCity,
                'delivery_method': delivery_method,
                'inputPhone': inputPhone,
                'items':items,
                'confirm_order': 1
            },
            success: function (response) {
                $('.checkout').remove();
                $('#order_confirm_message').show();
            }
        });
    })

    

});

