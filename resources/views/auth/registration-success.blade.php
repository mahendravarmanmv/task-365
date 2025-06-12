@extends('layouts.app-home')

@section('content')


@php
    if (!session('registration_success')) {
        header("Location: " . route('home'));
        exit;
    }
@endphp
<!-- Success Section Start -->
<div class="page-breadcrumb-area page-bg">
    <div class="container text-center py-5">
        <div class="alert shadow-lg p-4 rounded" style="max-width: 700px; margin: 0 auto;">
            <h2 class="mb-3"><i class="fa fa-check-circle text-success"></i> Registration Successful!</h2>
            <p class="lead">
                {{ session('message') }}
            </p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Home</a>
        </div>
    </div>
</div>
<!-- Success Section End -->

@endsection
