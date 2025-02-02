$(document).ready(function () {

    $.validator.addMethod("dateregex", function (value, element) {
        var DueDate = new Date($("#dd").val());
        var subDate = new Date($("#sd").val());

        return subDate <= DueDate;
    }, "Please select a valid date");

    $.validator.addMethod("nonNegative", function(value, element) {
        return parseInt(value) >= 0;
    }, "Negative marks assigning is not allowed");

    $('#registrationForm').validate({
        rules: {
            nid: {
                required: true,
            },
            nm: {
                required: true,
            },
            des: {
                required: true,
                minlength: 20,
            },
            dd: {
                required: true,
            },
            sd: {
                required: true,
                dateregex: true,
            },
            p: {
                required: true,
                maxlength: 3,
                nonNegative: true,
            },
        },
        messages: {
            nid: {
                required: "ID is a required field",
            },
            nm: {
                required: "Name is a required field",
            },
            des: {
                required: "Description is a required field",
                minlength: "Description must have at least 20 characters",
            },
            dd: {
                required: "Due date is a required field",
            },
            sd: {
                required: "Submission date is a required field",
                dateregex: "Ensure selected date is not after the due date",
            },
            p: {
                required: "Points is a required field",
                maxlength: "You can't assign more than 3 characters",
                nonNegative: "No negative marking is allowed"
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "nid") {
                $('#nid_err').html(error);
            };
            if (element.attr('name') == "nm") {
                $('#nm_err').html(error);
            };
            if (element.attr('name') == "des") {
                $('#des_err').html(error);
            };
            if (element.attr('name') == "dd") {
                $('#dd_err').html(error);
            };
            if (element.attr('name') == "sd") {
                $('#sd_err').html(error);
            };
            if (element.attr('name') == "p") {
                $('#p_err').html(error);
            };   
        },
    });
});
