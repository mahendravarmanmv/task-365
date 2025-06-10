    $('#forgot-password-form').on('submit', function (e) {
        $('.text-danger').remove();
        const email = $('input[name="email"]').val();
        let isValid = true;

        if (!email) {
            $('input[name="email"]').after('<div class="text-danger">Email is required</div>');
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            $('input[name="email"]').after('<div class="text-danger">Enter valid email</div>');
            isValid = false;
        }

        if (!isValid) e.preventDefault();
    });