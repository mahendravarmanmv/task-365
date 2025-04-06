@extends('layouts.app-register')

@section('content')
<div class="container">
    <div class="alert alert-success">
        @if(session('message'))
        <p>{{ session('message') }}</p>
        @endif
    </div>
    <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
</div>
@endsection