<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .header { background-color: #033796; color: white; padding: 10px; text-align: center; }
        .highlight { color: #e60000; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .section-title { margin-top: 30px; font-weight: bold; color: #e60000; }
        .small-text { font-size: 12px; color: #666; }
		.disclaimer {
            font-size: 11px;
            color: #666;
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>

{{-- Logo --}}
    <div class="logo-container">
        <img src="{{ public_path('assets/images/Task-365-Logo.png') }}" alt="Task365 Logo" height="60" style="margin-bottom:20px;">
    </div>

    <div class="header">
        <h2>Thanks for your order!</h2>
    </div>

    <p>Hi {{ $payment->user->name }},</p>

    <p>
        Just to let you know — we’ve received your order 
        <span class="highlight">[Order #{{ $payment->order_id }}] ({{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }})</span>, 
        and it is now being processed.
    </p>

    <table>
        <thead>
            <tr>
                <th>Lead ID</th>
                <th>Category</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $payment->lead->lead_unique_id ?? 'N/A' }}</td>
                <td>{{ $payment->lead->category->category_title ?? 'N/A' }}</td>
                <td>{{ $payment->lead->lead_name ?? 'Lead Purchased' }}</td>
                <td>1</td>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Subtotal:</strong></td>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Payment method:</strong></td>
                <td>{{ $payment->payment_method ?? 'Cashfree Payments' }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="section-title">Billing Address</div>
    <p>
        {{ $payment->user->name }}<br>
        {{ $payment->user->company_name ?? '' }}<br>
        {{ $payment->user->email }}<br>
        {{ $payment->user->phone ?? '' }}
    </p>

    <br><br>
    <p class="small-text">Thanks for using <strong>Task365.in</strong>!</p>
    <p class="small-text">We hope to serve you again soon.</p>
	
	{{-- Footer Disclaimer --}}
<div class="disclaimer">
    <strong>Disclaimer:</strong> All lead information provided is based on available data at the time of purchase. It has been shared in good faith and is backed by sufficient evidence. Task365.in does not guarantee conversion or responsiveness of the lead as final results depend on your follow up and communication methods. As leads are shared instantly with proof, purchases are final and non-refundable.
</div>

</body>
</html>
