@extends('layouts.app-home')

@section('content')

<!-- Menu Sidebar Section Start -->
<div class="menu-sidebar-area">
    <div class="menu-sidebar-wrapper">
        <div class="menu-sidebar-close">
            <button class="menu-sidebar-close-btn" id="menu_sidebar_close_btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="menu-sidebar-content">
            <div class="menu-sidebar-logo">
                <a href="index.php"><img src="assets/images/task-img/Task-365-Logo.png" alt="logo" /></a>
            </div>
            <div class="mobile-nav-menu"></div>
            <div class="menu-sidebar-content">
                <div class="menu-sidebar-single-widget">
                    <h5 class="menu-sidebar-title">Shipping</h5>
                    <div class="header-contact-info">
                        <span><i class="fa-solid fa-location-dot"></i>20, Bordeshi, New York, US</span>
                        <span><a href="mailto:hello@transico.com"><i
                                    class="fa-solid fa-envelope"></i>task365.in@gmail.com</a> </span>
                        <span><a href="tel:+123-456-7890"><i class="fa-solid fa-phone"></i>+123-456-7890</a></span>
                    </div>
                    <div class="social-profile">
                        <a href="javasceipt:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="javasceipt:void(0);"><i class="fa-brands fa-twitter"></i></a>
                        <a href="javasceipt:void(0);"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="javasceipt:void(0);"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Menu Sidebar Section Start -->
<div class="body-overlay"></div>



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
                                        <a href="forget-otp.php">Forget
                                            Password?</a>
                                    </div>
                                    <div class=" form-group mb-3">
                                        <a href="javasceipt:void(0);" class="theme-btn w-100 text-center d-block">Sign
                                            In</a>
                                    </div>
                                    <div class="form-group text-center">
                                        <p>Don’t have an account? <a href="signup.php">Sign Up</a></p>
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

<!-- Page Header Start !-->
<div class="page-breadcrumb-area page-bg">
    <!-- <div class="page-overlay"></div> -->
    <div class="container">
        <div class="row mb-md-5 mb-3">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <div class="page-heading">
                        <h3 class="page-title">Shipping</h3>
                    </div>                   
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Page Header End !-->


@endsection