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
                    <div class="col-lg-7">
                        <div class="auth-details">
                            <span class="short-title">Login
                            </span>
                            <h1>Welcome to TASK365</h1>
                            <p>Your journey starts here.</p>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="auth-form">
                                <div class="form-group mb-3">
                                    <label>Phone Or Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                                    @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group text-end mb-3">
                                    <a href="{{ route('forgot-password') }}">Forget
                                        Password?</a>
                                </div>
                                <div class=" form-group mb-3">                                   
                                        <button type="submit" class="btn theme-btn w-100 text-center d-block">Sign
                                        In</button>
                                </div>
                                <div class="form-group text-center">
                                    <p>Don’t have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection