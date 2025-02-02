    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            title: {
                required: true
            },
            number: {
                required: true,
                maxlength: 4
            },
        },
        messages: {
            title: {
                required: "Please enter a title"
            },
            number: {
                required: "Please enter number",
                maxlength: "valid range for number is 0 to 9999"
            },
        },
       
    });