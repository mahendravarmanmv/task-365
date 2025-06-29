@extends('layouts.app-home')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/leads/view.css') }}" />

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-header text-white rounded-top-4">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Lead Details</h5>
                </div>

                <div class="card-body px-4 py-4">
                    <dl class="row mb-0">
                        <dt class="col-5 text-muted">Lead ID</dt>
                        <dd class="col-7 text-success fw-bold">{{ $lead->lead_unique_id }}</dd>

                        <dt class="col-5 text-muted">Category</dt>
                        <dd class="col-7">{{ $lead->category->category_title }}</dd>

                        <dt class="col-5 text-muted">Website Type</dt>
                        <dd class="col-7">{{ $lead->website_type_name }}</dd>

                        <dt class="col-5 text-muted">Location</dt>
                        <dd class="col-7 text-uppercase">{{ $lead->location }}</dd>

                        <dt class="col-5 text-muted">Budget Range</dt>
                        <dd class="col-7">₹ {{ $lead->budget_min }} – ₹ {{ $lead->budget_max }}</dd>

                        <dt class="col-5 text-muted">Lead Cost</dt>
                        <dd class="col-7">₹ {{ \App\Helpers\CustomHelper::formatIndianCurrency($lead->lead_cost) }}</dd>

                        <dt class="col-5 text-muted">Service Timeframe</dt>
                        <dd class="col-7">{{ $lead->service_timeframe }}</dd>

                        <dt class="col-5 text-muted">Lead Notes</dt>
                        <dd class="col-7">{{ $lead->lead_notes }}</dd>

                        <dt class="col-5 text-muted">Stock</dt>
                        <dd class="col-7">
                            @if($lead->stock == 0)
                                <span class="badge bg-danger">Out of Stock</span>
                            @else
                                <span class="badge bg-success">{{ $lead->stock }}</span>
                            @endif
                        </dd>
                    </dl>

                    <div class="text-end mt-4">
    <a href="{{ url()->previous() }}" class="theme-btn btn-sm">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
