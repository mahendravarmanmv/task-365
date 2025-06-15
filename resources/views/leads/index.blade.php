@extends('layouts.app-home')

@section('content')
<!-- Include required meta tags for JS -->
<meta name="wishlist-toggle-url" content="{{ route('wishlist.toggle') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('assets/css/leads.css') }}" />
<div class="procuct_sec page-breadcrumb-area page-bg py-5 mb-3">
    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center mb-5">
                <input type="text" id="globalSearch" class="form-control me-3" placeholder="Search leads..." style="max-width: 300px;">
                <div class="srot-by">
                    <div class="option-item">
                        <select class="form-select" id="inlineFormSelectPref">
                            <option value="">-- Select Filter -- </option>
                            <option value="1">Sort by Date</option>
                            <option value="2">Budget range(high to low)</option>
                            <option value="3">Budget range(low to high)</option>
                            <option value="4">In stock</option>
                            <option value="5">Out of stock</option>
                            <option value="6">Wishlist</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 👈 NEW: Visible Leads Count -->
            <div class="col-12 mb-3">
                <h6 id="leadsCount" class="text-muted">Total Leads: {{ count($leads) }}</h6>
            </div>

            @forelse($leads as $lead)
            <div class="col-md-12  mb-4 ">
                <div class="procuct_card" data-date="{{ $lead->created_at->timestamp }}">
                    <!--<img src="./assets/images/user/user.png" alt="user" class="user_img">-->
                    <div class="product_body">
                        <div class="user_info">
                            <div class="product_title">
                                <div>
                                    <strong>Category : {{ $lead->category->category_title }}</strong>
                                    <h6>{{ $lead->website_type }}</h6>
                                    <p>{{ $lead->industry }}</p>
                                    <p>
                                        <i class="fa-solid fa-location-dot me-2"></i>{{ strtoupper($lead->location) }}
                                    </p>
                                    <p class="mt-1 mb-0"><strong>Budget Range:</strong> ₹ {{ $lead->budget_min }} - {{ $lead->budget_max }}</p>
                                </div>
                                <div class="d-flex align-items-start procut_btn">
                                    <div class="d-flex flex-column">

                                        @if(in_array($lead->id, $purchasedLeadIds))
                                        <a href="#" class="btn btn-secondary disabled">{{ $lead->button_text }}</a>
                                        @elseif($lead->stock == 0 || $lead->stock < 1)
                                            <a href="#" class="btn btn-secondary disabled">{{ $lead->button_text }}</a>
                                            @else
                                            <a href="{{ route('leads.show', $lead->id) }}" class="theme-btn py-2">{{ $lead->button_text }}</a>
                                            @endif

                                            <h6 class="mt-1">Lead Cost: ₹ {{ $lead->lead_cost }}</h6>

                                            <p class="mt-2 mb-0">
                                                @if($lead->stock != 0)
                                                <strong>Stock:</strong>
                                                @endif
                                                @if($lead->stock == 0)
                                                <span class="text-danger"><strong>Out of stock</strong></span>
                                                @else
                                                {{ $lead->stock }}
                                                @endif
                                            </p>
                                            <!-- ✅ Unique Lead ID below stock -->
                                            <p class="mt-2 mb-0 text-success"><strong>Lead ID:</strong> {{ $lead->lead_unique_id }}</p>
                                    </div>
                                    <span class="fav ms-3 mt-1" data-lead-id="{{ $lead->id }}">
                                        <i class="fa-solid fa-heart {{ in_array($lead->id, $wishlistedIds) ? 'text-danger' : 'text-white' }}"></i>
                                    </span>
                                    <p class="wishlist-msg mt-1 text-success small d-none">Wishlist added</p>
                                </div>

                            </div>
                            <p class="pt-2"> {{ $lead->lead_notes }}</p>
                            <p class="pt-2"> {{ $lead->service_timeframe }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>No leads found for your categories.</p>
            @endforelse


            @if(count($leads)>0)
            <!-- No Results Message for Global Search -->
            <p id="noResultsMessage" class="d-none">No leads match your search.</p>
            @endif
        </div>

    </div>
</div>
@endsection

@section('jquery_scripts')
<script src="{{ asset('assets/js/validations/leads.js') }}?v={{ now()->timestamp }}"></script>
@endsection