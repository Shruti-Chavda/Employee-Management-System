    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
            person: {
                required: true
            },
            position: {
                required: true,
            },
            para: {
                required: true
            },
            f1: {
                required: true,
                extension: "jpg|png"
            },
            
        },
        messages: {
            person: {
                required: "Please enter a person"
            },
            position: {
                required: "Please enter the position",
            },
            para: {
                required: "Please enter a content"
            },
            f1: {
                required: "Please upload an image",
                extension: "Only JPG and PNG files are allowed"
            },
            

        },
       
    });