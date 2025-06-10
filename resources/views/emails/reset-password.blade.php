<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
    <p>Dear {{ $user->name ?? 'User' }},</p>
    <p>Your new password is: <strong>{{ $password }}</strong></p>
    <p>You can log in using this password. For security, please update your password from your profile page after logging in.</p>
    <br>
    <p>Thanks,<br>Task365 Team</p>
</body>
</html>
