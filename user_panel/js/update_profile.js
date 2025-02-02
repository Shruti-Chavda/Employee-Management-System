    // Initialize jQuery Validate plugin for form validation
    $('#registrationForm').validate({
        rules: {
           
            fn: {
                required: true
            },
            ln: {
                required: true
            },
            email: {
                required: true
            },
            dob: {
                required: true,
            },
            gender: {
                required: true,
            },
            contactNumber: {
                required: true,
            },
            dob: {
                required: true,
            },
            address: {
                required: true,
            },
            department: {
                required:  true,
            },
            degree: {
                required:  true,
            },
          
        },
        messages: {
            
            fn: {
                required: "First Name is required field"
            },
            ln: {
                required: "Last Name is required field"
            },
            email: {
                required: "Email is required field"
            },
            dob: {
                required: "Date of birth is required field",
            },
            gender: {
                required: "Gender is required field",
            },
            contactNumber: {
                required: "Contact is required field",
            },
            dob: {
                required: "Date of birth is required field",
            },
            department: {
                required: "Department is required field",
            },
            degree: {
                required: "Degree is required field",
            },

        },
       
    });