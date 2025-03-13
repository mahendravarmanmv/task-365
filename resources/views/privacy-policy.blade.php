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
                    <h5 class="menu-sidebar-title">Privacy policy</h5>
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

@include('common.login-form')

<!-- Page Header Start !-->
<div class="page-breadcrumb-area page-bg">
    <!-- <div class="page-overlay"></div> -->
    <div class="container">
        <div class="row mb-md-5 mb-3">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <div class="page-heading">
                        <h3 class="page-title">Privacy policy</h3>
                    </div>                   
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Page Header End !-->


@endsection