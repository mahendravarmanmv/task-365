@extends('layouts.app-home')

@section('content')
<!-- Meta Tags and CSS (Required for Wishlist Toggle) -->
<link rel="stylesheet" href="{{ asset('assets/css/leads.css') }}" />

<div class="container py-1">
    <h4 class="mb-3 text-center">My Profile</h4>

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


        <!-- 🟨 Wishlist Tab -->
        <div class="tab-pane fade pb-5" id="wishlist" role="tabpanel">
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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4 shadow-sm mb-5 rounded-3 border-0">
                            <h5 class="mb-4 border-bottom pb-2 fw-bold text-dark">My Information</h5>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light text-dark fw-bold w-25 text-start">Name</th>
                                            <td class="text-start">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark fw-bold text-start">Email</th>
                                            <td class="text-start">{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark fw-bold text-start">Phone</th>
                                            <td class="text-start">{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark fw-bold text-start">Company</th>
                                            <td class="text-start">{{ $user->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark fw-bold text-start">Website</th>
                                            <td class="text-start">{{ $user->website }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6 class="mb-3 fw-bold text-dark">Assigned Categories</h6>
                            @if($categoryList->isEmpty())
                            <p class="text-muted mb-3">No categories assigned.</p>
                            @else
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach($categoryList as $category)
                                <span class="badge bg-secondary text-light px-3 py-2 rounded-pill">{{ $category }}</span>
                                @endforeach
                            </div>
                            @endif

                            <a href="{{ route('change.password.form') }}" class="btn btn-sm btn-outline-primary mt-2">
                                <i class="fa fa-key me-1"></i> Update Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection