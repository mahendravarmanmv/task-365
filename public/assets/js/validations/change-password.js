document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const input = document.getElementById(this.getAttribute('data-target'));
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
	

$(document).ready(function () {
    $('#changepassword').validate({
        rules: {
            old_password: { required: true },
            new_password: { required: true, minlength: 6 },
            new_password_confirmation: {
                required: true,
                equalTo: '[name="new_password"]'
            }
        },
        messages: {
            old_password: { required: "Please enter your old password" },
            new_password: {
                required: "Please enter a new password",
                minlength: "Your new password must be at least 6 characters"
            },
            new_password_confirmation: {
                required: "Please confirm your new password",
                equalTo: "Passwords do not match"
            }
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback d-block',
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
            if (element.closest('.input-group').length) {
                error.insertAfter(element.closest('.input-group'));
            } else {
                error.insertAfter(element);
            }
        }
    });
});

