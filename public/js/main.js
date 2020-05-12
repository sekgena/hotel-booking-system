$(function () {

    $('#searchGuest').on('show.bs.modal', function (e) {
        var roomId = $(e.relatedTarget).data('room-id');
        $("#btnSearchGuest").attr('data-room-id', roomId);
        $("#btnNewGuest").attr('data-room-id', roomId);
    });

    $("#btnSearchGuest").on('click', function () {
        var roomId = $(this).data('room-id');
        var email = $("#guestEmail").val();

        if (!validateEmail(email)) {
            $("#emailError").show();
            return;
        }

        if (roomId !== undefined) {
            window.location.href = "/guest/search/" + roomId + "/" + email;
        }
    });

    $("#btnNewGuest").on('click', function () {
        var roomId = $(this).data('room-id');

        if (roomId !== undefined) {
            window.location.href = "/guest/add/" + roomId;
        }
    });

    $('#checkOutModal').on('show.bs.modal', function (e) {
        var roomCheckoutUrl = $(e.relatedTarget).data('checkout-url');
        $("#btnDoCheckout").attr('data-checkout-url', roomCheckoutUrl);
    });

    $("#btnDoCheckout").on('click', function () {
        var roomCheckoutUrl = $(this).data('checkout-url');
        if (roomCheckoutUrl !== undefined) {
            window.location.href = roomCheckoutUrl;
        }
    });

});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
