@extends('layouts.app-home')

@section('title', 'Page Not Found')

@section('content')
<div class="container my-5 text-center">
    <div class="py-5 px-4 shadow rounded bg-white">
        <h1 class="display-3 fw-bold text-danger mb-3">404</h1>
        <h2 class="mb-3">Page Not Found</h2>
        <p class="lead mb-4">Sorry, the page you are looking for doesn’t exist or might have been removed.</p>
		<a href="{{ route('leads.index') }}" class="btn theme-btn px-4 py-2">View My Leads</a>
    </div>
</div>
@endsection
