
$(document).ready(function () {

    $('#form2').validate({
        rules: {
            un: {
                required: true,
            },
            ps: {
                required: true,
            },
        },
        messages: {
            un: {
                required: "Name is a required field",
            },
            ps: {
                required: "Password is a required field",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "un") {
                $('#un_err').html(error);
            };
            if (element.attr('name') == "ps") {
                $('#ps_err').html(error);
            }
        },
        
    });
});

function myFunction() {
    var x = document.getElementById("ps1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}