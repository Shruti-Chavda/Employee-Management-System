    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            title: {
                required: true
            },
            para: {
                required: true
            },
            f1: {
                required: true,
                extension: "jpg|png"
            }
        },
        messages: {
            title: {
                required: "Please enter a title"
            },
            para: {
                required: "Please enter a content"
            },
            f1: {
                required: "Please upload an image",
                extension: "Only JPG and PNG files are allowed"
            }
        },
       
    });