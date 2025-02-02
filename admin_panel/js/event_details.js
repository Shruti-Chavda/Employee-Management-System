$(document).ready(function () {

    $('#registrationForm').validate({
        rules: {
            evn: {
                required: true,
            },
            des: {
                required: true,
                minlength: 20,
            },
            dt: {
                required: true,
            },
           
        },
        messages: {
            evn: {
                required: "Event Name is a required field",
              },
            des: {
                required: "Descripton is a required field",
                minlength: "Description have at least 20 characters",
            },
            dt: {
                required: "Date is a required field",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "evn") {
                $('#evn_err').html(error);
            };
            if (element.attr('name') == "des") {
                $('#des_err').html(error);
            };
            if (element.attr('name') == "dt") {
                $('#dt_err').html(error);
            };
            
        },
    
    });
});
