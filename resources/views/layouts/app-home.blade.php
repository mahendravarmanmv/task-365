<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">


    <title>Task 365</title>
    <link rel="icon" type="image/png" href="assets/images/task-img/Task-365-Logo.png" />

<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Fasthand&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
</head>

<body>

    <!-- Header Start !-->
<header class="header-area">
    <!-- Header Nav Menu Start -->
    <div class="header-menu-area sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-6 d-flex align-items-center">
                    <div class="logo">
                         <a href="{{ route('home') }}" class="standard-logo"><img src="{{ asset('assets/images/task-img/Task-365-Logo.png') }}"
                                alt="logo" /></a>
                        <a href="{{ route('home') }}" class="sticky-logo"><img src="{{ asset('assets/images/task-img/Task-365-Logo.png') }}"
                                alt="logo" /></a>
                        <a href="{{ route('home') }}" class="retina-logo"><img src="{{ asset('assets/images/task-img/Task-365-Logo.png') }}"
                                alt="logo" /></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-6 col-6 d-flex align-items-center justify-content-end">
                    <div class="menu d-inline-block">
                        <div class="topbar d-flex">
                            <ul>
                                <li class="position-relative"><a href="javasceipt:void(0);" class="search-btn"><i
                                            class="fa-solid fa-magnifying-glass"></i></a><span></span></li>
                                <li><a href="javasceipt:void(0);"><i class="fa-solid fa-cart-plus"></i></a></li>
								<!--<li><a href="javasceipt:void(0);" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvaslogin" aria-controls="offcanvasRight">Login</a></li>-->
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>

                        </div>
                        <nav id="main-menu" class="main-menu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <!-- <li><a href="javasceipt:void(0);">More</a></li> -->
                                <li class="dropdown"><a href="javasceipt:void(0);" class="profile-link">More</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                        <li><a href="{{ route('faq') }}">FAQs</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Button Start !-->
                    <!-- <div class="header-btn">
                            <div class="search-btn-wrapper">
                                    <a href="javasceipt:void(0);" class="search-btn">
                                        <i class="icon-search"></i>
                                    </a>
                            </div>
                            <a href="javasceipt:void(0);" class="user-login-btn">
                                <i class="icon-user"></i>
                            </a>
                        </div> -->
                    <!-- Header Button Start !-->
                    <!-- Mobile Menu Toggle Button Start !-->
                    <div class="mobile-menu-bar d-lg-none text-end">
                        <a href="javasceipt:void(0);" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
                    </div>
                    <!-- Mobile Menu Toggle Button End !-->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Nav Menu End -->
</header>
<!-- Header End !-->

@yield('content')



     <!--- Start Footer !-->
 <footer class="footer bg-light-black">
     <div class="footer-sec">
         <div class="container">
             <div class="row">
                 <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 pe-md-5">
                     <div class="footer-widget footer-widget-info">
                         <div class="footer-logo">
                             <a href="index.html"><img src="assets/images/task-img/Task-365-Logo.png" alt="Footer Logo"
                                     class="img-fluid" style="width: 120px;" /></a>
                         </div>
                         <div class="footer-widget-contact">
                             <div class="footer-contact align-items-start">
                                 <!-- <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div> -->
                                 <div class="contact-text w-100"><span>Flat No. 07/3, Second Floor, 18th Main Jaya
                                         Nagar, 9th
                                         Block Banglore, Bangalore, Karnataka - 560041 India</span></div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                     <div class="footer-widget-menu-wrapper ps-0">
                         <div class="footer-widget widget_nav_menu">
                             <h2 class="footer-widget-title">Useful Links</h2>
                             <ul class="menu footer_link">
                                 <li><a href="{{ route('home') }}">Home</a></li>
                                 <li><a href="{{ route('about') }}">About Us</a></li>
                                 <li><a href="{{ route('faq') }}">FAQs</a></li>
                                 <li><a href="{{ route('blog') }}">Blog</a></li>
                                 <li><a href="{{ route('shipping') }}">Shipping</a></li>
                                 <li><a href="javasceipt:void(0);">Track Order</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="footer-widget-menu-wrapper ps-0">
                         <div class="footer-widget widget_nav_menu">
                             <h2 class="footer-widget-title">Categories
                             </h2>
                             <div class="d-flex">
                                 <ul class="menu br-right footer_link pe-5">
                                     <li><a href="javasceipt:void(0);">Mobile Software Developers</a></li>
                                     <li><a href="javasceipt:void(0);">Astrology</a></li>
                                     <li><a href="javasceipt:void(0);">Software Developers</a></li>
                                     <li><a href="javasceipt:void(0);">Web Developers</a></li>
                                     <li><a href="javasceipt:void(0);">Auditing Services</a></li>
                                     <li><a href="javasceipt:void(0);">Commercial Interior Designers</a></li>
                                     <li><a href="javasceipt:void(0);">Commercial Photographers</a></li>

                                 </ul>
                                 <ul class="menu br-right footer_link">
                                     <li><a href="javasceipt:void(0);">E-Commerce professionals</a></li>
                                     <li><a href="javasceipt:void(0);">Logo Designers</a></li>
                                     <li><a href="javasceipt:void(0);">Packers and Movers</a></li>
                                     <li><a href="javasceipt:void(0);">Portrait Photographers</a></li>
                                     <li><a href="javasceipt:void(0);">Residential Interior Designers</a></li>
                                     <li><a href="javasceipt:void(0);">Travel Agents</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                     <div class="footer-widget-menu-wrapper ps-0">
                         <div class="footer-widget widget_nav_menu">
                             <h2 class="footer-widget-title">Recent Posts
                             </h2>
                             <ul class="menu">
                                 <li class="read_more_content"><a href="javasceipt:void(0);">Exploring Atlanta’s modern
                                         homes</a>
                                     <p class="mb-1">September 9, 2022</p>
                                     <a href="javasceipt:void(0);" class="read_more">Read More »</a>
                                 </li>
                                 <li class="read_more_content"><a href="javasceipt:void(0);">Green interior design
                                         inspiration</a>
                                     <p class="mb-1">September 9, 2022</p>
                                     <a href="javasceipt:void(0);" class="read_more">Read More »</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="divider"></div>
                 <div class="row">
                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 ">
                         <div class="footer-widget">
                             <h2 class="footer-widget-title">Contact</h2>
                             <div class="footer-widget-contact">
                                 <div class="footer-contact">
                                     <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                                     <div class="contact-text"><a href="tel:+012-345-6789">012-345-6789</a></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 ">
                         <div class="footer-widget">
                             <h2 class="footer-widget-title">Email us</h2>
                             <div class="footer-widget-contact">
                                 <div class="footer-contact">
                                     <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
                                     <div class="contact-text"><a href="mailto:info@gmail.com">task365.in@gmail.com</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div
                         class="col-xxl-5 col-xl-5 col-lg-5 col-md-6  d-flex  justify-content-lg-end align-items-lg-end">
                         <div class="footer-widget">
                             <h2 class="footer-widget-title">Follow us</h2>
                             <div class="footer-widget-social">
                                 <div class="social-profile">
                                     <a href="javasceipt:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                     <a href="javasceipt:void(0);"><i class="fa-brands fa-youtube"></i></a>
                                     <a href="javasceipt:void(0);"><i class="fa-brands fa-twitter"></i></a>
                                     <a href="javasceipt:void(0);"><i class="fa-brands fa-linkedin-in"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="footer-bottom-area">
             <div class="container">
                 <div class="footer-bottom-wrapper">
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="copyright-text">
                                 <p> © Copyright Task 365 Pvt Ltd 2023</a></p>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="footer-bottom-menu">
                                 <ul>
                                     <li><a href="javasceipt:void(0);">Contact</a></li>
                                     <li><a href="javasceipt:void(0);">Privacy policy</a></li>
                                     <li><a href="javasceipt:void(0);">Terms & conditions</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
 </footer>
 <!--- End Footer !-->


 <!-- Header Search Bar Modal Start -->
 <div class="search-form-wrapper">
     <div class="search-form-inner">
         <div class="search-content-filed">
             <form role="search" method="get" class="search-form" action="#">
                 <input type="hidden" name="post_type" value="post" />
                 <div class="search-form-input">
                     <div class="search-icon">
                         <i class="icon-search"></i>
                     </div>
                     <input type="search" placeholder="Search" />
                     <button class="theme-btn" type="submit" title="Search" aria-label="Search">Search</button>
                 </div>
             </form>
             <span class="search-close">
                 <i class="fa-light fa-xmark"></i>
             </span>
         </div>
     </div>
 </div>
 <!-- Header Search Bar Modal End -->

 <!-- Scroll Up Section Start -->
 <div id="scrollTop" class="scrollup-wrapper">
     <div class="scrollup-btn">
         <i class="fa-solid fa-arrow-up"></i>
     </div>
 </div>
 <!-- Scroll Up Section End -->


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/inview.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/tilt.jquery.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.imagesloaded.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>