$(document).ready(function () {
    $('#contactForm').validate({
        rules: {
            author: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            subject: {
                required: true
            },
            comment: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            author: "Please enter your name",
            email: "Please enter a valid email",
            phone: "Please enter a valid 10-digit phone number",
            subject: "Please enter your company name",
            comment: "Please enter your message (at least 10 characters)"
        },
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function (form) {
            $('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Sending...');
            form.submit();
        }
    });
});
