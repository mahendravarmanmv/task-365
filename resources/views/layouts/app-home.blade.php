<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>Task 365</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/task-img/Task-365-Logo.png') }}" />

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
    <!-- Google tag (gtag.js) --> 
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-T37WSTDEWP"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-T37WSTDEWP'); </script>
     <script type="text/javascript">     (function(c,l,a,r,i,t,y){         c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};         t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;         y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);     })(window, document, "clarity", "script", "rzv4tc8p76"); </script>
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
                                    @if (auth()->check())
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                    @if (auth()->guest())
                                    <li><a href="{{ route('signup') }}">Signup</a></li>
                                    @endif
                                </ul>

                            </div>
                            <nav id="main-menu" class="main-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>

                                    @if (auth()->check())
                                    <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                                        <a href="{{ route('profile') }}">My Profile</a>
                                    </li>
                                    @endif

                                    @if (auth()->check())
                                    <li class="{{ request()->is('leads*') ? 'active' : '' }}">
                                        <a href="{{ route('leads.index') }}">Leads</a>
                                    </li>
                                    @endif
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>

                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>                       
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
                    <a href="index.php"><img src="{{ asset('assets/images/task-img/Task-365-Logo.png') }}" alt="logo" /></a>
                </div>
                <div class="mobile-nav-menu"></div>
                <div class="menu-sidebar-content">
                    <div class="menu-sidebar-single-widget">
                        <h5 class="menu-sidebar-title">Contact Info</h5>
                        <div class="header-contact-info">
                            <span><i class="fa-solid fa-location-dot"></i>Flat No. 07/3, Second Floor, 18th Main Jaya Nagar, 9th Block Banglore, Bangalore, Karnataka - 560041 India</span>
                            <span><a href="mailto:hello@transico.com"><i
                                        class="fa-solid fa-envelope"></i>task365.in@gmail.com</a> </span>
                            <span><a href="tel:+919989926633"><i class="fa-solid fa-phone"></i>+91 9989926633</a></span>
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
    @yield('content')

    <!--- Start Footer !-->
    <footer class="footer bg-light-black">
        <div class="footer-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-3 col-lg-3 col-md-6 col-sm-12 pe-md-5">
                        <div class="footer-widget footer-widget-info">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/task-img/Task-365-Logo.png') }}" alt="Footer Logo"
                                        class="img-fluid" style="width: 120px;" /></a>
                            </div>
                            <div class="footer-widget-contact">
                                <div class="footer-contact align-items-start">                                    
                                    <div class="contact-text w-100">
                                    <p style="justify-content: center;">At Task365, we are a results-driven digital marketing company specializing in lead generation across a wide range of business categories. Our mission is to streamline the customer acquisition process for business owners by delivering ready-to-convert leads, thereby eliminating the hassle and high costs typically associated with traditional digital marketing efforts.</p>    
                                    <p>Flat No. 07/3, Second Floor, 18th Main Jaya
                                            Nagar, 9th
                                            Block Banglore, Bangalore, Karnataka - 560041 India</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                        <div class="footer-widget-menu-wrapper ps-0">
                            <div class="footer-widget widget_nav_menu">
                                <h2 class="footer-widget-title">Useful Links</h2>
                                <ul class="menu footer_link">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>                                    
                                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                                    <li><a href="{{ route('refund-policy') }}">Refund Policy</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="footer-widget-menu-wrapper ps-0">
        <div class="footer-widget widget_nav_menu">
            <h2 class="footer-widget-title">Categories</h2>
            <div class="d-flex">
                @php
                    $chunks = $footerCategories->chunk(ceil($footerCategories->count() / 2));
                @endphp

                @foreach($chunks as $chunk)
                    <ul class="menu br-right footer_link {{ !$loop->last ? 'pe-5' : '' }}">
                        @foreach($chunk as $category)
                            <li>
                                <a href="{{ route('leads.index', ['category' => $category->id]) }}">
                                    {{ $category->category_title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
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
                                        <div class="contact-text"><a href="tel:+919989926633">+91 9989926633</a></div>
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
									<p> © {{ date('Y') }} Task365. A company of Lorhan Spot Earn Pvt. Ltd. All rights reserved</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-bottom-menu">
                                    <ul>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                                        <li><a href="{{ route('terms') }}">Terms & conditions</a></li>
                                        <li><a href="{{ route('refund-policy') }}">Refund Policy</a></li>
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
    @yield('jquery_scripts')
</body>
</html>