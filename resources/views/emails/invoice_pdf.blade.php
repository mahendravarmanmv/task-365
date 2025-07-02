<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: sans-serif; }
        h2 { color: #444; }
    </style>
</head>
<body>
    <h2>Payment Invoice</h2>
    <p><strong>Name:</strong> {{ $payment->user->name }}</p>
    <p><strong>Email:</strong> {{ $payment->user->email }}</p>
    <p><strong>Order ID:</strong> {{ $payment->order_id }}</p>
    <p><strong>Amount:</strong> ₹{{ $payment->amount }}</p>
    <p><strong>Status:</strong> Paid</p>
    <p><strong>Date:</strong> {{ $payment->created_at->format('d M Y, h:i A') }}</p>
</body>
</html>
