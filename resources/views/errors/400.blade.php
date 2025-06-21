@extends('layouts.app-home')

@section('title', 'Bad Request')

@section('content')
<div class="container my-5 text-center">
    <div class="py-5 px-4 shadow rounded bg-white">
        <h1 class="display-3 fw-bold text-warning mb-3">400</h1>
        <h2 class="mb-3">Bad Request</h2>
        <p class="lead mb-4">The request could not be understood or was missing required parameters.</p>
        <a href="{{ route('home') }}" class="btn theme-btn px-4 py-2">Back to Home</a>
    </div>
</div>
@endsection
