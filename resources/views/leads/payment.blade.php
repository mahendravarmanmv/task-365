@extends('layouts.app-home')

@section('content')
<div class="container my-5">
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">

                    <!-- Title -->
                    <h4 class="fw-bold text-center text-primary mb-4" style="color: #033796 !important;">
                        <i class="bi bi-currency-rupee"></i> Proceeding to Payment
                    </h4>

                    <!-- Lead Summary -->
                    <div class="bg-light rounded-3 p-4 mb-4 border border-1 border-secondary-subtle">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-muted small">Lead ID</div>
                                <div class="fw-bold text-success">{{ $lead->lead_unique_id }}</div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-muted small">Lead Name</div>
                                <div class="fw-semibold">{{ $lead->lead_name }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted small">Lead Cost</div>
                                @php
                                use App\Helpers\CustomHelper;
                                @endphp
                                <div class="fw-bold text-danger">₹ {{ CustomHelper::formatIndianCurrency($lead->lead_cost) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <form method="POST" action="{{ route('cashfree.payment') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="amount" value="{{ $lead->lead_cost }}">
                        <input type="hidden" name="lead_id" value="{{ $lead->id }}">

                        <!-- Buttons -->
                        <div class="d-flex justify-content-center gap-4 mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm">
                                ← Back
                            </a>
                            <button type="submit" class="btn rounded-pill text-white px-4 py-2 shadow-sm" style="background-color: #033796;">
                                Pay Now
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
