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
                    <h5 class="menu-sidebar-title">Contact Info</h5>
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
                        <h3 class="page-title">Contact Us</h3>
                    </div>
                    <div class="breadcrumb-list">
                        <ul>
                            <li><a href="javasceipt:void(0);">Home</a></li>
                            <li class="active"><a href="javasceipt:void(0);">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-page-wrapper mb-md-4 mb-3">
            <div class=" row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-page-item-inner text-center">
                        <div class="item-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="item-text headline pera-content">
                            <h3>Address:</h3>
                            <p>Flat No. 07/3, Second Floor, 18th Main Jaya Nagar,
                                9th Block Banglore, Bangalore, Karnataka - 560041 India</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-page-item-inner text-center">
                        <div class="item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="item-text headline pera-content">
                            <h3>Mail Address:</h3>
                            <p>itask365.in@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-page-item-inner text-center">
                        <div class="item-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="item-text headline pera-content">
                            <h3>Phone:</h3>
                            <p>1-888-452-1505</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End !-->


<!-- Contact Form Section Start -->
<div class="contact-section">
    <!-- Submit form Start -->
    <div class="container">
        <div class=" row gy-5 justify-content-center">

            <div class="col-lg-7">
                <!-- Comment Form Start -->
                <div class="comment-respond">
                    <form action="#" method="post" class="comment-form">
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="contacts-name">
                                    <label for="author">Your Name</label>
                                    <input name="author" id="author" type="text" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-email">
                                    <label for="email">Your Email</label>
                                    <input name="email" id="email" type="text" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-phone">
                                    <label for="phone">Phone Number</label>
                                    <input name="phone" id="phone" type="text" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-subject">
                                    <label for="subject">Company</label>
                                    <input name="subject" id="subject" type="text" placeholder="Enter">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contacts-message">
                                    <label for="comment">Your Message</label>
                                    <textarea name="comment" id="comment" cols="20" rows="3"
                                        placeholder="Enter Your  Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="theme-btn" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>
        </div>
    </div>
    <!-- Submit form End -->
</div>
<!-- Contact Form Section End -->
@endsection