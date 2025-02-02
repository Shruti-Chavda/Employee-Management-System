$(document).ready(function () {
    $.validator.addMethod("emregex", function (value1, element1) {
        var regex1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex1.test(value1);
    }, "Enter a valid email");

    $('#registrationForm').validate({
        rules: {
            nid: {
                required: true,
            },
            nm: {
                required: true,
            },
            em:{
                required: true,
                emregex:true,
            },
            dep: {
                required: true,
            },
            pn: {
                required: true,
                minlength:10,
                maxlength:10,
            },
            sd: {
                required: true,
            },
            ed: {
                required: true,
            },
            des: {
                required: true,
            },
            add:{
                required: true,
            },
            cs:{
                required: true,

            }
           
        },
        messages: {
            nid: {
                required: "ID is required field",
            },
            nm: {
                required: "Name is required field",
            },
            em:{
                required: "Email is required field",
                emregex:"Enter valid email",
            },
            dep: {
                required: "Department is required field",
            },
            pn: {
                required: "Phone is required field",
            },
            sd: {
                required: "Start Date is required field",
            },
            ed: {
                required: "End Date is required field",
            },
            des: {
                required: "Description is required field",
            },
           
            add:{
                required: "Address is required field",
            },
            cs:{
                required: "Cost is required field",

            }
          
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "nid") {
                $('#nid_err').html(error);
            };
            if (element.attr('name') == "nm") {
                $('#nm_err').html(error);
            };
            if (element.attr('name') == "em") {
                $('#em_err').html(error);
            };
            if (element.attr('name') == "dep") {
                $('#dep_err').html(error);
            };
            if (element.attr('name') == "pn") {
                $('#pn_err').html(error);
            };
            if (element.attr('name') == "sd") {
                $('#sd_err').html(error);
            };
            if (element.attr('name') == "des") {
                $('#des_err').html(error);
            };
            if (element.attr('name') == "ed") {
                $('#ed_err').html(error);
            };
            if (element.attr('name') == "add") {
                $('#add_err').html(error);
            };
            if (element.attr('name') == "cs") {
                $('#cs_err').html(error);
            };
            
        },
      
    });
});
