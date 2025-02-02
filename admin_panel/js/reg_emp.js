$(document).ready(function () {
    $.validator.addMethod("fnregex", function (value, element) {
        var regex = /^[a-zA-Z]+$/;
        return regex.test(value);
    }, "Full name must contain only letters");

    $.validator.addMethod("emregex", function (value1, element1) {
        var regex1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex1.test(value1);
    }, "Enter a valid email");

    $.validator.addMethod("pnregex", function (value, element) {
        var regex = /^[+\d]+$/;
        return regex.test(value);
    }, "Phone number must contain only digits");

    $.validator.addMethod("birthdayregex", function (value, element) {
        var selectedDate = new Date(value);
        var currentDate = new Date();
        return selectedDate <= currentDate;
    }, "Please select a valid birthday");

    $.validator.addMethod("salaryrange", function (value, element) {
        var salary = parseInt(value);
        return salary >= 15000 && salary <= 165000;
    }, "Salary should be between ₹15000 and ₹165000");


    $.validator.addMethod("psregex", function (value2, element2) {
        var psgex1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return psgex1.test(value2);
    }, "Password must contain capital letters, small letters, numbers, and special characters.");


    $('#registrationForm').validate({
        rules: {
            fn: {
                required: true,
                minlength: 2,
                maxlength: 30,
                fnregex: true
            },
            ln: {
                required: true,
                minlength: 2,
                maxlength: 30,
                fnregex: true
            },
            em: {
                required: true,
                emregex: true
            },
            bd: {
                required: true,
                birthdayregex: true,
            },
            pn: {
                required: true,
                minlength: 10,
                maxlength: 10,
                pnregex: true
            },
            nid: {
                required: true,
            },
            ad: {
                required: true,
            },
            dep: {
                required: true,
            },
            deg: {
                required: true,
            },
            sal:{
                required: true,
                salaryrange: true 
            },
            ps: {
                required: true,
                minlength: 5,
                maxlength: 10,
                psregex: true
            },
            cp: {
                required: true,
                equalTo: '#ps1'
            }

        },
        messages: {
            fn: {
                required: "First Name is a required field",
                minlength: "First Name must have at least two characters",
                maxlength: "First Name can have a maximum of 30 characters"
            },
            ln: {
                required: "Last Name is a required field",
                minlength: "Last Name must have at least two characters",
                maxlength: "Last Name can have a maximum of 30 characters"
            },
            em: {
                required: "Email is a required field",
                emregex: "Enter the valid email",
            },
            bd: {
                required: "Birthday is a required field",
                birthdayregex: "Ensure selected date is not after the current date",
            },
            pn: {
                required: "Contact number is a required field",
                minlength: "Contact number contains 10 digits",
                maxlength: "Do not enter more than 10 digits",
                pnregex: true
            },
            nid: {
                required: "NID is a required field",
            },
            ad:{
                required: "Address is a required field",
            },
            dep: {
                required: "Department is a required field",
            },
            deg: {
                required: "Degree is a required field",
            },
            sal:{
                required: "Salary is a required field",
                salaryrange: "Salary should be between ₹15,000 to ₹1,65,000"
            },
            ps: {
                required: "Password is a required field",
                minlength: "Password must have at least five characters",
                maxlength: "Password can have a maximum of ten characters"
            },
            cp: {
                required: "Confirm Password is a required field",
                equalTo: "Password doesn't match"
            }
           
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "fn") {
                $('#fn_err').html(error);
            };
            if (element.attr('name') == "ln") {
                $('#ln_err').html(error);
            };
            if (element.attr('name') == "em") {
                $('#em_err').html(error);
            };
            if (element.attr('name') == "bd") {
                $('#bd_err').html(error);
            };
            if (element.attr('name') == "pn") {
                $('#pn_err').html(error);
            };
            if (element.attr('name') == "nid") {
                $('#nid_err').html(error);
            };
            if (element.attr('name') == "ad") {
                $('#ad_err').html(error);
            };
            if (element.attr('name') == "dep") {
                $('#dep_err').html(error);
            };
            if (element.attr('name') == "deg") {
                $('#deg_err').html(error);
            };
            if (element.attr('name') == "sal") {
                $('#sal_err').html(error);
            };
            if (element.attr('name') == "ps") {
                $('#ps_err').html(error);
            }
            if (element.attr('name') == "cp") {
                $('#cp_err').html(error);
            }
        },
    });
});
