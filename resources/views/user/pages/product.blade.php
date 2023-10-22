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
    @yield("before_css")
    @include("user.layouts.head")
    @yield("after_css")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

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
        @if(session()->has("success"))
            <div class="alert alert-success" style="text-align: center" role="alert">
                {{session("success")}}
            </div>
        @endif
        <div class="container">
            <div class="row g-5" >
                <div class="col-lg-6">
                    <div id="slider-carousel" class="owl-carousel">
                        <div class="item">
                            <img src="{{$product->thumbnail}}" alt="">
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
                    <form  action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">

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
                <div class="col-lg-3">
                    <div class="de-price text-center">
                        Price/Date
                        <h3>${{$product->price}}</h3>
                    </div>
                    <div class="spacer-30"></div>
                    <div class="de-box mb25">
                        <h4 style="text-align: center">Booking this car</h4>
                        <div class="spacer-20"></div>
                        <div class="checkout__input">
                            <p>Pick Up Date & Time<span>*</span></p>
                            <div class="date-time-field" style="display: flex">
                                <input class="form-control" type="date" id="start_date" name="start_date" required style="padding: 0 20px">
                                <input  type="time" id="start_time" name="start_time" required style="padding: 0 20px; margin-left: 25px; display: none">

                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Return Date & Time<span>*</span></p>
                            <div class="date-time-field" style="display: flex">
                                <input class="form-control" type="date" id="end_date" name="end_date" required style="padding: 0 20px">
                                <input type="time" id="end_time" name="end_time" required style="padding: 0 20px; margin-left: 25px; display: none">
                            </div>
                            <p id="invalid_date_message" style="color: red; margin-top: 5px; display: none;">Please reselect the date!</p>
                        </div>




                        <form action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">
                            <div class="checkout__input" style="display: flex; margin-top: 20px; gap: 15px">
                                <p>Number of Days:</p>
                                <input style="width: 50px; height: 30px; border: none" type="text" id="buy_qty" name="buy_qty" value="1" >
                            </div>
                            <button type="submit" class="btn-main btn-fullwidth">ADD TO CART</button>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="de-box">
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
<script>
    // Lấy các phần tử DOM
    var startDateInput = document.getElementById('start_date');
    var startTimeInput = document.getElementById('start_time');
    var endDateInput = document.getElementById('end_date');
    var endTimeInput = document.getElementById('end_time');
    var numDaysInput = document.getElementById('buy_qty');
    var invalidDateMessage = document.getElementById('invalid_date_message');

    // Gắn sự kiện onchange để tính số ngày khi ngày được thay đổi
    startDateInput.addEventListener('change', calculateNumDays);
    startTimeInput.addEventListener('change', calculateNumDays);
    endDateInput.addEventListener('change', calculateNumDays);
    endTimeInput.addEventListener('change', calculateNumDays);

    // Hàm tính số ngày giữa hai ngày
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

        var timeDiff = endDate.getTime() - startDate.getTime();
        var numDays = Math.ceil(timeDiff / (1000 * 3600 * 24) +1) ; // Tính số ngày làm tròn lên

        if (numDays >= 0) {
            numDaysInput.value = numDays;
        } else {
            numDaysInput.value = '';
        }
    }
</script>
<style>
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
</style>
</html>
