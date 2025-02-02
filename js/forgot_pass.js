$(document).ready(function () {
    $.validator.addMethod("customEmail", function (value, element) {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex.test(value);
    }, "Enter a valid email");

    $('#form1').validate({
        rules: {
            em: {
                required: true,
            },
        },
        messages: {
            em: {
                required: "Email is a required field",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "em") {
                $('#em_err').html(error);
            }
        },
    });
});
