<header class="transparent scroll-light has-topbar">
    <div id="topbar" class="topbar-dark text-light">
        <div class="container">
            <div class="topbar-left xs-hide">
                <div class="topbar-widget">
                    <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>contact@rentaly.com</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 08.00 - 18.00</a></div>
                </div>
            </div>

            <div class="topbar-right">
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="#">
                                    <img class="logo-1" src="images/logo-light.png" alt="">
                                    <img class="logo-2" src="images/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="#">Home</a>
                                <ul>
                                    <li><a class="menu-item" href="#">New: Homepage 1 Dark</a></li>
                                    <li><a class="menu-item" href="#">New: Homepage 2 Dark</a></li>

                                </ul>
                            </li>
                            <li><a class="menu-item" href="#">Cars</a>
                                <ul>
                                    <li><a class="menu-item" href="{{url("/car_list")}}">Cars List</a></li>

                                </ul>
                            </li>


                            <li>
                                <a class="menu-item" href="{{url("cart")}}">Cart</a>
                                    <span style="position: relative;bottom: 5px; right: 6px; color: white; font-size: 10px">
                                    {{session()->has("cart")?count(session("cart")):0}}
                                    </span>
                            </li>



                            <li>
                                <a class="menu-item" href="account-dashboard.html">My Account</a>
                                <ul>

                                    <li><a class="menu-item" href="{{url("/account_profile")}}">My Profile</a></li>
                                    <li><a class="menu-item" href="{{url("/renewed")}}">My Orders</a></li>

                                </ul>
                            </li>
                            <li><a class="menu-item" href="#">Pages</a>
                                <ul>

                                    <li>@auth()
                                            <a href="#" class="vanh_auth" ><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                                            <form  id="form-logout" action="{{route("logout")}}" method="post">
                                                @csrf
                                            </form>

                                        @endauth @guest()
                                            <a class="vanh_auth" href="{{route("login")}}"><i class="fa fa-user"></i>Login</a>
                                        @endguest
                                    </li>
                                    <li>@auth()
                                        <a class="vanh_auth" href="javascript:void(0);" onclick="$('#form-logout').submit();">
                                            <i class="fa fa-align-right"></i>Logout</a>
                                        @endauth
                                        @guest()
                                            <a class="vanh_auth" href="{{route("register")}}"><i class="fa fa-user"></i>Register</a>
                                        @endguest
                                    </li>

                                    <li><a class="menu-item" href="{{url("/admin/home")}}">Admin</a></li>
                                </ul>
                            </li>

                            <li><a class="menu-item" href="#">Elements</a>
                                <ul>
                                    <li><a class="menu-item" href="preloader.html">Preloader</a></li>
                                    <li><a class="menu-item" href="icon-boxes.html">Icon Boxes</a></li>
                                    <li><a class="menu-item" href="badge.html">Badge</a></li>
                                    <li><a class="menu-item" href="counters.html">Counters</a></li>
                                    <li><a class="menu-item" href="gallery-popup.html">Gallery Popup</a></li>
                                    <li><a class="menu-item" href="icons-elegant.html">Icons Elegant</a></li>
                                    <li><a class="menu-item" href="icons-etline.html">Icons Etline</a></li>
                                    <li><a class="menu-item" href="icons-font-awesome.html">Icons Font Awesome</a></li>
                                    <li><a class="menu-item" href="map.html">Map</a></li>
                                    <li><a class="menu-item" href="modal.html">Modal</a></li>
                                    <li><a class="menu-item" href="popover.html">Popover</a></li>
                                    <li><a class="menu-item" href="tabs.html">Tabs</a></li>
                                    <li><a class="menu-item" href="tooltips.html">Tooltips</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <div class="header__top__right__auth">
                                @auth()
                                    <a href="#"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                                    <form id="form-logout" action="{{route("logout")}}" method="post">
                                        @csrf
                                    </form>
                                    <a href="javascript:void(0);" onclick="$('#form-logout').submit();">
                                        <i class="fa fa-align-right"></i>Logout</a>
                                @endauth
                                @guest()
                                    <a style="color: whitesmoke" href="{{route("login")}}"><i class="fa fa-user"></i>Login</a>
                                    <a style="color: whitesmoke" href="{{route("register")}}"><i class="fa fa-user"></i>Register</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .vanh_auth {
        color: #6f6f6f;
    }
    .vanh_auth:hover{
        color: #f8f9fa;
        background-color: #179510;
    }
</style>
