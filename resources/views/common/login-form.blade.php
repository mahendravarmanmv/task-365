<!-- =================================================================side bar form ================================================================================ -->
<!-- ----------------login form ------------------------------/ -->
<div class="offcanvas offcanvas-end sidebar_canvas" tabindex="-1" id="offcanvaslogin"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Login</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid p-0 h-100">
            <div class="row g-0 align-items-center h-100">
                <div class="12">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <div class="auth-details login_box">
                                <h1>Welcome to TASK365</h1>
                                <p>Your journey starts here.</p>
                                <div class="auth-form">
                                    <div class="form-group mb-3">
                                        <label>Phone Or Email</label>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Password</label>
                                        <input type="text" name="" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-end mb-3">
                                        <a href="{{ route('forgot-password') }}">Forget
                                            Password?</a>
                                    </div>
                                    <div class=" form-group mb-3">
                                        <a href="{{ route('login') }}" class="theme-btn w-100 text-center d-block">Sign
                                            In</a>
                                    </div>
                                    <div class="form-group text-center">
                                        <p>Don’t have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>