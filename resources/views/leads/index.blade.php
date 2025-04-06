@extends('layouts.app-home')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/leads.css') }}" />
<div class="procuct_sec page-breadcrumb-area page-bg py-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center mb-5">
                <button class="btn filter_btn me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img
                        src="./assets/images/task-img/filter.svg" alt="filter" class="me-2">
                    Filter
                </button>
                <div class="srot-by">
                    <div class="option-item">
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected>Sort:by Relevance</option>
                            <option value="1">Price(high to Low)</option>
                            <option value="2">Price( Low to high)</option>
                            <option value="3">Rating</option>
                            <option value="3">Discount</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">FILTER</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="sidefilter">
                            <div class="filter">
                                <div class="category">
                                    <div class="accordion" id="category">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#item-1"
                                                    aria-expanded="true" aria-controls="item-1">
                                                    Category
                                                </button>
                                            </h2>
                                            <div id="item-1" class="accordion-collapse collapse "
                                                aria-labelledby="headingOne" data-bs-parent="#category">
                                                <div class="accordion-body">
                                                    <form class="my-2" role="search">
                                                        <input class="form-control me-2" type="search"
                                                            placeholder="Search" aria-label="Search">
                                                    </form>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Anlog watch
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Dress or Duppta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Bike Cover
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Women Jacet
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Bedsheet
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            shofa and bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gender">
                                    <div class="accordion" id="gender">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#item-2"
                                                    aria-expanded="true" aria-controls="item-2">
                                                    Gender
                                                </button>
                                            </h2>
                                            <div id="item-2" class="accordion-collapse collapse "
                                                aria-labelledby="headingOne" data-bs-parent="#gender">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Men
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Women
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            boys
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Girls
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gender">
                                    <div class="accordion" id="prices">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#item-22"
                                                    aria-expanded="true" aria-controls="item-22">
                                                    Budget
                                                </button>
                                            </h2>
                                            <div id="item-22" class="accordion-collapse collapse "
                                                aria-labelledby="headingOne" data-bs-parent="#prices">
                                                <div class="accordion-body">
                                                    <div class="price-input">
                                                        <div class="field">
                                                            <span>Min</span>
                                                            <input type="number" class="input-min" value="2500">
                                                        </div>
                                                        <div class="separator">-</div>
                                                        <div class="field">
                                                            <span>Max</span>
                                                            <input type="number" class="input-max" value="7500">
                                                        </div>
                                                    </div>
                                                    <div class="slider">
                                                        <div class="progress"></div>
                                                    </div>
                                                    <div class="range-input">
                                                        <input type="range" class="range-min" min="0" max="10000"
                                                            value="2500" step="100">
                                                        <input type="range" class="range-max" min="0" max="10000"
                                                            value="7500" step="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="size">
                                <div class="accordion" id="size">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#item-3" aria-expanded="true"
                                                aria-controls="item-3">
                                                Size
                                            </button>
                                        </h2>
                                        <div id="item-3" class="accordion-collapse collapse "
                                            aria-labelledby="headingOne" data-bs-parent="#size">
                                            <div class="accordion-body">
                                                <form class="my-2" role="search">
                                                    <input class="form-control me-2" type="search"
                                                        placeholder="Search" aria-label="Search">
                                                </form>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        0-2 Years
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        1.5 meters
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        10-16 years
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        15 to 35 years
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="Color">
                                <div class="accordion" id="color">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#item-5" aria-expanded="true"
                                                aria-controls="item-5">
                                                Color
                                            </button>
                                        </h2>
                                        <div id="item-5" class="accordion-collapse collapse "
                                            aria-labelledby="headingOne" data-bs-parent="#color">
                                            <div class="accordion-body">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Red
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Green
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Blue
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Black
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="delivery">
                                <div class="accordion" id="brand">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#item-7" aria-expanded="true"
                                                aria-controls="item-7">
                                                Delivery Type
                                            </button>
                                        </h2>
                                        <div id="item-7" class="accordion-collapse collapse "
                                            aria-labelledby="headingOne" data-bs-parent="#delivery">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        All
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Free
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Paid
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <select class="form-select" aria-label="Default select example">
                                <option selected> Loaction</option>
                                <option value="1">USA</option>
                                <option value="2">India</option>
                                <option value="3">Japan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @forelse($leads as $lead)
            <div class="col-md-12  mb-4 ">
                <div class="procuct_card">
                    <img src="./assets/images/user/user.png" alt="user" class="user_img">
                    <div class="product_body">
                        <div class="user_info">
                            <div class="product_title">
                                <div>
                                    <h6>salman</h6>
                                    <p>Mobile App Devloper</p>
                                    <p>
                                        <i class="fa-solid fa-location-dot me-2"></i>20, Bordeshi, New York, USA
                                    </p>
                                    <h6 class="mt-1">$ 253560</h6>
                                </div>
                                <div class="d-flex align-items-center procut_btn">
                                    <button class="theme-btn py-2" type="submit">Buy Now</button>
                                    <span class="fav ms-3"><i class="fa-solid fa-heart"></i></span>
                                </div>
                            </div>
                            <p class="pt-2"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe tenetur
                                dignissimos, vero
                                aut eveniet magni doloremque. Quasi, aliquid sed deserunt accusamus corporis
                                voluptates,
                                nisi veniam quos laborum accusantium sint, voluptate nam aut quisquam consequuntur
                                earum
                                blanditiis quia placeat soluta doloribus?</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
        <p>No leads found for your categories.</p>
    @endforelse
            

        </div>

    </div>
</div>
@endsection