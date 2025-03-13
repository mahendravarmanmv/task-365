@extends('layouts.app-register')

@section('content')

<div class="container-fluid p-0 h-100">
    <div class="row g-0 align-items-center h-100">
        <div class="col-md-6">
            <div class="travel-auth-img">
                <img src="./assets/images/task-img/leads.jpg" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-center align-items-center">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col-lg-7">
                        <div class="auth-details">

                            <h1>Forgot Password?</h1>
                            <p>Please enter your registered Email. We’ll send you password reset OTP.</p>
                            <div class="auth-form">
                                <div class="form-group mb-3">
                                    <label>Enter Email</label>
                                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="theme-btn w-100 text-center d-block">Submit</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection