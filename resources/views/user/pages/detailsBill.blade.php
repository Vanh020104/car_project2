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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
            <h1 style="font-size: 30px ;color: darkolivegreen" class="text-center">Bill Details : # {{$orders->id}}</h1>


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
                                    class="fw-bold">Full name:</span>{{$orders->full_name}}.</li>
                            <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">Telephone:</span>{{$orders->tel}}</li>
                            <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">Email: </span>{{$orders->email}}</li>
                            <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">Vehicle pickup location: </span>{{$orders->location}}.</li>
                        </ul>
                    </div>
                </div>

                <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless" style="width: 100%">
                        <thead>
                        <tr style="text-align: center;">

                            <th style="background-color: #1ecb15">Name</th>
                            <th style="background-color: #1ecb15">Image</th>
                            <th style="background-color: #1ecb15">Price</th>
                            <th style="background-color: #1ecb15">License plates</th>
                            <th style="background-color: #1ecb15">Start date</th>
                            <th style="background-color: #1ecb15">End date</th>
                            @php
                                $totalCost = 0;
                                $expenses = $orders->costsIncurred; // Lấy danh sách chi phí liên quan đến order hiện tại
                                foreach ($expenses as $expense) {
                                    $totalCost += $expense->price; // Tính tổng expense
                                }
                            @endphp
                            @if($totalCost != 0)
                                <th style="background-color: #1ecb15">Other Costs</th>
                            @endif
                            @if($totalCost != 0)
                                <th style="background-color: #1ecb15">Amout</th>
                            @else
                                <th style="background-color: #1ecb15">Total</th>
                            @endif

                            @if($totalCost != 0)
                                <th style="background-color: #1ecb15">Total</th>
                            @endif
                            <th style="background-color: #1ecb15">Deposit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders->Products as $item)
                            <tr style="text-align: center">

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


                                @php
                                        $totalCost = 0;
                                        $expenses = $orders->costsIncurred; // Lấy danh sách chi phí liên quan đến order hiện tại
                                        foreach ($expenses as $expense) {
                                            $totalCost += $expense->price; // Tính tổng expense
                                        }
                                @endphp
                                @if($totalCost != 0)
                                    <td>${{$totalCost}}.00 <br>
                                        <button style="width: 100px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div style="width: 950px;margin-left: -200px" class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 style="margin-left: 230px;font-size: 30px;color: #75943f" id="exampleModalLabel">Details Of Damages After Using The Vehicle</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Damage</th>
                                                                <th scope="col">Image</th>
                                                                <th scope="col">Extent Of Damage</th>
                                                                <th scope="col">Expense</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($expenses as $item)
                                                                <tr>
                                                                    <td>{{$item->damage}}</td>
                                                                    <td><img style="width: 260px;border-radius: 8px" src="{{$item->image}}" alt=""></td>
                                                                    @if($item->price == 10)
                                                                           <td>Minor Damage</td>
                                                                    @endif
                                                                    @if($item->price == 20)
                                                                        <td>Moderate Damage</td>
                                                                    @endif
                                                                    @if($item->price == 30)
                                                                        <td>Significant Damage</td>
                                                                    @endif
                                                                    @if($item->price == 40)
                                                                        <td>Severe Damage</td>
                                                                    @endif


                                                                    <td>${{$item->price}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif


                                <td>${{$orders->grand_total}}</td>
                                @if($totalCost != 0)
                                    <td>${{$orders->grand_total + $totalCost}}.00</td>
                                @endif
                                <td>${{$orders->deposit}}</td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>
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
