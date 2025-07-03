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
    📞 +91-8790399660<br>
    🌐 <a href="https://www.task365.in">www.task365.in</a></p>
	<hr style="margin-top: 30px;">

    <small style="font-size: 12px; color: #555;">
        <strong>Disclaimer:</strong><br>
        This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the sender immediately and delete it from your system. Any unauthorized review, use, disclosure, copying, distribution, or taking action based on its contents is strictly prohibited and may be unlawful.<br><br>

        TASK365 (a product of Lorhan Spot Earn Pvt Ltd) accepts no liability for the content of this email or for any damage caused by any virus or malware transmitted by this email.<br><br>

        All email communications are subject to monitoring by TASK365 in accordance with applicable laws. The views or opinions presented in this email do not necessarily represent those of the company unless explicitly stated.<br><br>

        For support or further information, please contact us at <a href="mailto:support@task365.in">support@task365.in</a> or visit <a href="https://www.task365.in">www.task365.in</a>.<br><br>

        This communication and any dispute arising from it are subject to Indian laws and the jurisdiction of courts located in Hyderabad, Telangana, India.
    </small>
</body>
</html>
