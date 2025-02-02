// Add a custom validation method to check if the name contains only letters and underscores
$.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-Z_]+$/.test(value);
}, "Name can only contain letters and underscores");

$('#registrationForm').validate({
    rules: {
        name: {
            required: true,
            validName: true
        },
        title: {
            required: true
        }
    },
    messages: {
        name: {
            required: "Name is required field",
            validName: "Name should not contain any white spaces or special characters or number, use the '_'(Underscore) to seperate the string "
        },
        title: {
            required: "Title is required field"
        }
    }
});
