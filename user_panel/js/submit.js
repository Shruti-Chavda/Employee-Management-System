$(document).ready(function () {

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
            },
            f: {
                required: true,
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
                required: "Descripton is a required field",
                minlength: "Description have at least 20 characters",
            },
            dd: {
                required: "Due date is a required field",
            },
            sd: {
                required: "Submission date is a required field",
            },
            f: {
                required: "File is a required field",
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
            if (element.attr('name') == "f") {
                $('#f_err').html(error);
            };
            
        },
       
    });
});
