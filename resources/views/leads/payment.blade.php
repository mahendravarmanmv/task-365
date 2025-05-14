@extends('layouts.app-home')

@section('content')
<div class="container mt-4">
    <h3>Proceeding to Payment for:</h3>
    <p><strong>Lead:</strong> {{ $lead->lead_name }}</p>
    <p><strong>Amount:</strong> ₹ {{ $lead->budget_min }} - ₹ {{ $lead->budget_max }}</p>

    <!-- Add your payment gateway integration here -->
    <button class="btn btn-success mt-3 mb-4">Pay Now</button>
</div>
@endsection
