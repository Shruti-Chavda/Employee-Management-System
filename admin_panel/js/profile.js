$(document).ready(function () {
    $.validator.addMethod("fnregex", function (value, element) {
        var regex = /^[a-zA-Z]+$/;
        return regex.test(value);
    }, "First name must contain only letters");

    $.validator.addMethod("emregex", function (value1, element1) {
        var regex1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex1.test(value1);
    }, "Enter a valid email");

    $.validator.addMethod("pnregex", function (value, element) {
        var regex = /^[+\d]+$/;
        return regex.test(value);
    }, "Phone number must contain only digits");

    $.validator.addMethod("psregex", function (value2, element2) {
        var psgex1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return psgex1.test(value2);
    }, "Password must contain capital letters, small letters, numbers, and special characters.");
  
    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            fn: {
                required: true,
                minlength: 2,
                maxlength: 30,
                fnregex: true,
            },
            em: {
                required: true,
                emregex: true,
            },
            pn: {
                required: true,
                minlength: 10,
                maxlength: 10,
                pnregex: true,
            },
            np: {
                required: true,
                psregex: true,
            },
            cp: {
                required: true,
                equalTo: "#np",
            },
            f1: {
                required: true,
                extension: "jpg|png",
            },
        },
        messages: {
            fn: {
                required: "First Name is a required field",
                minlength: "First Name must have at least two characters",
                maxlength: "First Name can have a maximum of 30 characters",
            },
            em: {
                required: "Email is a required field",
                emregex: "Enter the valid email",
            },
            pn: {
                required: "Contact number is a required field",
                minlength: "Contact number contains 10 digits",
                maxlength: "Do not enter more than 10 digits",
                pnregex: true
            },
            np: {
                required: "Password is a required field",
                minlength: "Password must have at least five characters",
                maxlength: "Password can have a maximum of ten characters",
                psregex: "Password must contain capital letters, small letters, numbers, and special characters.",
            },
            cp: {
                required: "Confirm Password is a required field",
                equalTo: "Passwords do not match", // Error message for mismatched passwords
            },
            f1: {
                required: "Please upload an image",
                extension: "Only JPG and PNG files are allowed",
            },

        },
       
    });
});