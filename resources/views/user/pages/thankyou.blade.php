<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .email-btn {
            color: #5d9fc5;
        }

        .email-btn i {
            color: #5d9fc5;
        }

        .email-btn:hover {
            text-decoration: none;
        }

        .text-muted{
            font-weight: 600;
        }

        .contact-info {
            margin-bottom: 20px;
        }

        .contact-info .info-item {
            margin-bottom: 10px;
        }

        .info-item span {
            color: #5d9fc5;
        }

        .customer-info {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .customer-info .info-item {
            margin-bottom: 10px;
        }

        .customer-info .info-item i {
            color: #84b0ca;
        }

        .customer-info .info-item span {
            font-weight: bold;
        }

        .table thead {
            background-color: #84b0ca;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .thank-you {
            margin-top: 20px;
        }
    </style>
    <style>
        /*/ icon V check /*/


        /*.circel__check {*/
        /*    width: 350px;*/
        /*    margin: 50px 15% 20px 15%;*/
        /*}*/
        .svg-success {
            display: inline-block;
            vertical-align: top;
            height: 50px;
            width: 50px;
            opacity: 1;
            overflow: visible;
        }
        @keyframes success-tick {
            0% {
                stroke-dashoffset: 16px;
                opacity: 1
            }

            100% {
                stroke-dashoffset: 31px;
                opacity: 1
            }
        }

        @keyframes success-circle-outline {
            0% {
                stroke-dashoffset: 72px;
                opacity: 1
            }

            100% {
                stroke-dashoffset: 0px;
                opacity: 1
            }
        }

        @keyframes success-circle-fill {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .success-tick {
            fill: none;
            stroke-width: 2px;
            stroke: #ffffff;
            stroke-dasharray: 15px, 15px;
            stroke-dashoffset: -14px;
            animation: success-tick 450ms ease 1400ms forwards;
            opacity: 0;
            margin-right: 200px;
        }

        .success-circle-outline {
            fill: none;
            stroke-width: 1px;
            stroke:  #1ecb15;
            stroke-dasharray: 72px, 72px;
            stroke-dashoffset: 72px;
            animation: success-circle-outline 300ms ease-in-out 800ms forwards;
            opacity: 0;
        }

        .success-circle-fill {
            fill:
                #1ecb15;
            stroke: none;
            opacity: 0;
            animation: success-circle-fill 300ms ease-out 1100ms forwards;
        }
    </style>
</head>
@yield("before_css")
@include("user.layouts.head")
@yield("after_css")
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<body>
@include("user.layouts.hearder")
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/6.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">

            </div>
        </div>
    </section>
    <!-- section close -->
<div class="card">
    <div class="card-body">
        <div class="text-center" style="margin: 40px 0">

            <svg xmlns="http://www.w3.org/2000/svg" class="svg-success" viewBox="0 0 24 24">
                <g stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                    <circle class="success-circle-outline" cx="12" cy="12" r="11.5"/>
                    <circle class="success-circle-fill" cx="12" cy="12" r="11.5"/>
                    <polyline class="success-tick" points="17,8.5 9.5,15.5 7,13"/>
                </g>
            </svg>

        </div>
        <h1 class="text-center">Thank You</h1>
        <h3 class="text-center mb-3">Your order #{{$order->id}} has been rented!</h3>


        <div class="container" style="margin-top: 70px">
            <div class="row" style="display: flex; gap: 30%">
                <div class="col-md-4 customer-info" style="margin-left: 20px">
                    <p class="text-muted" style="text-align: center; font-size: 19px">Store</p>

                    <ul class="list-unstyled">
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">To:</span>Rently@gmail.com</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Address:</span>8A Ton That Thuyet, My Dinh2, Nam Tu Liem, Ha Noi.</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Phone Number:</span><i class="fas fa-phone"></i> +1 333 9296</li>
                    </ul>
                </div>
                <div class="col-md-4 customer-info">
                    <p class="text-muted" style="text-align: center; font-size: 19px">Customer</p>
                    <ul class="list-unstyled">
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">ID:</span>#{{$order->id}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Full name:</span>{{$order->full_name}}.</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Telephone:</span>{{$order->tel}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Email: </span>{{$order->email}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Vehicle pickup location: </span>{{$order->location}}.</li>
                    </ul>
                </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless" style="width: 100%">
                    <thead>
                    <tr style="text-align: center;">
                        <th style="background-color: #1ecb15">ID</th>
                        <th style="background-color: #1ecb15">Name</th>
                        <th style="background-color: #1ecb15">Image</th>
                        <th style="background-color: #1ecb15">Price</th>
                        <th style="background-color: #1ecb15">License plates</th>
                        <th style="background-color: #1ecb15">Start date</th>
                        <th style="background-color: #1ecb15">End date</th>
                        <th style="background-color: #1ecb15">Time</th>
                        <th style="background-color: #1ecb15">Total</th>
                        <th style="background-color: #1ecb15">Deposit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->Products as $item)
                        <tr style="text-align: center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><img src="{{$item->thumbnail}}" width="150"/></td>
                            <td>${{$item->pivot->price}}</td>
                            <td>29 – B1 <br> 8 8 8 . 8 8</td>
                            <td>
                                {{$item->pivot->start_date}} <br> {{$item->pivot->start_time}}
                            </td>
                            <td>
                                {{$item->pivot->end_date}} <br> {{$item->pivot->end_time}}
                            </td>
                            <td>{{$item->pivot->buy_qty}}
                                @if($item->start_date != $item->end_date)
                                    hours
                                @else
                                    days
                                @endif
                            </td>
                            <td>${{$order->grand_total}}</td>
                            <td>${{$item->deposit}}</td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
            <div style="display: flex;width: 650px;margin-left: auto; margin-right: auto ; margin-top: 10px">
                <i class="fa-solid fa-arrows-turn-right" style="color: #1ecb15; margin: 3px 10px 0 10px;font-size: 20px"></i>
                <p style=" padding: 0; text-align: center">Your deposit of  ${{$item->deposit}} will be refunded when the car rental is completed!</p>
                <i class="fa-solid fa-arrows-turn-right fa-flip-horizontal" style="color: #1ecb15; margin: 3px 10px 0 10px;font-size: 20px"></i>
            </div>


        </div>
    </div>
</div>
</div>

@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
<!-- content close -->
</body>

</html>
