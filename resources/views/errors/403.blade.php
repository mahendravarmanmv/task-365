@extends('layouts.app-home')

@section('title', 'Access Denied')

@section('content')
<div class="container my-5 text-center">
    <div class="py-5 px-4 shadow rounded bg-white">
        <h1 class="display-3 fw-bold text-danger mb-3">OOPS!</h1>
        <h2 class="mb-3">This lead isn’t part of your leads.</h2>
       
        <a href="{{ route('leads.index') }}" class="btn theme-btn px-4 py-2">View My Leads</a>
    </div>
</div>
@endsection
