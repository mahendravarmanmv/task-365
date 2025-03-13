@extends('layouts.app-register')

@section('content')

<div class="container-fluid p-0 h-100">
    <div class="row g-0 align-items-center h-100">
        <div class="col-md-6">
            <div class="travel-auth-img">
                <img src="./assets/images/task-img/leads.jpg" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 auth-details">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <span class="short-title">signup
                        </span>
                        <h1>Welcome to TASK365</h1>
                        <p>Your journey starts here.</p>
                        <div class="auth-form">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" autofocus class="form-control">
                                @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                                @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Company name (optional)</label>
                                <input type="text" name="company_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Website (optional)</label>
                                <input type="text" name="" class="form-control" placeholder="Website Address">
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                                @error('phone')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Whats App Number</label>
                                <input type="text" name="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Category </label>
                                <select class="form-select">
                                    <option>Select Option</option>
                                    <option>Option one</option>
                                    <option>Option Two</option>
                                    <option>Option Three</option>

                                </select>
                            </div>
                            <div class="form-group mb-3 ">
                                <label>Upload Identify Proof (Business)</label>
                                <span class="upload-file form-control">
                                    <label class="w-100 m-0">
                                        <input type="file" name="" class="">
                                        <span><i class="fa-solid fa-arrow-up-from-bracket pe-2"></i>Upload</span>
                                    </label>
                                </span>
                            </div>
                            <div class="form-group mb-3 ">
                                <label>Upload Identify Proof (PAN/Adhar)</label>
                                <span class="upload-file form-control">
                                    <label class="w-100 m-0">
                                        <input type="file" name="" class="">
                                        <span><i class="fa-solid fa-arrow-up-from-bracket pe-2"></i>Upload</span>
                                    </label>
                                </span>
                            </div>
                            <div class="form-group mb-3 d-flex flex-column sign_chek">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" name="agree_terms" id="agree_terms">
                                    <label for="agree_terms">By signing up, you agree to the <a href="#">Terms of Service</a> and
                                        <a href="#">Privacy Policy</a>.
                                    </label>
                                </div>

                                <!-- Error Message for Checkbox -->
                                @error('agree_terms')
                                <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="theme-btn w-100 text-center d-block">Sign Up</button>
                                <!-- <a href="otp.php" class="theme-btn w-100 text-center d-block" type>Sign Up</a> -->
                            </div>
                            <div class="form-group text-center">
                                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection