$(document).ready(function () {

    $.validator.addMethod("dateregex", function(value, element) {
        var startDate = new Date($("#sd").val());
        var endDate = new Date($("#ed").val());
        var currentDate = new Date();
        
        // Check if the selected start date is before the current date
        if (startDate.toLocaleDateString() < currentDate.toLocaleDateString()) {
            return false;
        }
    
        // Check if the selected start date is before or equal to the selected end date
        return startDate.toLocaleDateString() <= endDate.toLocaleDateString();
    }, "Enter valid date");

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
            },
            sd: {
                required: true,
                dateregex: true,
            },
            ed: {
                required: true,
                dateregex: true,
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
                required: "Reason is a required field",
            },
            sd: {
                required: "Submission date is a required field",
                dateregex : "Ensure that you haven't selected the date comes before the current date or start date is not selected after the end date",
            },
            ed: {
                required: "End date is a required field",
                dateregex : "Ensure that you haven't selected the date comes before the current date or end date is not selected before the start date",
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
            if (element.attr('name') == "sd") {
                $('#sd_err').html(error);
            };
            if (element.attr('name') == "ed") {
                $('#ed_err').html(error);
            };
        },
    });
});
