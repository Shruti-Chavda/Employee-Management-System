$(document).ready(function () {
    $.validator.addMethod("emregex", function (value1, element1) {
        var regex1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex1.test(value1);
    }, "Enter a valid email");
    $('#form1').validate({
        rules: {
            em: {
                required: true,
                emregex: true
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

