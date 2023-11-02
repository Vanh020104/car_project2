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
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/14.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>My Profile</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <section id="section-settings" class="bg-gray-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb30">
                    <div class="card p-4 rounded-5">
                        <div class="profile_avatar">
                            <div class="profile_img">
                                <img src="images/images_user.png" alt="">
                            </div>
                            <div class="profile_name">
                                <h4>
                                    <input style="text-align: center; border: none; cursor: default" value="{{ auth()?auth()->user()->name:old("full_name") }}">
                                    <span class="profile_username text-gray">
                                    <input style="text-align: center; border: none; color: #666666; cursor: default" value="{{ auth()?auth()->user()->email:old("email") }}">
                                    </span>
                                </h4>
                            </div>
                        </div>
                        <div class="spacer-20"></div>
                        <ul class="menu-col">
                            <li><a href="{{url("/account_profile")}}" class="active"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="{{url("/account_booking")}}"><i class="fa fa-calendar"></i>My Orders</a></li>
                            <li>
                                @auth()

                                    <form id="form-logout" action="{{route("logout")}}" method="post">
                                        @csrf
                                    </form>
                                    <a href="javascript:void(0);" onclick="$('#form-logout').submit();">
                                        <i class="fa fa-sign-out"></i>Logout</a>
                                @endauth

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card p-4  rounded-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="form-create-item" class="form-border" method="post">
                                    <div class="de_tab tab_simple">
                                            <h3 class="active" style="text-align: center"><span>Profile</span></h3>
                                        <div class="de_tab_content">
                                            <div class="tab-1">
                                                <div class="row">
                                                    <div class="col-lg-6 mb20">
                                                        <h5>User code</h5>
                                                        <input type="text" name="id" id="id" class="form-control" value="{{ auth()?auth()->user()->id:old("id") }}"  placeholder="Address..." />
                                                    </div>

                                                    <div class="col-lg-6 mb20">
                                                        <h5>Fullname</h5>
                                                        <input  class="form-control"  name="full_name" id="full_name" type="text" value="{{ auth()?auth()->user()->name:old("full_name") }}" placeholder="Enter name...">
                                                    </div>
                                                    <div class="col-lg-6 mb20">
                                                        <h5>Email</h5>
                                                        <input type="text" name="email" id="email" class="form-control" value="{{ auth()?auth()->user()->email:old("email") }}" placeholder="Enter email..." />
                                                    </div>
                                                    <div class="col-lg-6 mb20">
                                                        <h5>Password</h5>
                                                        <input type="password" name="password" id="password" class="form-control" value="{{ auth() ? Str::limit(auth()->user()->password, 10) : old('password') }}"  placeholder="Enter password" />
                                                    </div>

                                                    <div class="col-md-6 mb20">
                                                        <h5>Language</h5>
                                                        <div id="select_lang" class="dropdown fullwidth">
                                                            <a href="#" class="btn-selector">English</a>
                                                            <ul>
                                                                <li class="active"><span>English</span></li>
                                                                <li><span>France</span></li>
                                                                <li><span>German</span></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <input type="button" id="submit" class="btn-main" value="Update profile">--}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInRight">
                    <h2>We offer customers a wide range of <span class="id-color">commercial cars</span> and <span class="id-color">luxury cars</span> for any occasion.</h2>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s">
                    At Rentaly, we are dedicated to providing exceptional car rental services to our valued customers. With a commitment to quality, convenience, and customer satisfaction, we strive to make every rental experience a seamless and enjoyable one. We understand that every customer has unique needs and preferences when it comes to renting a car. That's why we maintain a diverse fleet of well-maintained vehicles to cater to various requirements. From compact cars for solo travelers to spacious SUVs for families, we have a wide range of options to choose from.
                </div>
            </div>
            <div class="spacer-double"></div>
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                        Completed Orders
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                        Happy Customers
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                        Vehicles Fleet
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                        Years Experience
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include("user.layouts.footer")
    @yield("before_js")
    @include("user.layouts.scripts")
    @yield("after_js")
</div>

</body>
</html>
