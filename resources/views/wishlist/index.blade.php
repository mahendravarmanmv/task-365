@extends('layouts.app-home')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Wishlist</h2>

    @if($wishlists->isEmpty())
        <div class="alert alert-info">Your wishlist is empty.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($wishlists as $wishlist)
                @php
                    $lead = $wishlist->lead;
                @endphp
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="card-title">{{ $lead->website_type }}</h5>
                                    <h6 class="text-muted">Category: {{ $lead->category->category_title ?? 'N/A' }}</h6>
                                    <p class="card-text">{{ $lead->industry }}</p>
                                    <p><i class="fa-solid fa-location-dot me-2"></i>{{ $lead->location }}</p>
                                    <p class="fw-bold">₹ {{ $lead->budget_min }} - {{ $lead->budget_max }}</p>
                                    <p class="mb-1"><strong>Lead Cost:</strong> ₹ {{ $lead->lead_cost }}</p>
                                    <p class="mb-1"><strong>Stock:</strong> {{ $lead->stock }}</p>
                                    <p class="text-success mb-2"><strong>Lead ID:</strong> {{ $lead->lead_unique_id }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-outline-primary">View Lead</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-end">
                            Added on: {{ $wishlist->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
