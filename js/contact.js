$(document).ready(function () {
  $.validator.addMethod("fnregex", function (value, element) {
    var regex = /^[a-zA-Z]+$/;
    return regex.test(value);
  }, "Full name must contain only letters");

  $.validator.addMethod("emregex", function (value1, element1) {
    var regex1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return regex1.test(value1);
  }, "Enter a valid email");

  $('#form4').validate({
    rules: {
      fn: {
        required: true,
        minlength: 2,
        maxlength: 30,
        fnregex: true
      },
      em2: {
        required: true,
        emregex: true
      },
      sb: {
        required: true,
        minlength: 10
      },
      ms: {
        required: true,
        minlength: 20,
      },
    },
    messages: {
      fn: {
        required: "Name is a required field",
        minlength: "Name must have at least two characters",
        maxlength: "Name can have a maximum of 30 characters"
      },
      em2: {
        required: "Email is a required field",
      },
      sb: {
        required: "Subject is a required field",
        minlength: "Subject must have at least 10 characters"
      },
      ms: {
        required: "Message is a required field",
        minlength: "Message must have at least 20 characters"
      },
    },
    errorPlacement: function (error, element) {
      if (element.attr('name') == "fn") {
        $('#fn_err').html(error);
      } else if (element.attr('name') == "em2") {
        $('#em1_err').html(error);
      } else if (element.attr('name') == "sb") {
        $('#sb_err').html(error);
      } else if (element.attr('name') == "ms") {
        $('#msg_err').html(error);
      }
    },
  });
});
