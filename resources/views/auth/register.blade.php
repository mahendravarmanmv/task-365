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
                    <form method="POST" action="{{ route('signup') }}" enctype="multipart/form-data">
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
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                                @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Company name (optional)</label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Website (optional)</label>
                                <input type="text" name="website" class="form-control" value="{{ old('website') }}" placeholder="Website Address">
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
                                <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" class="form-control">
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

<script>
    function updateFileName(input, displayId) {
        const fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
        document.getElementById(displayId).textContent = fileName;
    }
</script>

@endsection