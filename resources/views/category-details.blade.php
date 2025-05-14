@extends('layouts.app-home')

@section('content')

@include('common.login-form')

<!-- Page Header Start !-->
<div class="page-breadcrumb-area page-bg">
    <!-- <div class="page-overlay"></div> -->
    <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 Quiz_card">
                    <div class="question">
                        <form action="">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h5 class="mb-4">1.What type of project is this?</h5>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz " for="flexRadioDefault1">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" checked="">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexRadioDefault2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexRadioDefault3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault3">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexRadioDefault4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault4">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row mt-3 mt-md-3">
                                            <div class="col-sm-4">
                                                <a href="javasceipt:void(0);"
                                                    class="theme-btn w-100 text-center d-block">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <h5 class="mb-4">2.What type of project is this?</h5>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexCheckDefault1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1" name="flexchrkboxDefault">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexCheckDefault2">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault2" name="flexchrkboxDefault">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexCheckDefault3">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault3" name="flexchrkboxDefault">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label Quiz" for="flexCheckDefault4">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault4" name="flexchrkboxDefault">
                                            Lorem ipsum dolor sit amet.
                                        </label>
                                    </div>

                                    <div class="row mt-3 mt-md-5 ">
                                        <div class="col-sm-4">
                                            <a href="javasceipt:void(0);"
                                                class="theme-btn w-100 text-center d-block Previous_btn">Previous</a>
                                        </div>
                                        <div class="col-sm-4 mt-3 mt-sm-0">
                                            <a href="javasceipt:void(0);"
                                                class="theme-btn w-100 text-center d-block">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 Quiz_card mb-4">
                    <div class="question mb-4">
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Name</label>
                                        <input type="text" name="" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="" class="form-control" placeholder="Enter Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Location</label>
                                        <input type="text" name="" class="form-control"
                                            placeholder="Enter Your Location">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Pin code</label>
                                        <input type="text" name="" class="form-control"
                                            placeholder="Enter Your Pincode">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Mobile No</label>
                                        <input type="text" name="" class="form-control"
                                            placeholder="Enter Your Mobile No">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="calendar-box position-relative form-group mb-3">
                                        <label>Date</label>
                                        <input type="text" id="dateInput" placeholder="Select a date"
                                            class="form-control">
                                        <div class="calendar" id="calendar">
                                            <div class="header">
                                                <button id="prevBtn">&lt;</button>
                                                <h2 id="monthYear">Month Year</h2>
                                                <button id="nextBtn">&gt;</button>
                                            </div>
                                            <div class="days" id="daysContainer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label>Select Category</label>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>Select Category</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <a href="javasceipt:void(0);"
                                                class="theme-btn w-100 text-center d-block Previous_btn">Previous</a>
                                        </div>
                                        <div class="col-sm-4 mt-3 mt-sm-0">
                                            <a href="javasceipt:void(0);"
                                                class="theme-btn w-100 text-center d-block">Send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Page Header End !-->


@endsection