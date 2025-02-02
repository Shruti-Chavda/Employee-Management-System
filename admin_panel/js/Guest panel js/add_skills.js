    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            title: {
                required: true
            },
            progress: {
                required: true,
                maxlength: 2
            },
            color: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter a title"
            },
            progress: {
                required: "Please enter progress",
                maxlength: "valid range for progress is 0 to 99"
            },
            color: {
                required: "Please select color",
            }
        },
       
    });