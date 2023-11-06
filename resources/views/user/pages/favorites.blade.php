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
<style>
    .hover_delete:hover{
        background-color: #1ecb15;
        color: #f8f9fa;
    }

    .hover_delete {
        border: 1px solid white;
        border-radius: 5px;
    }
</style>


<body onload="initialize()">
@include("user.layouts.hearder")
    <div id="top"></div>
<!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/14.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>My Favorite Cars</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
<!-- section close -->
    <section id="section-settings" class="bg-gray-100">
            <div class="row" style="margin-left: 100px">
                @if (count($favorites) > 0)
                <div style="display: flex">
                    <div class="col-lg-3 mb30 container">
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
                                <li><a href="{{url("/account_profile")}}" ><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{url("/favorites")}}" class="active"><i class="fa fa-user"></i>My Favorite Cars</a></li>
                                <li><a href="{{url("/renewed")}}"><i class="fa fa-calendar"></i>My Orders</a></li>
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
                    {{--                user--}}
                    <div style="display: grid;">
                            @foreach ($favorites as $favorite)
                                @php
                                    $product = \App\Models\Product::find($favorite->product_id);
                                @endphp
                                @if ($product)
                                    <div style="width: 85%">
                                        <div class="de-item-list no-border mb30">
                                            <div class="d-img">
                                                <img src="{{ $product->thumbnail }}" class="img-fluid" alt="">
                                            </div>
                                            <div class="d-info">
                                                <div class="d-text">
                                                    <h4>{{ $product->name }}</h4>
                                                    <div class="d-atr-group">
                                                        <ul class="d-atr">
                                                            <li><span>Seats:</span>{{ $product->seat }}</li>
                                                            <li><span>Luggage:</span>2</li>
                                                            <li><span>Doors:</span>{{ $product->door }}</li>
                                                            <li><span>Fuel:</span>{{$product->fuel_style}}</li>
                                                            <li><span>Horsepower:</span>500</li>
                                                            <li><span>Engine:</span>3000</li>
                                                            <li><span>Production year:</span>{{$product->car_year}}</li>
                                                            <li><span>Mileage:</span>{{$product->mileage}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-price">
                                                Daily rate from <span>${{$product->price}}</span>
                                                <a class="btn-main" href="{{url("detail",["product"=>$product->slug])}}">Rent Now</a>
                                            </div>
                                            <div class="clearfix">
                                                <a class="hover_delete"  onclick="return confirm('Definitely want to delete the car: <?php echo $product->name ?> out of favorite part?' )" href="{{ route('favorites.remove', ['favoriteId' => $favorite->id]) }}"><span class="icon_close" style="font-size: 25px;position: relative; top: 5px"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                    </div>

                </div>
            </div>
        @else
            <p class="alert alert-success" style="text-align: center; width: 92%">There are no favorite products!</p>
        @endif

    </section>

@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
</html>
