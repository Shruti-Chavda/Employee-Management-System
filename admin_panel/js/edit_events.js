$(document).ready(function () {
    $.validator.addMethod("dateregex", function (value, element) {
        var currentDate = new Date();
        var selectedDate = new Date(value);

        // Check if the selected date is exactly equal to the current date and time
        if (selectedDate.toLocaleDateString() >= currentDate.toLocaleDateString()) {
            $("#a1").show();
        } else {
            $("#a1").hide();
        }
    
        // Ensure selected date is not before the current date
        return selectedDate >= currentDate;
    }, "Please select a valid date");

    $.validator.addMethod("timeOrder1", function (value, element) {
        var startingTime = $("#starting_time").val();
        var endingTime = $("#ending_time").val();
        
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
        var startingTime = $("#starting_time").val();
        var endingTime = $("#ending_time").val();
        
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
    }, "Ending time must be after starting time");

    $('#editEventForm').validate({
        rules: {
            event_name: {
                required: true,
            },
            description: {
                required: true,
                minlength: 20,
            },
            event_date: {
                required: true,
                dateregex: true,
            },
            starting_time: {
                required: true,
                timeOrder1: true,
            },
            ending_time: {
                required: true,
                timeOrder: true,
            },
            address: {
                required: true,
            },
        },
        messages: {
            event_name: {
                required: "Event Name is required",
            },
            description: {
                required: "Description is required",
                minlength: "Description must have at least 20 characters",
            },
            event_date: {
                required: "Event Date is required",
                dateregex: "Ensure selected date and time are not before the current date and time",
            },
            starting_time: {
                required: "Starting Time is required",
                timeOrder1: "Ensure the starting time is before the ending time",
            },
            ending_time: {
                required: "Ending Time is required",
                timeOrder: "Ensure the ending time is after the starting time",
            },
            address: {
                required: "Address is required",
            },
        },
        errorPlacement: function (error, element) {
            console.log("Error:", error);
            console.log("Element:", element);
            
            if (element.attr('name') == "event_name") {
                $('#en_err').html(error); 
            } else if (element.attr('name') == "description") {
                $('#ds_err').html(error);
            } else if (element.attr('name') == "event_date") {
                $('#dt_err').html(error);
            } else if (element.attr('name') == "starting_time") {
                $('#st_err').html(error);
            } else if (element.attr('name') == "ending_time") {
                $('#et_err').html(error);
            } else if (element.attr('name') == "address") {
                $('#ad_err').html(error);
            }
        },
            
    });
});
