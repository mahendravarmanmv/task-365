@extends('layouts.app-home')

@section('content')
<style>
    .custom-lead-title {
        color: #033796;
    }

    .custom-payment-btn {
        background-color: #033796;
        color: white;
        border: none;
    }

    .custom-payment-btn:hover {
        background-color: #022e6b;
    }
</style>
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Lead Card -->
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-1">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold custom-lead-title">{{ $lead->lead_name }}</h4>
                        <p class="text-muted mb-0">{{ $lead->category->category_title }}</p>
                    </div>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <strong>Website Type:</strong>
                            <span class="float-end">{{ $lead->website_type ?: 'N/A' }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Location:</strong>
                            <span class="float-end">{{ $lead->location }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Client Budget Range:</strong>
                            <span class="float-end">₹{{ $lead->budget_min }} - ₹{{ $lead->budget_max }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Lead Cost:</strong>
                            <span class="float-end">₹{{ $lead->lead_cost }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Timeline:</strong>
                            <span class="float-end">{{ $lead->service_timeframe }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Description:</strong>
                            <p class="mt-2">{{ $lead->lead_notes }}</p>
                        </li>
                    </ul>

                    <!-- Proceed to Payment -->
                    <!-- Proceed to Payment -->
                    <!-- Action Buttons Row -->
                    <div class="d-flex justify-content-between p-4 mt-4 mb-2 border rounded-4 shadow-sm">

                        <!-- Back to Leads Button -->
                        <a href="{{ route('leads.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                            ← Back to Leads
                        </a>

                        <!-- Proceed to Payment Button -->
                        <form action="{{ route('leads.payment', $lead->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn custom-payment-btn btn-sm rounded-pill">
                                Proceed to Payment →
                            </button>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection