<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Vendor Registration Notification</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <p>Hello Team,</p>

    <p>A new vendor has successfully registered on the <strong>Task365</strong> platform. Below are the registration details:</p>

    <ul>
        <li><strong>Vendor Name:</strong> {{ $user->name }}</li>
        <!--<li><strong>Location:</strong> {{ $user->city ?? 'N/A' }}, {{ $user->state ?? 'N/A' }}</li>-->
        <li><strong>Email ID:</strong> {{ $user->email }}</li>
        <li><strong>Phone Number:</strong> {{ $user->phone }}</li>
        <li><strong>Registration Time:</strong> {{ \Carbon\Carbon::parse($user->created_at)->timezone('Asia/Kolkata')->format('Y-m-d h:i:s A') }}</li>
    </ul>

    <p>Please verify and proceed with onboarding steps as per our internal SOP.</p>

    <p>Best regards, <br>
    Task365 System Notification<br>
    🌐 <a href="https://www.task365.in">www.task365.in</a></p>
</body>
</html>
