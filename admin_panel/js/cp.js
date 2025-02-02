$(document).ready(function () {

    $('#registrationForm').validate({
        rules: {
            op: {
                required: true,
            },
            np: {
                required: true,
            },
            cp: {
                required: true,
                equalTo: "#np" 
            },
        },
        messages: {
            op: {
                required: "Old Password is a required field",
            },
            np: {
                required: "New Password is a required field",
            },
            cp: {
                required: "Confirm Password is a required field",
                equalTo: "Passwords do not match" // Error message for mismatched passwords
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "op") {
                $('#op_err').html(error);
            }
            if (element.attr('name') == "np") {
                $('#np_err').html(error);
            }
            if (element.attr('name') == "cp") {
                $('#cp_err').html(error);
            }
        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            window.location.href = window.location.pathname + "?" + formData;
        }
        
    });
});
