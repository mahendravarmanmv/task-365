<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Failed</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <p>Dear {{ $payment->user->name }},</p>

    <p>We hope you're doing well.</p>

    <p>This is to inform you that your recent payment attempt for Task365 was <strong>unsuccessful</strong>. Please find the payment details below:</p>

    <ul>
        <li><strong>Vendor Name:</strong> {{ $payment->user->name }}</li>
        <li><strong>Task Reference:</strong> {{ $payment->lead->lead_name ?? 'N/A' }}</li>
        <li><strong>Amount:</strong> ₹{{ number_format($payment->amount, 2) }}</li>
        <li><strong>Payment Date:</strong> {{ $payment->updated_at->format('d-m-Y H:i A') }}</li>
        <li><strong>Status:</strong> Failed</li>
    </ul>

    <p>
        You can retry your payment using the link below:<br>
        <a href="{{ route('leads.payment', ['lead' => $payment->lead_id]) }}">Retry Payment</a>
    </p>

    <p>If you've already completed the payment or need any help, feel free to reply to this email or contact us at <a href="mailto:support@task365.in">support@task365.in</a>.</p>

    <p>Thank you for your attention and cooperation.</p>

    <p>Best regards,<br>
    Team Task365<br>
    📧 support@task365.in<br>
    📞 +91-9989926633<br>
    🌐 <a href="https://www.task365.in">www.task365.in</a></p>
	@include('emails.disclaimer')
</body>
</html>
