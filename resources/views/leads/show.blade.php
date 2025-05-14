@extends('layouts.app-home')

@section('content')
<div class="container mt-4">
    <h2>{{ $lead->lead_name }}</h2>
    <p><strong>Category:</strong> {{ $lead->category->category_title }}</p>
    <p><strong>Website Type:</strong> {{ $lead->website_type }}</p>
    <p><strong>Location:</strong> {{ $lead->location }}</p>
    <p><strong>Budget:</strong> ₹ {{ $lead->budget_min }} - ₹ {{ $lead->budget_max }}</p>
    <p><strong>Timeline:</strong> {{ $lead->service_timeframe }}</p>
    <p><strong>Description:</strong> {{ $lead->lead_notes }}</p>

    <!-- Proceed to Payment Button -->
    <div class="mt-4 mb-4">
        <form action="{{ route('leads.payment', $lead->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection
