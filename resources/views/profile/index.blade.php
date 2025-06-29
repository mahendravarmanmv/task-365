@extends('layouts.app-home')

@section('content')
<!-- Meta Tags and CSS (Required for Wishlist Toggle) -->
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}?v=0.1" />
<div class="container py-1">
    <h4 class="mb-3 text-center">My Profile</h4>

    <!-- Bootstrap Tabs -->
    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="leads-tab" data-bs-toggle="tab" data-bs-target="#leads" type="button">Order History</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="myleads-tab" data-bs-toggle="tab" data-bs-target="#myleads" type="button">My Leads</button>
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
        <div class="tab-pane fade show active pb-5" id="leads" role="tabpanel">
            @if($payments->isEmpty())
            <div class="alert alert-info">You haven't purchased any leads yet.</div>
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Lead ID</th>
                            <th>Order ID</th>
                            <th>Paid Amount</th>
                            <th>Date of Purchase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td class="text-success fw-bold">{{ $payment->lead->lead_unique_id ?? 'N/A' }}</td>
                            <td>{{ $payment->order_id }}</td>
                            <td>₹ {{ number_format($payment->amount) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

        <!-- 🟨 My Leads Tab -->
        <div class="tab-pane fade pb-5" id="myleads" role="tabpanel">
            @if($payments->isEmpty())
            <div class="alert alert-info">No leads assigned to your account yet.</div>
            @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($payments as $payment)
                @php $lead = $payment->lead; @endphp
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="text-primary fw-semibold mb-2">
                                <i class="fas fa-receipt me-1"></i> Order ID: {{ $payment->order_id }}
                            </h6>

                            <ul class="list-unstyled mb-2 small">
                                <li><strong>Lead ID:</strong> {{ $lead->lead_unique_id ?? 'N/A' }}</li>
                                <li><strong>Amount:</strong> ₹ {{ number_format($payment->amount) }}</li>
                                <li><strong>Purchase Date:</strong> {{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y') }}</li>
                            </ul>

                            <a href="{{ route('leads.viewlead', $lead->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> View Lead
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>



        <!-- 🟨 Wishlist Tab -->
        <div class="tab-pane fade pb-5" id="wishlist" role="tabpanel">
            @if($wishlist->isEmpty())
            <div class="alert">Your wishlist is empty.</div>
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
                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-outline-primary">Buy Lead</a>
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
            <div class="container py-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="card border-0 shadow rounded-4 overflow-hidden">
                            <div class="card-header text-white py-2">
                                <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i> My Information</h5>
                            </div>

                            <div class="card-body">
                                <!-- User Info Table -->
                                <div class="table-responsive mb-2">
                                    <table class="table table-hover align-middle">
                                        <tbody>
                                            <tr>
                                                <th class="text-muted text-start align-middle"><span class="d-inline-flex align-items-center gap-2"><i class="fas fa-user me-1 text-primary"></i> Name</span></th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted text-start align-middle"><span class="d-inline-flex align-items-center gap-2"><i class="fas fa-envelope me-1 text-primary"></i> Email</span></th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted text-start align-middle"><span class="d-inline-flex align-items-center gap-2"><i class="fas fa-phone-alt me-1 text-primary"></i> Phone</span></th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted text-start align-middle"><span class="d-inline-flex align-items-center gap-2"><i class="fas fa-building me-1 text-primary"></i> Company</span></th>
                                                <td>{{ $user->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted text-start align-middle"><span class="d-inline-flex align-items-center gap-2"><i class="fas fa-globe me-1 text-primary"></i> Website</span></th>
                                                <td>{{ $user->website }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Categories -->
                                <h6 class="fw-semibold text-dark mb-3"><i class="fas fa-tags me-2 text-primary"></i> Assigned Categories</h6>

                                @if($categoryList->isEmpty())
                                <p class="text-muted">No categories assigned.</p>
                                @else
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($categoryList as $category)
                                    <span class="badge rounded-pill text-white px-3 py-2"
                                        style="background: linear-gradient(135deg,rgb(254, 110, 54), #0056b3); box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                        <i class="fas fa-check-circle me-1"></i> {{ $category }}
                                    </span>
                                    @endforeach
                                </div>
                                @endif


                                <!-- Password Update -->
                                <div class="text-end mt-2">
                                    <a href="{{ route('change.password.form') }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-key me-1"></i> Update Password
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection