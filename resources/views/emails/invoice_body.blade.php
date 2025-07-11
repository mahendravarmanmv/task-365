<p>Dear {{ ucfirst($payment->user->name) }},</p>

<p>
    Thank you for your purchase!<br>
    Please find the invoice attached to this email for your reference.
</p>

<p>
    Here are the lead details for your order:
</p>

<ul style="line-height: 1.6;">
    <li><strong>Lead Name:</strong> {{ $payment->lead->lead_name ?? 'N/A' }}</li>
    <li><strong>Email:</strong> {{ $payment->lead->lead_email ?? 'N/A' }}</li>
    <li><strong>Phone:</strong> {{ $payment->lead->lead_phone ?? 'N/A' }}</li>
    <li><strong>Business Name:</strong> {{ $payment->lead->business_name ?? 'N/A' }}</li>
    <li><strong>Location:</strong> {{ $payment->lead->location ?? 'N/A' }}</li>    
    <li><strong>Service Timeframe:</strong> {{ $payment->lead->service_timeframe ?? 'N/A' }}</li>
    <li><strong>Lead Notes:</strong><br>{!! nl2br(e($payment->lead->lead_notes ?? 'N/A')) !!}</li>
</ul>

<p style="margin-top: 20px;">Regards,<br>Task365 Team</p>

@include('emails.disclaimer')
