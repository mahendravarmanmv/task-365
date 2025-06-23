$(document).ready(function () {
    // Custom validator for email or 10-digit phone
    $.validator.addMethod("emailOrPhone", function(value, element) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[6-9]\d{9}$/; // Use Indian format if needed
    return this.optional(element) || emailRegex.test(value) || phoneRegex.test(value);
}, "Enter valid email or Indian mobile number");


    $("#login-form").validate({
        rules: {
            login: {
                required: true,
                emailOrPhone: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            login: {
                required: "Please enter email or phone number"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password must be at least 6 characters"
            }
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        }
    });
});
