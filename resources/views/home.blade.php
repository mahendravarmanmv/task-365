@extends('layouts.app-home')

@section('content')


<!-- Slider Section Start !-->
<div class="slider-area style-2">
    <div class="slider-arrow-btn-wrapper">
        <button type="button" class="header-slider-arrow-btn prev-btn" id="trigger_header_slider_prev"><i
                class="fa-solid fa-arrow-left"></i></button>
        <button type="button" class="header-slider-arrow-btn next-btn" id="trigger_header_slider_next"><i
                class="fa-solid fa-arrow-right"></i></button>
    </div>
    <div class="slider-wrapper" id="slider-wrapper">
        <!-- single slider start -->
        <div class="single-slider-wrapper">
            <div class="single-slider " style="background-image: url('./assets/images/task-img/banner-1.jpg')">
                <div class="container h-100 align-self-center">
                    <div class="row h-100">
                        <div class="col-md-6 align-self-center order-2 order-md-1">
                            <div class="slider-content-wrapper">
                                <div class="slider-content">
                                    <span class="slider-short-title">Welcome to Task365</span>
                                    <h1 class="slider-title">For Everything and Everyone</h1>
                                    <p class="slider-short-desc">Even if your less into design and more into content
                                        strategy you may find some redeeming value with, wait for it, dummy copy.
                                    </p>
                                    <div class="slider-btn-wrapper"><a href="javasceipt:void(0);"
                                            class="style-2 me-3 active_btn">To
                                            shop</a><a href="javasceipt:void(0);" class="theme-btn style-2 ">Read
                                            More</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider end -->
        <!-- single slider start -->
        <div class="single-slider-wrapper">
            <div class="single-slider" style="background-image: url('./assets/images/task-img/banner-2.jpg')">
                <div class="container h-100 align-self-center">
                    <div class="row h-100">
                        <div class="col-md-6 align-self-center order-2 order-md-1">
                            <div class="slider-content-wrapper">
                                <div class="slider-content">
                                    <span class="slider-short-title">Welcome to Task365</span>
                                    <h1 class="slider-title">For Everything and Everyone</h1>
                                    <p class="slider-short-desc">Even if your less into design and more into content
                                        strategy you may find some redeeming value with, wait for it, dummy copy.
                                    </p>
                                    <div class="slider-btn-wrapper"><a href="javasceipt:void(0);"
                                            class="style-2 me-3 active_btn">To
                                            shop</a><a href="javasceipt:void(0);" class="theme-btn style-2 ">Read
                                            More</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider end -->
        <!-- single slider start -->
        <div class="single-slider-wrapper">
            <div class="single-slider" style="background-image: url('./assets/images/task-img/banner-3.jpg')">
                <div class="container h-100 align-self-center">
                    <div class="row h-100">
                        <div class="col-md-6 align-self-center order-2 order-md-1">
                            <div class="slider-content-wrapper">
                                <div class="slider-content">
                                    <span class="slider-short-title">Welcome to Task365</span>
                                    <h1 class="slider-title">For Everything and Everyone</h1>
                                    <p class="slider-short-desc">Even if your less into design and more into content
                                        strategy you may find some redeeming value with, wait for it, dummy copy.
                                    </p>
                                    <div class="slider-btn-wrapper"><a href="javasceipt:void(0);"
                                            class="style-2 me-3 active_btn">To
                                            shop</a><a href="javasceipt:void(0);" class="theme-btn style-2 ">Read
                                            More</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider end -->
    </div>
    <div class="container">
        <div class="slider-feature-area">
            <div class="single-feature-item style-1">
                <div class="icon"><i class="icon-heart-2"></i></div>
                <p class="desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="single-feature-item style-1">
                <div class="icon"><i class="icon-heart-2"></i></div>
                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</div>
<!-- Slider Section End !-->

@if(!$categories->isEmpty())
<div class="tour-area">
    <div class="location-area style-1">
        <div class="container">
            <div class="section-title justify-content-center text-center pb-3">
                <div class="sec-content ">
                    <span class="short-title">There are some redeeming factors
                    </span>
                    <h2 class="title">We Provide High Quality Leads</h2>
                    <img class="bottom-shape m-auto" src="./assets/images/bottom-bar.png" alt="Bottom Shape">
                    <p>A client that's unhappy for a reason is a problem, a client that's unhappy though he
                        or her
                        can't
                    </p>
                </div>
            </div>
            <div class="isotope-grid">
                <div class="row gy-4">
                    @if($categories->isEmpty())
                    
                    @else
                    @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item resort beach wow fadeInUp"
                        data-wow-delay="0s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="Categories.php" class="image-inner">
                                    <img src="{{ 'https://admin.task365.in/storage/' . $category->category_image }}"
                                        alt="{{ $category->category_title }}">
                                </a>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h3 class="content-title w-100"><a href="Categories.php">{{ $category->category_title }}</a></h3>
                                    <p class="title">{{ $category->category_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- <div class="basic-pagination">
                    <ul class="justify-content-center">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="javasceipt:void(0);">2</a></li>
                        <li><a class="page-numbers" href="javasceipt:void(0);">3</a></li>
                        <li><span class="page-numbers dots">…</span></li>
                        <li><a class="page-numbers" href="javasceipt:void(0);">5</a></li>
                        <li><a class="next page-numbers" href="javasceipt:void(0);"><i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div> -->
    </div>
</div>
@endif
<!-- Our Statistics  Start -->
<div class="video-modal-area style-1">
    <div class="container">
        <div class="section-title justify-content-center text-center pb-3">
            <div class="sec-content ">
                <span class="short-title">We are raising
                </span>
                <h2 class="title">Our Statistics
                </h2>
                <img class="bottom-shape m-auto" src="./assets/images/bottom-bar.png" alt="Bottom Shape">
                <p>How can you raise your business without proper leads
                </p>
            </div>
        </div>
        <div class="counter-area">
            <div class="single-counter wow fadeInRight" data-wow-delay="0s">
                <p class="counter-inner"><span class="counter">25</span>K+</p>
                <p class="title">New users per week</p>
            </div>
            <div class="single-counter wow fadeInRight" data-wow-delay=".4s">
                <p class="counter-inner"><span class="counter">100</span>M+</p>
                <p class="title">Monthly active user</p>
            </div>
            <div class="single-counter wow fadeInRight" data-wow-delay=".8s">
                <p class="counter-inner"><span class="counter">25</span>K+</p>
                <p class="title">New users per week</p>
            </div>
            <div class="single-counter wow fadeInRight" data-wow-delay=".9s">
                <p class="counter-inner"><span class="counter">100</span>M+</p>
                <p class="title">Monthly active user</p>
            </div>
        </div>
    </div>
</div>
<!-- Our Statistics End -->


<!-- services Process Step Area Start  -->
<div class="process-step-area style-1">
    <div class="container">
        <!-- <img class="bg-shape" src="./assets/images/task-img/shape-3.svg" alt="Shape"> -->
        <div class="section-title justify-content-center text-center pb-3">
            <div class="sec-content ">
                <span class="short-title">There are some redeeming factors
                </span>
                <h2 class="title w-100">We Provide High Quality Leads
                </h2>
                <img class="bottom-shape m-auto" src="./assets/images/bottom-bar.png" alt="Bottom Shape">
                <p>A client that's unhappy for a reason is a problem, a client that's unhappy though he or her can't

                </p>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                <div class="process-card style-1">
                    <div class="img-wrapper wow position-relative">
                        <img src="./assets/images/task-img/shape-2.svg" alt="shape">
                        <div class="dilivery_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                fill="none">
                                <g clip-path="url(#clip0)">
                                    <path d="M3.2448 12.9973H10.1354V16.5129H3.2448V12.9973Z" fill="#2E6BC6"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M43.2444 22.2769H51.3031L60 31.7494V42.5909H55.7773C55.0185 45.1388 52.6556 47.0024 49.8645 47.0024C47.0733 47.0024 44.7106 45.1388 43.9517 42.5909H30.6224C29.8635 45.1388 27.5006 47.0024 24.7096 47.0024C21.9185 47.0024 19.5557 45.1388 18.7968 42.5909H13.6511V12.9975H43.2444V22.2769ZM22.0558 40.8331C22.0558 42.2963 23.2463 43.4868 24.7096 43.4868C26.1728 43.4868 27.3633 42.2963 27.3633 40.8331C27.3633 39.3699 26.1728 38.1794 24.7096 38.1794C23.2463 38.1794 22.0558 39.3699 22.0558 40.8331ZM39.7288 39.0752V16.513H17.1667V39.0752H18.7968C19.5556 36.5273 21.9184 34.6636 24.7096 34.6636C27.5008 34.6636 29.8635 36.5273 30.6224 39.0752H39.7288ZM47.2106 40.8331C47.2106 42.2963 48.4012 43.4868 49.8644 43.4868C51.3277 43.4868 52.5182 42.2963 52.5182 40.8331C52.5182 39.3699 51.3277 38.1794 49.8644 38.1794C48.4012 38.1794 47.2106 39.3699 47.2106 40.8331ZM55.7772 39.0752H56.4844V33.1184L49.7581 25.7925H43.2443V39.0752H43.9515C44.7104 36.5273 47.0733 34.6636 49.8644 34.6636C52.6554 34.6636 55.0183 36.5273 55.7772 39.0752Z"
                                        fill="#2E6BC6"></path>
                                    <path d="M10.1354 27.0598H3.2448V30.5755H10.1354V27.0598Z" fill="#2E6BC6">
                                    </path>
                                    <path d="M0 20.0286H10.1355V23.5442H0V20.0286Z" fill="#2E6BC6"></path>
                                </g>
                                <defs>
                                    <clipPath id="svg-3551">
                                        <rect width="60" height="60" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <h4 class="title">
                            Fast Delivery</h4>
                        <p class="desc">Chances are there wasn’t collaboration and checkpoints, there wasn’t a
                            process.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="process-card style-1">
                    <div class="img-wrapper wow position-relative">
                        <img src="./assets/images/task-img/shape-2.svg" alt="shape">
                        <div class="dilivery_icon">
                            <span class="info-svg-wrapper info-icon" style="width:60px; height:60px;"><svg
                                    id="svg-7902" xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                    viewBox="0 0 60 60" fill="none">
                                    <path
                                        d="M14.1389 44.843C14.1389 45.5995 13.5093 46.2128 12.7327 46.2128C11.956 46.2128 11.3264 45.5995 11.3264 44.843C11.3264 44.0865 11.956 43.4732 12.7327 43.4732C13.5093 43.4732 14.1389 44.0865 14.1389 44.843Z"
                                        fill="#2E6BC6"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M51.9999 30.2275C52.6664 31.0648 53.0169 32.0821 52.996 33.145C52.9717 34.3776 52.4608 35.5324 51.5573 36.397C51.3811 36.5657 51.1936 36.7195 50.9968 36.858C51.6631 37.6953 52.0137 38.7127 51.9928 39.7756C51.9686 41.0081 51.4576 42.1628 50.5541 43.0273C50.3777 43.196 50.1903 43.3497 49.9936 43.4883C50.6599 44.3255 51.0105 45.343 50.9896 46.4059C50.9653 47.6384 50.4543 48.7932 49.5508 49.6576C48.646 50.5232 47.4491 51 46.1807 51H23.8418L19.752 49.4366V51H6V24.9087H19.752V26.7795H22.4914L26.7602 22.9976C29.0495 20.9694 30.3625 18.0772 30.3625 15.0629V13.7506C30.3625 12.4784 30.8996 11.2356 31.836 10.3407C32.765 9.45285 33.9838 8.97507 35.2654 9.001C36.5308 9.02456 37.7162 9.52225 38.6038 10.4025C39.4923 11.2838 39.9818 12.4497 39.9818 13.6851V21.7389H49.1231C50.4292 21.7389 51.7051 22.2622 52.624 23.1744C53.5353 24.0792 54.0237 25.2656 53.9991 26.5147C53.9749 27.7472 53.464 28.902 52.5604 29.7664C52.3842 29.9352 52.1968 30.089 51.9999 30.2275ZM8.8125 48.2603H16.9395V27.6483H8.8125V48.2603ZM39.4579 28.3692H49.1903C50.2708 28.3692 51.1666 27.5137 51.1872 26.4622C51.1971 25.9547 50.9943 25.4683 50.6162 25.0929C50.223 24.7023 49.6787 24.4784 49.1231 24.4784H37.1693V13.6851C37.1693 12.6327 36.2911 11.7602 35.2116 11.74C35.1994 11.7398 35.1872 11.7397 35.175 11.7397C34.667 11.7397 34.1821 11.9365 33.8056 12.2963C33.4048 12.6793 33.1749 13.2093 33.1749 13.7506V15.0629C33.1749 18.8471 31.5266 22.4779 28.6526 25.0242L23.5792 29.5191H19.752V46.4938L24.3739 48.2605H46.1809C47.2614 48.2605 48.1571 47.405 48.1778 46.3535C48.1877 45.8459 47.985 45.3595 47.6069 44.9841C47.2136 44.5935 46.6694 44.3696 46.1137 44.3696H39.458V41.63H47.1841C48.2646 41.63 49.1602 40.7746 49.1809 39.7231C49.1909 39.2155 48.9881 38.7291 48.61 38.3537C48.2167 37.9631 47.6725 37.7392 47.1168 37.7392H39.458V34.9996H48.1873C49.2677 34.9996 50.1634 34.1442 50.1841 33.0927C50.1941 32.5851 49.9913 32.0987 49.6131 31.7232C49.2198 31.3327 48.6757 31.1088 48.12 31.1088H39.4579V28.3692Z"
                                        fill="#2E6BC6"></path>
                                </svg></span>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <h4 class="title">
                            Best Quality</h4>
                        <p class="desc">It’s content strategy gone awry right from the start. Forswearing the use of
                            Lorem Ipsum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="process-card style-1 ">
                    <div class="img-wrapper wow position-relative">
                        <img src="./assets/images/task-img/shape-2.svg" alt="shape">
                        <div class="dilivery_icon">
                            <svg id="svg-1113" xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                viewBox="0 0 60 60" fill="none">
                                <path
                                    d="M25.6241 11.9991H44.0883C49.0022 11.9991 53 16.0315 53 20.9879C53 25.9443 49.0022 29.9767 44.0883 29.9767H39.0331V27.2581H44.0883C47.516 27.2581 50.3047 24.4453 50.3047 20.9879C50.3047 17.5306 47.516 14.7178 44.0883 14.7178H25.6241L28.6744 17.7945L26.7686 19.7168L20.4647 13.3585L26.7686 7L28.6744 8.92236L25.6241 11.9991Z"
                                    fill="#2E6BC6"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 53V23.6957H36.0528V53H7ZM24.105 26.4144H18.9478V31.1042L21.5264 30.2587L24.105 31.1042V26.4144ZM9.69531 26.4144V50.2814H33.3575V26.4144H26.8003V34.8468L21.5264 33.1174L16.2525 34.8468V26.4144H9.69531Z"
                                    fill="#2E6BC6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <h4 class="title">
                            Free Return </h4>
                        <p class="desc">True enough, but that’s not all that it takes to get things back on track
                            out there for a text.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Process Step Area End  -->



<!-- Testimonial Slider Area Start -->
<div class="testimonial-slider-area style-2">
    <div class="container">
        <div class="section-title justify-content-center text-center pb-3">
            <div class="sec-content ">
                <!-- <span class="short-title">We are raising
                    </span> -->
                <h2 class="title">Testimonials
                </h2>
                <img class="bottom-shape m-auto" src="./assets/images/bottom-bar.png" alt="Bottom Shape">
                <p>Proponents of content strategy may shun of dummy copy designers
                </p>
            </div>
        </div>
    </div>
    <div class="testimonial-marquee-wrapper">
        <div class=" brand-marquee-wrapper first-marquee-wrapper">
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-1.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Sabrina Meyla</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-2.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Darell Seward</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-1.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Sabrina Meyla</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-2.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Darell Seward</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-1.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Sabrina Meyla</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-2.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Darell Seward</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
        </div>
        <div class=" brand-marquee-wrapper second-marquee-wrapper">
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-4.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Annette Black</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-5.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Savan Nguyen</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-4.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Annette Black</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-5.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Savan Nguyen</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-3.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Camron Will</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-4.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Annette Black</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
            <!-- Single Card Start -->
            <div class="testimonial-card-two">
                <div class="user-meta-info">
                    <div class="user-info-inner">
                        <div class="img-wrapper">
                            <img src="assets/images/testiomonial-slider/user-5.png" alt="User">
                        </div>
                        <div class="content">
                            <h5 class="user-name">Savan Nguyen</h5>
                            <p class="title">Indonesian tourists</p>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="ratting-inner">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="counter">3.5</span>
                        </div>
                    </div>
                </div>
                <div class="desc-inner">
                    <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                        quia conse quuntur ma</p>
                </div>
            </div>
            <!-- Single Card End -->
        </div>
    </div>
</div>
<!-- Testimonial Slider Area End -->



<!-- -------------img-slider End---------------------- -->

<!-- ------------------------compnay logo slide start--------------------------------------- -->
<div class="video-modal-area style-1 bg-white brand_sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_logo_card">
                    <img src="./assets/images/task-img/w-accessories-brand-1.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-2.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-3.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-4.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-5.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-6.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-7.png" alt="brand" class="img-fluid">
                    <img src="./assets/images/task-img/w-accessories-brand-8.png" alt="brand" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- ------------------------compnay logo slide end--------------------------------------- -->
@endsection