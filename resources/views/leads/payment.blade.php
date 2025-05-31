@extends('layouts.app-home')

@section('content')
<div class="container mt-5">

    <!-- Card Layout -->
    <div class="card shadow rounded-4">
        <div class="card-body p-5">

            <!-- Heading -->
            <h3 class="fw-bold text-center text-primary mb-4" style="color: #033796 !important;">
                Proceeding to Payment
            </h3>

            <!-- Lead Details -->
            <div class="mb-4">
                <p class="mb-2">
                    <strong>Lead:</strong> <span class="text-muted">{{ $lead->lead_name }}</span>
                </p>
                <p>
                    <strong>Amount:</strong>
                    <span class="text-muted">₹ {{ $lead->lead_cost }}</span>
                </p>
            </div>

            <!-- Payment Form -->
            <form method="POST" action="{{ route('cashfree.payment') }}">
                @csrf
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
				<input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
				<input type="hidden" name="name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="amount" value="{{ $lead->lead_cost }}">

                <div class="d-grid">
                    <button type="submit" class="btn btn-lg rounded-pill text-white" style="background-color: #033796;">
                        Pay Now
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
