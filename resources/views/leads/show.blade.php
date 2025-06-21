@extends('layouts.app-home')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/leads/show.css') }}" />
<div class="container py-0">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="lead-section">
                <!-- Lead ID -->
                <div class="text-center mb-4">
                    <span class="badge bg-light text-success fs-6">
                        Lead ID: {{ $lead->lead_unique_id }}
                    </span>
                </div>
                <!-- Header Section -->
                <div class="lead-header d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                    <div class="text-center text-md-start mb-2 mb-md-0">
                        <strong>Lead Name:</strong> {{ $lead->lead_name }}
                    </div>
                    <div class="text-center text-md-end">
                        <strong>Category:</strong> {{ $lead->category->category_title }}
                    </div>
                </div>



                <!-- Details Two-Column Grid -->
                <div class="row mb-4">
                    <div class="col-sm-6 mb-3 text-center text-md-start">
                        <div class="info-label">Website Type</div>
                        <div class="info-value">{{ $lead->website_type_name ?? 'N/A' }}</div>
                    </div>
                    <div class="col-sm-6 mb-3 text-center text-md-end">
                        <div class="info-label">Location</div>
                        <div class="info-value">{{ $lead->location }}</div>
                    </div>
                    <div class="col-sm-6 mb-3 text-center text-md-start">
                        <div class="info-label">Budget Range</div>
                        <div class="info-value">₹{{ $lead->budget_min }} - ₹{{ $lead->budget_max }}</div>
                    </div>
                    <div class="col-sm-6 mb-3 text-center text-md-end">
                        <div class="info-label">Lead Cost</div>
                        @php
                        use App\Helpers\CustomHelper;
                        @endphp
                        <div class="info-value text-danger">₹{{ CustomHelper::formatIndianCurrency($lead->lead_cost) }}</div>
                    </div>
                    <div class="col-sm-6 mb-3 text-center text-md-start">
                        <div class="info-label">Timeline</div>
                        <div class="info-value">{{ $lead->service_timeframe }}</div>
                    </div>
                    <div class="col-sm-6 mb-3 text-center text-md-end">
                        <div class="info-label">Stock</div>
                        <div class="info-value">{{ $lead->stock }}</div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-4 text-center text-md-start">
                    <div class="info-label">Description</div>
                    <div class="info-value">{{ $lead->lead_notes }}</div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-md-row justify-content-between border-top pt-4 gap-3 text-center text-md-start">
                    <a href="{{ route('leads.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill w-100 w-md-auto">
                        ← Back to Leads
                    </a>

                    <form action="{{ route('leads.payment', $lead->id) }}" method="GET" class="w-100 w-md-auto text-center text-md-end">
                        @csrf
                        <button type="submit" class="btn custom-payment-btn btn-sm rounded-pill w-100 w-md-auto">
                            Proceed to Payment →
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection