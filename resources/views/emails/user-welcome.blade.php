<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vendor Registration Received – Task365</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">

        <p>Dear <strong>{{ $user->name }}</strong>,</p>

        <p>Thank you for registering as a vendor on <strong>Task365</strong>!</p>

        <p>We have successfully received your registration details. Our team will now review your application to ensure all the provided information is valid and complete.</p>

        <p>Once approved, you will receive your Vendor ID and login credentials via email. This will allow you to access your vendor dashboard, add products, manage orders, and more.</p>

        <hr>

        <h4>Here’s a summary of your submission:</h4>
        <ul>
            <li><strong>Vendor Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Phone Number:</strong> {{ $user->phone }}</li>
            <!--<li><strong>Location:</strong> {{ $user->city ?? 'N/A' }}, {{ $user->state ?? 'N/A' }}</li>-->
            <li><strong>Registration Time:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d F Y, h:i A T') }}</li>
        </ul>

        <hr>

        <p><strong>Need Help?</strong><br>
        For any queries or to speed up the process, feel free to contact us on WhatsApp:<br>
        <strong>+91-9989926633</strong></p>

        <p>We appreciate your interest and look forward to working together!</p>

        <p>Warm regards,<br>
        Team Task365</p>

        <p>
            🌐 <a href="https://www.task365.in">www.task365.in</a><br>
            ✉️ <a href="mailto:support@task365.in">support@task365.in</a>
        </p>
    </div>
	@include('emails.disclaimer')
</body>
</html>
