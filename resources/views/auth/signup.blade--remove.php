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
                        <form action="otp.php">
                            <span class="short-title">signup
                            </span>
                            <h1>Welcome to TASK365</h1>
                            <p>Your journey starts here.</p>
                            <div class="auth-form">
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="" class="form-control" class="First Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="" class="form-control" class="Last Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Website (optional)</label>
                                    <input type="text" name="" class="form-control" placeholder="Website Address">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="text" name="" class="form-control" placeholder="Password">
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
                                <div class="form-group  mb-3 d-flex sign_chek">
                                    <!-- <input type="checkbox" id="html"> -->
                                    <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault" id="flexCheckDefault">

                                    <label>By signing up to agree with <a href="#">Terms of Service</a> and
                                        <a href="#">Privacy Policy</a></label>
                                        @error('flexCheckDefault')
        <div style="color: red;">{{ $message }}</div>
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