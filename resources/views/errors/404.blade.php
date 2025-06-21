@extends('layouts.app-home')

@section('title', 'Page Not Found')

@section('content')
<div class="container my-5 text-center">
    <div class="py-5 px-4 shadow rounded bg-white">
        <h1 class="display-3 fw-bold text-danger mb-3">404</h1>
        <h2 class="mb-3">Category Not Found</h2>
        <p class="lead mb-4">Sorry, the category you are looking for doesn’t exist or might have been removed.</p>
        <a href="{{ route('home') }}" class="btn theme-btn px-4 py-2">Back to Home</a>
    </div>
</div>
@endsection
