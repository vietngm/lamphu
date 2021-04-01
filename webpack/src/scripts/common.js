jQuery(function ($) {
    /*-----------------------------------------------*/
    $('#contactForm').submit(function () {
        if ($('input[name="sendmail"]').hasClass('disabled')) {
            return false;
        }
        else {
            $('#messageDialog').modal('show');
            var username = $('#fullname').val();
            var m = $('#message').val();
            var address = $('#address').val();
            var p = $('#phonenumber').val();
            var email = $('#mailaddress').val();
            var data = {
                action: "sendmailContact",
                user: username,
                mail: email,
                add: address,
                phone: p,
                message: m
            };
            $.post(ajaxurl, data, function (rdata) {
                //if(rdata==1)
                $('#messageDialog').empty();
                $('#messageDialog').modal('show').html(rdata);
            });
            return false;
        }
    });
    /*-----------------------------------------------*/
});
