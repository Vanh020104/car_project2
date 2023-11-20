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
    <base href="/">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="icon" href="admin/favicon.ico">
    <link href="admin/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- CSS Files

    ================================================== -->
    <style>
        .form-bill{
            margin: auto;
            padding: 50px;
            border-radius: 8px;
            border: #c4c4c4 solid 1px;
            width: 950px;
            max-width: 950px;
        }
        .tieude{
            margin-left: 20%;
            display: flex;
        }
        .ttstore1{
            font-size: 13px;
            margin-left: 50px;
        }
        .ttorder1{
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            width: 800px;
            max-width: 800px;
            justify-content: space-between;
        }
        .order_car{
            margin-left: 30px;
            margin-top: 10px;

        }

    </style>
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
                    <h1>My Orders</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!-- section close -->
<section id="section-settings" class="bg-gray-100">
    <div class="row" style="margin-left: 100px">

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
                            <li><a href="{{url("/favorites")}}" ><i class="fa fa-user"></i>My Favorite Cars</a></li>
                            <li><a href="{{url("/renewed")}}" class="active"> <i class="fa fa-calendar"> </i> My Orders</a></li>
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
                <div class="col-lg-9">
                    @if($orders_dt->count() >0)
                        <div class="card p-4 rounded-5 mb25">
                            <h4>Scheduled Orders</h4>

                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>

                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span style="width: 100px" class="text-uppercase fs-12 text-gray">Status</span></th>
                                    <th style="margin-left: 15px" scope="col"><span class="text-uppercase fs-12 text-gray">Action</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders_dt as $order)
                                    <tr>
                                        <td><span class="d-lg-none d-sm-block">Order ID</span><div class="badge bg-gray-100 text-dark">#{{$order->id}}</div></td>
                                        <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">@foreach ($order->products as $product)
                                                    {{ $product->name }}<br>
                                                @endforeach
                                        </span></td>
                                        <td style="width: 280px"><span class="d-lg-none d-sm-block">Pick Up Location</span>{{$order->location}}</td>

                                        <td><span class="d-lg-none d-sm-block">Pick Up Date</span>
                                            @foreach ($order->products as $product)
                                                {{ sprintf('%s %s',  $product->pivot->start_date,$product->pivot->start_time) }}
                                            @endforeach
                                        </td>
                                        <td><span class="d-lg-none d-sm-block">Return Date</span>
                                            @foreach ($order->products as $product)
                                                {{ sprintf('%s %s',  $product->pivot->end_date,$product->pivot->end_time) }}
                                            @endforeach
                                        </td>
                                        <td style="margin-right: 10px">
                                            @if($order->status == 0)
                                                <p style="text-align:center;font-size: 11px;background-color:#a9a919;color: white ;border-radius: 15px;padding-left: 4px;padding-right: 4px">Processing</p>
                                            @endif
                                            @if($order->status == 1)
                                                <p style="text-align:center;font-size: 11px;background-color:#a9a919;color: white ;border-radius: 15px;padding-left: 4px;padding-right: 4px">Confirmed</p>
                                            @endif
                                            @if($order->status == 2)
                                                <a href="{{url("confirmUser",['order'=>$order->id ] )}}" style="background-color: blue;color: white;padding-left: 5px;padding-right: 5px;border-radius: 8px;padding-top: 4px;padding-bottom: 4px;">Car Received</a>
                                            @endif
                                            @if($order->status == 3)
                                                <p style="font-size: 11px;background-color:#a9a919;color: white ;border-radius: 15px;padding-left: 4px;padding-right: 4px">Currently Renting</p>
                                            @endif
                                            @if($order->status == 5)
                                                <p style="text-align:center;font-size: 11px;background-color:#a9a919;color: white ;border-radius: 15px;padding-left: 4px;padding-right: 4px">Car Returned</p>
                                            @endif
                                            @if($order->status == 8)
                                                <a href="{{url("confirmUserCompleted",['order'=>$order->id ] )}}" style="background-color: blue;color: white;padding-left: 5px;padding-right: 5px;border-radius: 8px;padding-top: 4px;padding-bottom: 4px;">Complete</a>
                                            @endif

                                        </td>
                                        <td><div style="display:flex;margin-left: 10px">
                                                <div><button style="background-color: #54ea54;padding-left: 4px;padding-right: 4px;color: white;border-radius: 8px">Details</button></div>
                                                <div><button style="margin-left:10px;background-color: #54ea54;padding-left: 4px;padding-right: 4px;color: white;border-radius: 8px">Rent</button></div>
                                            </div></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif



                    @if($orders->count() >0)
                            <div class="card p-4 rounded-5 mb25">
                                <h4>Completed Orders</h4>

                                <table class="table de-table">
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>

                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Action</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)
                                        <tr>
                                            <td><span class="d-lg-none d-sm-block">Order ID</span><div class="badge bg-gray-100 text-dark">#{{$order->id}}</div></td>
                                            <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">@foreach ($order->products as $product)
                                                        {{ $product->name }}<br>
                                                    @endforeach
                                        </span></td>
                                            <td><span class="d-lg-none d-sm-block">Pick Up Location</span>{{$order->location}}

                                            <td><span class="d-lg-none d-sm-block">Pick Up Date</span>
                                                @foreach ($order->products as $product)
                                                    {{ sprintf('%s %s',  $product->pivot->start_date,$product->pivot->start_time) }}
                                                @endforeach
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Return Date</span>
                                                @foreach ($order->products as $product)
                                                    {{ sprintf('%s %s',  $product->pivot->end_date,$product->pivot->end_time) }}
                                                @endforeach
                                            </td>
                                            <td><div class="badge rounded-pill bg-success">completed</div></td>
                                            <td><div style="display:flex;">
                                                    <div>
                                                        <form action="{{url("detailsBill",['order'=>$order->id])}}">
                                                            <button type="submit" style="background-color: #54ea54;padding-left: 4px;padding-right: 4px;color: white;border-radius: 8px">Details</button>
                                                        </form>
                                                    </div>
                                                    <div> @foreach($order->Products as $product)
                                                            <form action="{{url("detail",['products' => $product->slug])}}">
                                                                <button style="margin-left:10px;background-color: #54ea54;padding-left: 4px;padding-right: 4px;color: white;border-radius: 8px">Rent</button>
                                                            </form>
                                                        @endforeach </div>
                                                </div></td>
                                            <td><form action="{{url("feedback",['order'=>$order->id])}}">
                                                    <button type="submit" style="background-color: #54ea54;padding-left: 4px;padding-right: 4px;color: white;border-radius: 8px">Feedback</button>
                                                </form></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    @endif


</div>
</div>

</div>
</section>

@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
</html>
