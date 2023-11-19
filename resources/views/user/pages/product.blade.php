<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    @yield("before_css")
    @include("user.layouts.head")
    @yield("after_css")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<style>

    .credit-card {
        display: block;
        cursor: pointer;

    }

    .payment-content_vanh {
        display: none;
    }

    .payment-content_vanh.active {
        display: block;
    }

    .vanh_select {
        display: none;
    }



</style>

<body onload="initialize()">
@include("user.layouts.hearder")

<!-- content begin -->
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/6.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Vehicle Fleet</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <section id="section-car-details">
        <div class="container">
            <div class="row g-5" >
                <div class="col-lg-6">
                    <div id="slider-carousel" class="owl-carousel">
                        <div class="item">
                            <img class=" z-index: 10;" src="{{$product->thumbnail}}" alt="">
                        </div>
                        <div class="item">
                            <img src="images/misc/car-2.png" alt="">
                        </div>
                        <div class="item">
                            <img src="images/cars-alt/mini-cooper.png" alt="">
                        </div>
                        <div class="item">
                            <img src="images/cars-alt/bmw-m5.png" alt="">
                        </div>
                    </div>
                    {{--                    giấy tờ thuê xe--}}
                    <div class="giay_to_xe">
                        <div class="giay_to_xe-div1">
                            <span class="car_rental_paper">Car rental documents
                                <svg style="margin-bottom: 7px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.08984 9.00008C9.32495 8.33175 9.789 7.76819 10.3998 7.40921C11.0106 7.05024 11.7287 6.91902 12.427 7.03879C13.1253 7.15857 13.7587 7.52161 14.2149 8.06361C14.6712 8.60561 14.9209 9.2916 14.9198 10.0001C14.9198 12.0001 11.9198 13.0001 11.9198 13.0001" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 17H12.01" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                            <div class="paper_passport">
                                <span style="margin-bottom: 15px">
                                    <img style="width: 25px; margin-right: 15px" loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/papers/gplx_cccd.png">
                                    Driver's license and citizen identification card with chip.
                                </span>
                                <span>
                                    <img style="width: 25px; margin-right: 15px" loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/papers/gplx_passport.png">
                                    Passport.
                                </span>
                            </div>
                        </div>
                        {{--                        heading 2--}}
                        <div style="margin-top: 50px" >
                            <span class="car_rental_paper" >Collateral
                                <svg style="margin-bottom: 7px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.08984 9.00008C9.32495 8.33175 9.789 7.76819 10.3998 7.40921C11.0106 7.05024 11.7287 6.91902 12.427 7.03879C13.1253 7.15857 13.7587 7.52161 14.2149 8.06361C14.6712 8.60561 14.9209 9.2916 14.9198 10.0001C14.9198 12.0001 11.9198 13.0001 11.9198 13.0001" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 17H12.01" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </span>
                            <div class="paper_passport">
                                <span style="color: black">${{$product->deposit}} (cash/transfer to vehicle owner upon receipt) or Motorcycle (with original driver's license) worth ${{$product->deposit}}</span>
                            </div>
                        </div>


                        <div style="margin-top: 50px">
                            <span class="car_rental_paper">Rules</span>
                            <div>
                                <ul>
                                    <li>Use the vehicle for its intended purpose.</li>
                                    <li>Do not use the rental car for illegal or unlawful purposes.</li>
                                    <li>Do not use a rented car to pledge or mortgage.</li>
                                    <li>Do not smoke, chew gum, or litter in the car.</li>
                                    <li>Do not carry prohibited goods that are flammable or explosive.</li>
                                    <li>Do not carry fruits or strong-smelling foods in the vehicle.</li>
                                    <li> When returning the vehicle, if the vehicle is dirty or there is an odor in the vehicle, please clean the vehicle or pay an additional fee for vehicle cleaning.</li>
                                    Sincerely thank you, wish you have wonderful trips!
                                </ul>

                            </div>
                        </div>


                        {{--                        map--}}
                        <div style="margin-top: 30px">
                            <span class="car_rental_paper" >Vehicle location</span>
                            <iframe style="margin-top: 10px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096949073247!2d105.77971427479608!3d21.028806487777867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b32b842a37%3A0xe91a56573e7f9a11!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1696752723180!5m2!1sen!2s" width="600" height="370" style="border:0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        {{--                        end map--}}
                    </div>
                </div>


                {{--                end--}}
                <div class="col-lg-3">
                    <form>
{{--                    <form  action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">--}}

                        <h3>{{$product->name}}</h3>
                        <p>{{$product->description}}</p>
                        <div class="spacer-10"></div>

                        <h4>Specifications</h4>
                        <div class="de-spec">
                            <div class="d-row">
                                <span class="d-title">Body</span>
                                <spam class="d-value">Sedan</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Seat</span>
                                <spam class="d-value">{{$product -> seat}} seats</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Door</span>
                                <spam class="d-value">{{$product -> door}} doors</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Luggage</span>
                                <spam class="d-value">190</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Fuel Type</span>
                                <spam class="d-value">{{$product -> fuel_style}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Engine</span>
                                <spam class="d-value">3200</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Year</span>
                                <spam class="d-value">{{$product -> car_year}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Mileage</span>
                                <spam class="d-value">{{$product -> mileage}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Transmission</span>
                                <spam class="d-value">Automatic</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Drive</span>
                                <spam class="d-value">4WD</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Fuel Economy</span>
                                <spam class="d-value">18.5</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Exterior Color</span>
                                <spam class="d-value">{{$product -> color}} Metalic</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Interior Color</span>
                                <spam class="d-value">{{$product -> color}}</spam>
                            </div>

                        </div>

                        <div class="spacer-single"></div>

                        <h4>Features</h4>
                        <ul class="ul-style-2">
                            <li>Bluetooth</li>
                            <li>Multimedia Player</li>
                            <li>Central Lock</li>
                            <li>Sunroof</li>
                        </ul>
                    </form>
                </div>

{{--                ////////////////////////////////////////--}}

                <div class="col-lg-3">

                    <div style="margin-top: 20px">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    Price of day
                                    <h3 style="font-size: 50px;margin-bottom: 20px;letter-spacing: -.5px;" id="product_price" name="product_price">
                                        ${{$product->price}}</h3>
                                </div>
                                <div class="flip-card-back" >
                                    Price of hour
                                    <h3 style="font-size: 60px;margin-bottom: 20px;letter-spacing: -.5px;">
                                        ${{$product->hourly_price}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <div style="text-align: center; margin-bottom: 20px">
                                <h4>Deposit</h4>
                                <span style="font-size: 30px;margin-bottom: 20px">${{$product->deposit}}</span>
                            </div>
                            <h4 style="text-align: center">Booking this car</h4>
                            <div class="spacer-20"></div>
                            <form>
                                <div class="checkout__input">
                                    <p>Pick Up Date & Time<span>*</span></p>
                                    <div class="date-time-field" style="display: flex">
                                        <input  type="date" id="start_date" name="start_date" style="height: 35px;padding: 0 6px;border: 0.1px solid  #999999; border-radius: 4px" required onchange="checkDate()">
                                        <input  type="time" id="start_time" name="start_time"  style="padding: 0 6px; width: 110px;  border: 0.1px solid  #999999; border-left: none; border-radius: 4px" required>

                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Return Date & Time<span>*</span></p>
                                    <div class="date-time-field" style="display: flex">
                                        <input  type="date" id="end_date" name="end_date" style="height: 35px;padding: 0 6px;border: 0.1px solid  #999999; border-radius: 4px" required>
                                        <input  type="time" id="end_time" name="end_time" style="padding: 0 6px; width: 110px;  border: 0.1px solid  #999999; border-left: none; border-radius: 4px" required>

                                    </div>
                                    <p id="invalid_date_message" style="color: red; margin-top: 5px; display: none;">Please reselect the date!</p>
                                </div>
                                <div class="checkout__input" style="display: flex; margin: 20px 0 10px 0;">
                                    <p style="margin-bottom: 0">Rental Period:</p>
                                    <input  style="width: 50px; height: 30px; border: none; margin-left: 30px" type="text" id="buy_qty" name="buy_qty" value="1" ><span id="unit"></span>
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger" style="background-color: white; color: red;padding: 0;">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <button type="button" class="btn-main btn-fullwidth" onclick="openModal()">RENT NOW</button>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="de-box" >
                            <h4>Share</h4>
                            <div class="de-color-icons">
                                <span><i class="fa-brands fa-twitter"></i></span>
                                <span><i class="fa-brands fa-facebook-f"></i></span>
                                <span><i class="fa-brands fa-reddit"></i></span>
                                <span><i class="fa-brands fa-linkedin-in"></i></span>
                                <span><i class="fa-brands fa-pinterest"></i></span>
                                <span><i class="fa-brands fa-stumbleupon"></i></span>
                                <span><i class="fa-brands fa-delicious"></i></span>
                                <span><i class="fa-solid fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>

{{--////////////////////////////--}}
{{--                    ?modal--}}
                    <div id="myModal" class="modal_vanh">
                        <div class="modal-content_vanh">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h3 style="text-align: center">Vehicle details</h3>
                            <div style="display: flex;">
                                <div style="display: grid; margin-top: 40px">
                                    <div>
                                        <form action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">
                                        <img src="{{$product->thumbnail}}" style="width: 350px" class="img-fluid" alt="">
                                        <h4 style="margin-top: 15px; display: flex">{{$product->name}}</h4>
                                        </form>
                                    </div>
                                    <div class="d-atr-group">
                                        <h5>Specifications</h5>
                                        <ul class="d-atr" style="display: flex; gap: 100px">
                                            <div>
                                                <li><span>Seats:</span>{{ $product->seat }}</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>{{ $product->door }}</li>
                                                <li><span>Fuel:</span>{{$product->fuel_style}}</li>
                                            </div>
                                            <div>
                                                <li><span>Horsepower:</span>{{$product->power}}</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Year:</span>{{$product->car_year}}</li>
                                                <li><span>Mileage:</span>{{$product->mileage}}</li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>


                                <div  style="margin-top: 40px; margin-left: 100px; width: 280px">
                                    <h3 style="text-align: center;">Booking this car</h3>
                                    <div class="spacer-20"></div>

                                    <form id="myForm" action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">
                                        <div class="checkout__input">
                                            <p>Pick Up Date & Time<span>*</span></p>
                                            <div class="date-time-field" style="display: flex; gap: 2px">
                                                <input  type="date" id="displayStartDate" name="start_date" style="height: 35px;padding: 0 6px;border: 0.1px solid  #999999; border-radius: 4px"  onchange="checkDate()" readonly>
                                                <input  type="time" id="displayStartTime" name="start_time"  style="height: 35px;padding: 0 6px; width: 160px;  border: 0.1px solid  #999999; border-radius: 4px" readonly>

                                            </div>
                                        </div>
                                        <div class="checkout__input">
                                            <p>Return Date & Time<span>*</span></p>
                                            <div class="date-time-field" style="display: flex; gap: 2px">
                                                <input  type="date" id="displayEndDate" name="end_date" style="height: 35px;padding: 0 6px;border: 0.1px solid  #999999; border-radius: 4px" readonly>
                                                <input  type="time" id="displayEndTime" name="end_time" style="height: 35px;padding: 0 6px; width: 160px;  border: 0.1px solid  #999999; border-radius: 4px" readonly>

                                            </div>
                                            <p id="invalid_date_message" style="color: red; margin-top: 5px; display: none;">Please reselect the date!</p>
                                        </div>
                                        <div  style="display: flex; margin-top: 20px;margin-bottom: 0;justify-content: space-between">
                                            <p style="margin-bottom: 0">Rental Period:</p>
                                            <p style="display: flex;margin: 0">
                                                <input  style="width: 40px; height: 30px;color: #999999; border: none;margin: 0" type="text" id="displayBuyQty" name="buy_qty" value="1" readonly><span id="timeUnit"></span>
                                            </p>
                                        </div>
                                        <div style="display: flex;margin: 0; justify-content: space-between">
                                            <span>Price</span>
                                            <span id="priceChoose"></span>
                                        </div>
                                        <hr style="margin: 0">
                                        <div class="checkout__input" style="display: flex; margin-top: 10px;justify-content: space-between">
                                            <p style="margin-bottom: 0">Total</p>
                                            <input style="padding-left: 20px;width: 86px;color: #999999; border: none; " type="text" id="displayTotal" readonly>
                                        </div>
                                        <div class="checkout__input" style="display: flex;justify-content: space-between">
                                            <span style="margin-bottom: 0">Deposit</span>
                                            <span>${{$product->deposit}}</span>
                                        </div>
                                        <button type="submit" class="btn-main btn-fullwidth">RENT NOW</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>



                </div>
            </div>
    </section>
    <section id="section-settings" class="bg-gray-100">
        <div class="container">
            <div class="col-lg-6 offset-lg-3 text-center">
                <h2>Product Reviews</h2>
                <div class="field-set mb20">
                    <div id="rateYo" style="margin-left: 230px"></div>
                </div>
            </div>
            <div class="row">
                @foreach($productReview as $review)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="review-container">
                                    <h4>{{ $review->user->name }}</h4>
                                    <div class="rateYo-{{ $review->id }}"></div>
                                    <p style="display: none">Rating: {{ $review->rating }}</p>

                                    <p style="margin-top:10px ">{{ $review->feedback }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{--    một số car--}}
    <section id="section-cars">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2>Our Vehicle Fleet</h2>
                    <p>Driving your dreams to reality with an exquisite fleet of versatile vehicles for unforgettable journeys.</p>
                    <div class="spacer-20"></div>
                </div>

                <div id="items-carousel" class="owl-carousel wow fadeIn">

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="{{$product->thumbnail}}" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>{{$product->name}}</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>74</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">SUV</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>${{$product->price}}</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="images/cars/product-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>BMW M2</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>36</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">Sedan</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>$384</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="images/cars/product-4.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>Ferarri Enzo</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>85</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">Exotic Car</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>$167</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="images/cars/product-8.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>Ford Raptor</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>59</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">Pickup Truck</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>$847</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="images/cars/product-12.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>Mini Cooper</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>19</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">Hatchback</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>$238</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="images/cars/product-10.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4>VW Polo</h4>
                                    <div class="d-item_like">
                                        <i class="fa fa-heart"></i><span>79</span>
                                    </div>
                                    <div class="d-atr-group">
                                        <span class="d-atr"><img src="images/icons/1.svg" alt="">5</span>
                                        <span class="d-atr"><img src="images/icons/2.svg" alt="">2</span>
                                        <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                        <span class="d-atr"><img src="images/icons/4.svg" alt="">Hatchback</span>
                                    </div>
                                    <div class="d-price">
                                        Daily rate from <span>$106</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    {{--    {end--}}
</div>
<!-- resources/views/date-form.blade.php -->


@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
<!-- content close -->
</body>
<style>
    .review-container {
        border: 1px solid #D62D2D;
        padding: 30px;
        margin-left: 100px;
        margin-right: 100px;
        border-radius: 5px;

    }
    .giay_to_xe{
        margin: 80px 0;
    }
    .car_rental_paper {
        color: #0b0b0b;
        font-size: 20px;
        font-weight: 600;
    }

    .paper_passport {
        margin-top: 15px;
        display: grid;
        border: 1px solid whitesmoke;
        padding: 10px 20px;
        border-radius: 8px;
        border-left:8px solid #1ecb15;
        background-color: #d2e8d1;
    }
    .paper_passport span {
        color: #333;
        font-size: 16px;
    }

     .flip-card {
         background-color: #f2f2f2;
         height: 150px;

     }

    .flip-card-inner {

        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.9s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 150px;
        backface-visibility: hidden;
    }

    .flip-card-front {
        padding-top: 25px;
        background-color: #f2f2f2;
        color: black;
    }

    .flip-card-back {
        padding-top: 25px;
        background-color: #f2f2f2;
        color: black;
        transform: rotateY(180deg);
    }
</style>
{{--tinh ngày--}}
<script>
    // Lấy các phần tử DOM
    var startDateInput = document.getElementById('start_date');
    var startTimeInput = document.getElementById('start_time');
    var endDateInput = document.getElementById('end_date');
    var endTimeInput = document.getElementById('end_time');
    var numDaysInput = document.getElementById('buy_qty');
    var unitSpan = document.getElementById('unit');
    var invalidDateMessage = document.getElementById('invalid_date_message');

    // Gắn sự kiện onchange để tính số ngày khi ngày được thay đổi
    startDateInput.addEventListener('change', calculateNumDays);
    startTimeInput.addEventListener('change', calculateNumDays);
    endDateInput.addEventListener('change', calculateNumDays);
    endTimeInput.addEventListener('change', calculateNumDays);


    function calculateNumDays() {
        var startDate = new Date(startDateInput.value + ' ' + startTimeInput.value);
        var endDate = new Date(endDateInput.value + ' ' + endTimeInput.value);

        // Kiểm tra nếu ngày kết thúc nhỏ hơn ngày bắt đầu
        if (endDate < startDate) {
            numDaysInput.value = '';
            invalidDateMessage.style.display = 'block';
            return;
        }

        invalidDateMessage.style.display = 'none';

        // Kiểm tra nếu start_date và end_date giống nhau
        if (startDate.toDateString() === endDate.toDateString()) {
            var timeDiff = endDate.getTime() - startDate.getTime();
            var numHours = Math.round(timeDiff / (1000 * 3600)); // Tính số giờ và làm tròn

            if (numHours >= 0) {
                document.getElementById("buy_qty").value = numHours;
            } else {
                document.getElementById("buy_qty").value = '';
            }
        } else {
            var timeDiff = endDate.getTime() - startDate.getTime();
            var numDays = Math.ceil(timeDiff / (1000 * 3600 * 24) + 1); // Tính số ngày làm tròn lên

            if (numDays >= 0) {
                numDaysInput.value = numDays;
            } else {
                numDaysInput.value = '';
            }
        }
        if (startDate.toDateString() !== endDate.toDateString()) {
            unitSpan.textContent = 'day';
        } else {
            unitSpan.textContent = 'hour';
        }

    }
</script>
{{--cấm ng dùng chọn date sau ngày hiện tại--}}
<script>
    function checkDate() {
        var selectedDate = new Date(document.getElementById("start_date").value);
        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);
        if (selectedDate <= currentDate) {
            alert("Please select the rental start date again!");
            document.getElementById("start_date").value = "";
        }
    }


</script>
{{-- script cho product review--}}
<script >
    $(function () {
        @foreach($productReview as $review)
        $(".rateYo-{{ $review->id }}").rateYo({
            rating: {{ $review->rating }},
            readOnly: true // Nếu bạn muốn rating là chỉ đọc
        });
        @endforeach
    });
    $(function () {
        // Lấy giá trị số sao trung bình từ Blade view
        var averageRating = {{ $averageRating }};

// Khởi tạo plugin rateYo với giá trị ban đầu là số sao trung bình và readOnly: true
        $("#rateYo").rateYo({
            rating: averageRating,
            readOnly: true
        });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

{{--css modal--}}
<style>
    /* CSS cho modal */


    .modal_vanh {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content_vanh {
        background-color: #fefefe;
        margin: 10% auto;
        padding:50px 80px;
        border: 1px solid #888;
        width: 60%;
    }

    .close {
        color: #333333;
        float: right;
        font-size: 30px;
        font-weight: bold;
        text-align: right;
        position: relative;
        bottom: 40px;
        left: 60px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


</style>
{{--js modal--}}
<script>
    // JavaScript
    function openModal() {
        var StartTime = document.getElementById("start_time").value;
        var EndTime = document.getElementById("end_time").value;
        var StartDate = document.getElementById("start_date").value;
        var EndDate = document.getElementById("end_date").value;
        var BuyQty = document.getElementById("buy_qty").value;
        if (StartTime === '' || EndTime ==='' || StartDate === '' || EndDate === '' || BuyQty === '') {
            alert("Please select complete information!");
            return; // Không làm gì cả nếu ô nhập trống
        }
        var priceChoose = document.getElementById("priceChoose");
        if (StartDate === EndDate) {
            priceChoose.textContent = "{{$product->hourly_price}}$";
            document.getElementById("displayBuyQty").value = StartTime;
        } else {
            priceChoose.textContent = "{{$product->price}}$";
            document.getElementById("displayBuyQty").value = StartDate;
        }

        document.getElementById("displayStartDate").value = StartDate;
        document.getElementById("displayEndDate").value = EndDate;
        document.getElementById("displayStartTime").value = StartTime;
        document.getElementById("displayEndTime").value = EndTime;
        document.getElementById("displayBuyQty").value = BuyQty;
        document.getElementById("myModal").style.display = "block";
    }
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            closeModal();
        }
    }
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    function calculateTotalPrice() {
        var StartDate = document.getElementById("start_date").value;
        var EndDate = document.getElementById("end_date").value;
        var EndTime = document.getElementById("end_time").value;
        var StartTime = document.getElementById("start_time").value;
        var HourlyPrice = {{$product->hourly_price}};
        var DailyPrice = {{$product->price}};
        var BuyQty = parseInt(document.getElementById("buy_qty").value);
        var TotalPrice = 0;

        if (StartDate === EndDate &&  EndTime !== StartTime) {
            TotalPrice = HourlyPrice * BuyQty;
            document.getElementById("timeUnit").textContent = "hours";
        } else {
            TotalPrice = DailyPrice * BuyQty;
            document.getElementById("timeUnit").textContent = "days";
        }

        document.getElementById("displayTotal").value = TotalPrice.toFixed(2);
    }

    // Gọi hàm calculateTotalPrice khi người dùng thay đổi số lượng hoặc ngày
    document.getElementById("buy_qty").addEventListener("input", calculateTotalPrice);
    document.getElementById("start_date").addEventListener("change", calculateTotalPrice);
    document.getElementById("end_date").addEventListener("change", calculateTotalPrice);
    document.getElementById("end_time").addEventListener("change", calculateTotalPrice);
    document.getElementById("start_time").addEventListener("change", calculateTotalPrice);


</script>





<a href="#" id="back-to-top"></a>
</html>

