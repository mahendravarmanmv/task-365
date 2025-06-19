@extends('layouts.app-home')

@section('content')
<div class="container mt-5">
    <!-- Card Layout -->
	@if(session('error'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
    <div class="card shadow rounded-4">
        <div class="card-body p-4 p-md-5">

            <!-- Heading -->
            <h4 class="fw-bold text-center text-primary mb-4" style="color: #033796 !important;">
                <i class="bi bi-currency-rupee"></i> Proceeding to Payment
            </h4>

            <!-- Lead Details -->
            <div class="bg-light rounded-3 p-3 mb-4">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <strong>Lead ID:</strong><br>
                        <span class="text-success"><strong>{{ $lead->lead_unique_id }}</strong></span>
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Lead Name:</strong><br>
                        <span class="text-muted">{{ $lead->lead_name }}</span>
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Lead Cost:</strong><br>
                        <span class="text-danger fw-semibold">₹ {{ $lead->lead_cost }}</span>
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

                <div class="d-grid mt-4">
                    <button type="submit" class="btn rounded-pill text-white" style="background-color: #033796;">
                        Pay Now
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
