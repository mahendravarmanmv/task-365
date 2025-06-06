@extends('layouts.app-register')

@section('content')
<script id="otpless-sdk" src="https://otpless.com/v4/headless.js" data-appid="{{ config('otp.app_id') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid p-0 h-100">
    <div class="row g-0 align-items-center h-100">
        <div class="col-md-6">
            <div class="travel-auth-img">
                <img src="{{ asset('assets/images/task-img/leads.jpg') }}" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 auth-details">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <form method="POST" action="{{ route('signup') }}" enctype="multipart/form-data">
                        @csrf
                        <span class="short-title">signup
                        </span>
                        <h1>Welcome to TASK365</h1>
                        <p>Your journey starts here.</p>
                        <div class="auth-form">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" autofocus class="form-control">
                                @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" class="form-control">
                                    <button type="button" class="btn btn-outline-primary" id="send-otp-btn" onclick="sendemailOtp()">Send OTP</button>
                                </div>
                                @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="email-otp-section" style="display: none;">
                                <label>Enter OTP</label>
                                <div class="input-group">
                                    <input type="text" id="email-otp-input" name="email-otp-input" placeholder="Enter OTP" class="form-control">
                                    <button type="button" class="btn btn-outline-primary" id="verify-email-otp-btn" onclick="emailverifyOtp()">Verify OTP</button>
                                </div>
                                <div class="text-danger mt-1" id="email-status-message"></div>
                            </div>

                            <!-- Hidden input for Laravel validation -->
                            <input type="hidden" name="email_otp_verified" id="email_otp_verified" value="0">
                            @error('email_otp_verified')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password">
                                @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Company name (optional)</label>
                                <input type="text" name="company_name" placeholder="Enter Company name" value="{{ old('company_name') }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Website (optional)</label>
                                <input type="text" name="website" class="form-control" value="{{ old('website') }}" placeholder="Enter Website Address">
                            </div>
                            <div class="form-group mb-3">
                                <label>Mobile</label>
                                <div class="input-group">
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Mobile Number" class="form-control">
                                    <button type="button" class="btn btn-outline-primary" id="send-otp-btn" onclick="phoneAuth()">Send OTP</button>
                                </div>
                                @error('phone')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="otp-section" style="display: none;">
                                <label>Enter OTP</label>
                                <div class="input-group">
                                    <input type="text" id="otp-input" name="otp-input" placeholder="Enter OTP" class="form-control">
                                    <button type="button" class="btn btn-outline-primary" onclick="verifyOTP()">Verify OTP</button>
                                </div>
                                <div class="text-danger mt-1" id="status-message"></div>
                            </div>
                            <input type="hidden" name="otp_verified" id="otp_verified" value="0">
                            @error('otp_verified')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            <div class="form-group mb-3">
                                <label>Whats App Number</label>
                                <input type="text" name="whatsapp_number" placeholder="Enter WhatsApp Number" value="{{ old('whatsapp_number') }}" class="form-control">
                                @error('whatsapp_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Category</label>
                                <select name="category[]" class="form-select" multiple>
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, (array) old('category', [])) ? 'selected' : '' }}>
                                        {{ $category->category_title }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Upload Identify Proof (Business)</label>
                                <span class="upload-file form-control">
                                    <label class="w-100 m-0">
                                        <input type="file" id="business_proof" name="business_proof" class="" onchange="updateFileName(this, 'business_proof_name')">
                                        <span><i class="fa-solid fa-arrow-up-from-bracket pe-2"></i>Upload</span>
                                    </label>
                                    <span id="business_proof_name" class="file-name"></span> <!-- This will show the file name -->
                                </span>
                            </div>

                            <div class="form-group mb-3">
                                <label>Upload Identify Proof (PAN/Adhar)</label>
                                <span class="upload-file form-control">
                                    <label class="w-100 m-0">
                                        <input type="file" id="identity_proof" name="identity_proof" class="" onchange="updateFileName(this, 'identity_proof_name')">
                                        <span><i class="fa-solid fa-arrow-up-from-bracket pe-2"></i>Upload</span>
                                    </label>
                                    <span id="identity_proof_name" class="file-name"></span> <!-- This will show the file name -->
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

<script src="{{ asset('assets/js/signup.js') }}"></script>

@endsection