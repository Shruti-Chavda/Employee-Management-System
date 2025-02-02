$(document).ready(function () {
    $('#registrationForm').validate({
        rules: {
            emp: {
                required: true,
            },
            mb: {
                required: true,
                minlength: 10, // updated minlength to 10
            },
            em:{
                required: true,
            },
            event_date: {
                required: true,
            },
            start_time: {
                required: true,
            },
            end_time: {
                required: true,
            },
            venue_address: {
                required: true,
            },
            service: {
                required: true,
            },
            additional_info: {
                required: true,
            }
        },
        messages: {
            emp: {
                required: "Employee Name is a required field",
            },
            mb: {
                required: "Mobile Number is a required field",
                minlength: "Mobile Number must be at least 10 characters long",
            },
            em: {
                required: "Email is a required field",

            },
            event_date: {
                required: "Event Date is a required field",
            },
            start_time: {
                required: "Event Starting Time is a required field",
            },
            end_time: {
                required: "Event Ending Time is a required field",
            },
            venue_address: {
                required: "Venue Address is a required field",
            },
            service: {
                required: "Title of participation is a required field",
            },
            additional_info: {
                required: "Additional Information is a required field",
            }
        },
        errorPlacement: function (error, element) {
            // Assigning error messages to respective elements
            if (element.attr('name') == "emp") {
                $('#emp_err').html(error);
            } else if (element.attr('name') == "mb") {
                $('#mb_err').html(error);
            } else if (element.attr('name') == "em") {
                $('#em_err').html(error);
            } else if (element.attr('name') == "event_date") {
                $('#event_date_err').html(error);
            } else if (element.attr('name') == "start_time") {
                $('#start_time_err').html(error);
            } else if (element.attr('name') == "end_time") {
                $('#end_time_err').html(error);
            } else if (element.attr('name') == "venue_address") {
                $('#venue_address_err').html(error);
            } else if (element.attr('name') == "service") {
                $('#service_err').html(error);
            } else if (element.attr('name') == "additional_info") {
                $('#additional_info_err').html(error);
            }
        },
        submitHandler: function (form) {
            // Submit the form if all validations pass
            form.submit();
        }
    });
});
