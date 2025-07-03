<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Temporary Password for TASK365 Vendor Account</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <p>Dear Vendor,</p>

    <p>You have requested to reset the password for your <strong>TASK365 vendor account</strong>.</p>

    <p><strong>Here is your temporary password:</strong><br>
    <strong>{{ $password }}</strong> <em>(Please change after login)</em></p>

    <p><strong>Login Here:</strong> <a href="https://www.task365.in" target="_blank">www.task365.in</a></p>

    <p>For your security, we strongly recommend updating your password immediately after logging in.</p>

    <p>If you did not request this, please ignore this email or contact our support team right away.</p>

    <p>For any help, feel free to write to us at <a href="mailto:support@task365.in">support@task365.in</a>.</p>

    <br>

    <p>Warm regards,<br>
    Team TASK365<br>
    <em>(A Company of Lorhan Spot Earn Pvt Ltd)</em><br>
    <a href="https://www.task365.in" target="_blank">www.task365.in</a></p>

    @include('emails.disclaimer')
</body>
</html>
