@extends('layouts.app-register')

@section('content')

<div class="container-fluid p-0 h-100">
    <a href="{{ route('home') }}" class="position-absolute top-0 end-0 m-4 text-decoration-none fw-bold">
        ← Back to Home
    </a>
    <div class="row g-0 align-items-center h-100">
        <div class="col-md-6">
            <div class="travel-auth-img">
                <img src="./assets/images/task-img/leads.jpg" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="auth-details">
                        <h1>Forgot Password?</h1>
                        <p>Please enter your registered Email. We’ll send you password reset OTP.</p>

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form id="forgot-password-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="auth-form">
                                <div class="form-group mb-3">
                                    <label>Enter Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="theme-btn w-100 text-center d-block">Submit</button>
                                </div>
                            </div>
                        </form>

                        <!-- Optional: Link to Home (below the form) -->
                        <div class="text-center mt-2">
                            <a href="{{ route('login') }}" class="text-secondary">← Back to Login</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery Validation -->
@section('jquery_scripts')
<script src="{{ asset('assets/js/validations/forgot-password.js') }}"></script>
@endsection
