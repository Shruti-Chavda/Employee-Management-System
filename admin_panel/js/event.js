$(document).ready(function () {

    $.validator.addMethod("dateregex", function (value, element) {
        var selectedDate = new Date(value);
        var currentDate = new Date();
        return selectedDate >= currentDate;
    }, "Please select valid date");

    $.validator.addMethod("timeOrder1", function (value, element) {
        var startingTime = $("#st").val(); // Select starting time field using its ID
        var endingTime = $("#et").val(); // Select ending time field using its ID
        
        // Check if starting time is not empty
        if (!startingTime || !endingTime) {
            return true; // If starting or ending time is empty, skip the comparison
        }
        
        // Extract hours and minutes from starting and ending times
        var stHours = parseInt(startingTime.split(":")[0]);
        var stMinutes = parseInt(startingTime.split(":")[1]);
        var etHours = parseInt(endingTime.split(":")[0]);
        var etMinutes = parseInt(endingTime.split(":")[1]);
        
        // Convert AM/PM time to 24-hour format
        if (startingTime.includes("pm") && stHours !== 12) {
            stHours += 12;
        }
        if (endingTime.includes("pm") && etHours !== 12) {
            etHours += 12;
        }
        if (startingTime.includes("am") && stHours === 12) {
            stHours = 0;
        }
        if (endingTime.includes("am") && etHours === 12) {
            etHours = 0;
        }
        
        // Compare the adjusted time values
        if (stHours > etHours || (stHours === etHours && stMinutes >= etMinutes)) {
            return false;
        }
        return true;
    }, "Starting time must be before ending time");
    
    
    
    
    $.validator.addMethod("timeOrder", function (value, element) {
        var startingTime = $("#st").val(); // Select starting time field using its ID
        var endingTime = $("#et").val(); // Select ending time field using its ID
        
        // Check if starting time is not empty
        if (!startingTime) {
            return true; // If starting time is empty, skip the comparison
        }
        
        // Extract hours and minutes from starting and ending times
        var stHours = parseInt(startingTime.split(":")[0]);
        var stMinutes = parseInt(startingTime.split(":")[1]);
        var etHours = parseInt(endingTime.split(":")[0]);
        var etMinutes = parseInt(endingTime.split(":")[1]);
        
        // Convert AM/PM time to 24-hour format
        if (startingTime.includes("pm") && stHours !== 12) {
            stHours += 12;
        }
        if (endingTime.includes("pm") && etHours !== 12) {
            etHours += 12;
        }
        if (startingTime.includes("am") && stHours === 12) {
            stHours = 0;
        }
        if (endingTime.includes("am") && etHours === 12) {
            etHours = 0;
        }
        
        // Compare the adjusted time values
        if (stHours > etHours || (stHours === etHours && stMinutes >= etMinutes)) {
            return false;
        }
        return true;
    }, "Ending time must be after starting time");
    
    


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
                dateregex: true,
            },
            st: {
                required: true,
                timeOrder1: true,

            },
            et: {
                required: true,
                timeOrder: true,
            },
            ad: {
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
                dateregex: "Make you do not select the advanced date from the current date",
            },
            st: {
                required: "Starting time is a required field",
                timeOrder1: "Ensure the starting time is not after the ending time",

            },
            et: {
                required: "Ending time is a required field",
                timeOrder: "Ensure the ending time is not before the starting time",
            },
            ad: {
                required: "Address is a required field",
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
            if (element.attr('name') == "st") {
                $('#st_err').html(error);
            };
            if (element.attr('name') == "et") {
                $('#et_err').html(error);
            };
            if (element.attr('name') == "ad") {
                $('#ad_err').html(error);
            };
            
        },
    });
});
