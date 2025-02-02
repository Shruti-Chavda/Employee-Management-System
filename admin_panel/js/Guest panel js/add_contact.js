    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            title: {
                required: true
            },
            para: {
                required: true
            },
            icon: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter a title"
            },
            para: {
                required: "Please enter a content"
            },
            icon: {
                required: "Please select icon class name",
            }
        },
       
    });