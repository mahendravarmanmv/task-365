@extends('layouts.app-home')

@section('content')
<!-- Meta Tags and CSS (Required for Wishlist Toggle) -->
<link rel="stylesheet" href="{{ asset('assets/css/leads.css') }}" />

<div class="container py-1">
    <h3 class="mb-3 text-center">My Profile</h3>

    <!-- Bootstrap Tabs -->
    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="leads-tab" data-bs-toggle="tab" data-bs-target="#leads" type="button">My Leads</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="wishlist-tab" data-bs-toggle="tab" data-bs-target="#wishlist" type="button">Wishlist</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">My Info</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="profileTabsContent">

        <!-- 🟦 My Leads Tab -->
        <div class="tab-pane fade show active" id="leads" role="tabpanel">
            @if($leads->isEmpty())
                <div class="alert alert-info">You haven't purchased any leads yet.</div>
            @else
                @foreach($leads as $lead)
                    <div class="col-md-12 mb-4" style="display: block;">
                        <div class="procuct_card" data-date="{{ strtotime($lead->created_at) }}">
                            <div class="product_body">
                                <div class="user_info">
                                    <div class="product_title">
                                        <div>
                                            <p><strong>Category :</strong> {{ $lead->category->category_title ?? 'N/A' }}</p>
                                            <p class="my-2"><strong>Website type :</strong> <span style="font-weight: normal;">{{ $lead->website_type }}</span></p>
                                            <p><i class="fa-solid fa-location-dot me-2"></i>{{ $lead->location }}</p>
                                            <p class="mt-1 mb-0"><strong>Budget Range:</strong> ₹ {{ $lead->budget_min }} - {{ $lead->budget_max }}</p>
                                            <p class="mt-1 mb-0"><strong>Lead Cost:</strong> ₹ {{ $lead->lead_cost }}</p>
                                            <p class="mt-2 mb-0">
                                                <strong>Stock:</strong>
                                                @if($lead->stock < 1)
                                                    <span class="text-danger">Out of stock</span>
                                                @else
                                                    {{ $lead->stock }}
                                                @endif
                                            </p>
                                            <p class="mt-2 mb-0 text-success"><strong>Lead ID:</strong> {{ $lead->lead_unique_id }}</p>
                                        </div>
                                    </div>
                                    <p class="pt-2">{{ $lead->lead_notes }}</p>
                                    <p class="pt-2">{{ $lead->service_timeframe }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- 🟨 Wishlist Tab -->
        <div class="tab-pane fade" id="wishlist" role="tabpanel">
            @if($wishlist->isEmpty())
                <div class="alert alert-info">Your wishlist is empty.</div>
            @else
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($wishlist as $wishlistItem)
                        @php $lead = $wishlistItem->lead; @endphp
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <p class="text-success mb-2"><strong>Lead ID:</strong> {{ $lead->lead_unique_id }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-outline-primary">View Lead</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted text-end">
                                    Added on: {{ $wishlistItem->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- 🟩 My Info Tab -->
        <div class="tab-pane fade" id="info" role="tabpanel">
            <div class="card p-3 shadow-sm mb-5 pb-4"> <!-- Added spacing classes here -->
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                <p><strong>Company:</strong> {{ $user->company_name }}</p>
                <p><strong>Website:</strong> {{ $user->website }}</p>

                <hr>

                <h6>Assigned Categories</h6>
                @if($categoryList->isEmpty())
                    <p class="text-muted">No categories assigned.</p>
                @else
                    <ul class="list-group mb-3">
                        @foreach($categoryList as $category)
                            <li class="list-group-item">{{ $category }}</li>
                        @endforeach
                    </ul>
                @endif

                <a href="{{ route('change.password.form') }}" class="btn btn-outline-primary">Update Password</a>
            </div>
        </div>

    </div>
</div>
@endsection
