@extends('layouts.app-home')

@section('content')

@include('common.login-form')

<!-- Page Header Start -->
<div class="page-breadcrumb-area page-bg">
    <div class="container">
        <div class="row mb-md-5 mb-3">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <div class="page-heading">
                        <h3 class="page-title">Contact Us</h3>
                    </div>
                    <div class="breadcrumb-list">
                        <ul>
                            <li><a href="javascript:void(0);">Home</a></li>
                            <li class="active"><a href="javascript:void(0);">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Combined Layout Start -->
        <div class="contact-section my-4">
            <div class="container">
                <div class="row">
                    <!-- Contact Form: Mobile First (order-0), Desktop Second (order-md-2) -->
                    <div class="col-12 order-0 order-md-2 mb-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <div class="comment-respond">
                                    <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-xl-6">
                                                <label for="author">Your Name</label>
                                                <input name="author" id="author" type="text" placeholder="Enter your name">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="email">Your Email</label>
                                                <input name="email" id="email" type="email" placeholder="Enter your email">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="phone">Phone Number</label>
                                                <input name="phone" id="phone" type="text" placeholder="Phone number">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="subject">Company</label>
                                                <input name="subject" id="subject" type="text" placeholder="Enter company">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="comment">Your Message</label>
                                                <textarea name="comment" id="comment" rows="4" placeholder="Enter your message"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="theme-btn" type="submit">Submit Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info: Mobile Second (order-1), Desktop First (order-md-1) -->
                    <div class="col-12 order-1 order-md-1">
                        <div class="row contact-page-wrapper">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="contact-page-item-inner text-center">
                                    <div class="item-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="item-text headline pera-content">
                                        <h3>Address:</h3>
                                        <p>Flat No. 07/3, Second Floor, 18th Main Jaya Nagar, 9th Block, Bangalore, Karnataka - 560041 India</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="contact-page-item-inner text-center">
                                    <div class="item-icon"><i class="fas fa-envelope"></i></div>
                                    <div class="item-text headline pera-content">
                                        <h3>Mail Address:</h3>
                                        <p>task365.in@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="contact-page-item-inner text-center">
                                    <div class="item-icon"><i class="fas fa-phone"></i></div>
                                    <div class="item-text headline pera-content">
                                        <h3>Phone:</h3>
                                        <p>+91 8790399660</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        <!-- Combined Layout End -->

    </div> <!-- container -->
</div> <!-- page-breadcrumb-area -->

@endsection

@section('jquery_scripts')
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/validations/contact-us.js') }}"></script>
<script>
    $(document).ready(function () {
        @if(session('success'))
        $('html, body').animate({
            scrollTop: 500 // scroll 500px from the top
        }, 600);
        @endif
    });
</script>
@endsection
