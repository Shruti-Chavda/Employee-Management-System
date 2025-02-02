    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            name: {
                required: true
            },
            position: {
                required: true,
            },
            f1: {
                required: true,
                extension: "jpg|png"
            },
            
        },
        messages: {
            name: {
                required: "Please enter a name"
            },
            position: {
                required: "Please enter the position",
            },
            f1: {
                required: "Please upload an image",
                extension: "Only JPG and PNG files are allowed"
            },
            

        },
       
    });