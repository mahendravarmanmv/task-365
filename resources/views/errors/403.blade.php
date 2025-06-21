@extends('layouts.app-home')

@section('title', 'Access Denied')

@section('content')
<div class="container my-5 text-center">
    <div class="py-5 px-4 shadow rounded bg-white">
        <h1 class="display-3 fw-bold text-danger mb-3">403</h1>
        <h2 class="mb-3">Access Denied</h2>
        <p class="lead mb-4">You don't have permission to access this page or perform this action.</p>
        <a href="{{ route('home') }}" class="btn theme-btn px-4 py-2">Back to Home</a>
    </div>
</div>
@endsection
