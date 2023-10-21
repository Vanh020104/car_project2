@extends("user.layouts.app")
@section("content")
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax">
            <img src="images/background/1.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-light">
                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>
                        <h1 class="mb-2">Looking for a <span class="id-color">vehicle</span>? You're at the right place.</h1>
                        <div class="spacer-single"></div>
                    </div>

                    <div class="col-lg-12">
                        <div class="spacer-single sm-hide"></div>
                        <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">


                            <form name="contactForm" id='contact_form' method="post">
                                <div id="step-1" class="row">
                                    <div class="col-lg-6 mb30">
                                        <h5>What is your vehicle type?</h5>

                                        <div class="de_form de_radio row g-3">
                                            <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                <input id="radio-1a" name="Car_Type" type="radio" value="Residential" checked="checked">
                                                <label for="radio-1a"><img src="images/select-form/car.png" alt="">Car</label>
                                            </div>

                                            <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                <input id="radio-1b" name="Car_Type" type="radio" value="Office">
                                                <label for="radio-1b"><img src="images/select-form/van.png" alt="">Van</label>
                                            </div>

                                            <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                <input id="radio-1c" name="Car_Type" type="radio" value="Commercial">
                                                <label for="radio-1c"><img src="images/select-form/minibus.png" alt="">Minibus</label>
                                            </div>

                                            <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                <input id="radio-1d" name="Car_Type" type="radio" value="Retail">
                                                <label for="radio-1d"><img src="images/select-form/sportscar.png" alt="">Prestige</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 mb20">
                                                <h5>Pick Up Location</h5>
                                                <input type="text" name="PickupLocation" onfocus="geolocate()" placeholder="Enter your pickup location" id="autocomplete" autocomplete="off" class="form-control">

                                                <div class="jls-address-preview jls-address-preview--hidden">
                                                    <div class="jls-address-preview__header">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Drop Off Location</h5>
                                                <input type="text" name="DropoffLocation" onfocus="geolocate()" placeholder="Enter your dropoff location" id="autocomplete2" autocomplete="off" class="form-control">

                                                <div class="jls-address-preview jls-address-preview--hidden">
                                                    <div class="jls-address-preview__header">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Pick Up Date & Time</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker" name="Pick Up Date" value="">
                                                    <select name="Pick Up Time" id="pickup-time">
                                                        <option selected disabled value="Select time">Time</option>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Return Date & Time</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker-2" name="Collection Date" value="">
                                                    <select name="Collection Time" id="collection-time">
                                                        <option selected disabled value="Select time">Time</option>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type='submit' id='send_message' value='Find a Vehicle' class="btn-main pull-right">
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="spacer-double"></div>

                    <div class="row">
                        <div class="col-lg-12 text-light">
                            <div class="container-timeline">
                                <ul>
                                    <li>
                                        <h4>Choose a vehicle</h4>
                                        <p>Unlock unparalleled adventures and memorable journeys with our vast fleet of vehicles tailored to suit every need, taste, and destination.</p>
                                    </li>
                                    <li>
                                        <h4>Pick location &amp; date</h4>
                                        <p>Pick your ideal location and date, and let us take you on a journey filled with convenience, flexibility, and unforgettable experiences.</p>
                                    </li>
                                    <li>
                                        <h4>Make a booking</h4>
                                        <p>Secure your reservation with ease, unlocking a world of possibilities and embarking on your next adventure with confidence.</p>
                                    </li>
                                    <li>
                                        <h4>Sit back &amp; relax</h4>
                                        <p>Hassle-free convenience as we take care of every detail, allowing you to unwind and embrace a journey filled comfort.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section" class="pt40 pb40 text-light" data-bgcolor="#111111">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Pickup Truck</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                    </div>
                </div>

                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Pickup Truck</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                        <i class="d-item-dot"></i>
                      </span>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Our Features</h2>
                        <p>Discover a world of convenience, safety, and customization, paving the way for unforgettable adventures and seamless mobility solutions.</p>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-3">
                        <div class="box-icon s2 p-small mb20 wow fadeInRight" data-wow-delay=".5s">
                            <i class="fa bg-color fa-trophy"></i>
                            <div class="d-inner">
                                <h4>First class services</h4>
                                Where luxury meets exceptional care, creating unforgettable moments and exceeding your every expectation.
                            </div>
                        </div>
                        <div class="box-icon s2 p-small mb20 wow fadeInL fadeInRight" data-wow-delay=".75s">
                            <i class="fa bg-color fa-road"></i>
                            <div class="d-inner">
                                <h4>24/7 road assistance</h4>
                                Reliable support when you need it most, keeping you on the move with confidence and peace of mind.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="images/misc/car.png" alt="" class="img-fluid wow fadeInUp">
                    </div>

                    <div class="col-lg-3">
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1s">
                            <i class="fa bg-color fa-tag"></i>
                            <div class="d-inner">
                                <h4>Quality at Minimum Expense</h4>
                                Unlocking affordable brilliance with elevating quality while minimizing costs for maximum value.
                            </div>
                        </div>
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1.25s">
                            <i class="fa bg-color fa-map-pin"></i>
                            <div class="d-inner">
                                <h4>Free Pick-Up & Drop-Off</h4>
                                Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-light jarallax">
            <img src="images/background/2.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInRight">
                        <h2>We offer customers a wide range of <span class="id-color">commercial cars</span> and <span class="id-color">luxury cars</span> for any occasion.</h2>
                    </div>
                    <div class="col-lg-6 wow fadeInLeft">
                        At our car rental agency, we believe that everyone deserves to experience the pleasure of driving a reliable and comfortable vehicle, regardless of their budget. We have curated a diverse fleet of well-maintained cars, ranging from sleek sedans to spacious SUVs, all at competitive prices. With our streamlined rental process, you can quickly and conveniently reserve your desired vehicle. Whether you need transportation for a business trip, family vacation, or simply want to enjoy a weekend getaway, we have flexible rental options to accommodate your schedule.
                    </div>
                </div>
                <div class="spacer-double"></div>
                <div class="row text-center">
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                            Completed Orders
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                            Happy Customers
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                            Vehicles Fleet
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                            Years Experience
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include("user.pages.category")

        <section class="text-light jarallax" aria-label="section">
            <img src="images/background/3.jpg" alt="" class="jarallax-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h1>Let's Your Adventure Begin</h1>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-trophy de-icon mb20"></i>
                        <h4>First Class Services</h4>
                        <p>Where luxury meets exceptional care, creating unforgettable moments and exceeding your every expectation.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-road de-icon mb20"></i>
                        <h4>24/7 road assistance</h4>
                        <p>Reliable support when you need it most, keeping you on the move with confidence and peace of mind.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-map-pin de-icon mb20"></i>
                        <h4>Free Pick-Up & Drop-Off</h4>
                        <p>Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental experience.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-news">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Latest News</h2>
                        <p>Breaking news, fresh perspectives, and in-depth coverage - stay ahead with our latest news, insights, and analysis.</p>
                        <div class="spacer-20"></div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">10</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-1.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">Enjoy Best Travel Experience<span></span></a></h4>
                                    <p>Traveling is an enriching experience that allows us to explore new destinations, immerse ourselves in different cultures, and create lifelong memories.</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">12</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-2.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">The Future of Car Rent<span></span></a></h4>
                                    <p>As technology continues to advance at a rapid pace, the car rental industry is poised for a transformative shift. The future of car rental promises..</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">14</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-3.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">Holiday Tips For Backpacker<span></span></a></h4>
                                    <p>For adventure seekers and budget-conscious travelers, backpacking offers a thrilling and immersive way to explore the world. Whether you're embarking..</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-testimonials" class="no-top no-bottom">
            <div class="container-fluid">
                <div class="row g-0 align-items-center">

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.
                                    <span class="by">Stepanie Hutchkiss</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    We have been using Rentaly for our trips needs for several years now and have always been happy with their service. Their customer support is Excellent Service! and they are always available to help with any issues we have. Their prices are also very competitive.
                                    <span class="by">Jovan Reels</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/2.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    Endorsed by industry experts, Rentaly is the Car Rental solution you can trust. With years of experience in the field, we provide fast, reliable and secure Car Rental services.
                                    <span class="by">Kanesha Keyton</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/3.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="section-faq">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Have Any Questions?</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
                <div class="row g-custom-x">
                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-1">
                                    How do I get started with Car Rental?
                                </div>
                                <div class="accordion-section-content" id="accordion-1">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-2">
                                    Can I rent a car with a debit card??
                                </div>
                                <div class="accordion-section-content" id="accordion-2">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-3">
                                    What kind of Car Rental do I need?
                                </div>
                                <div class="accordion-section-content" id="accordion-3">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-b-4">
                                    What is a rental car security deposit?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-4">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-5">
                                    Can I cancel or modify my reservation?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-5">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-6">
                                    Is it possible to extend my rental period?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-6">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <h2 class="s2">Call us for further information. Rentaly customer care is here to help you anytime.</h2>
                    </div>

                    <div class="col-lg-5 text-lg-center text-sm-center">
                        <div class="phone-num-big">
                            <i class="fa fa-phone"></i>
                            <span class="pnb-text">
                                    Call Us Now
                                </span>
                            <span class="pnb-num">
                                    1 200 333 800
                                </span>
                        </div>
                        <a href="#" class="btn-main">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
@endsection
