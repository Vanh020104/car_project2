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

</head>


<body onload="initialize()">
@include("user.layouts.hearder")
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>
    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/3.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Payment</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->




{{--        bill--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="invoice">
                <!-- begin invoice-header -->
                <div class="invoice-header" style="padding: 20px 50px; background-color: #d2e8d1">
                    <div class="invoice-to">
                        <div class="m-t-5 m-b-5" style="display: grid">
                            <h4>Customer Information</h4>
                           <span>Full Name: {{$order->full_name}}</span>
                           <span>Email: {{$order->email}}</span>
                           <span>Address: {{$order->address}}</span>
                           <span>Telephone: {{$order->tel}}</span>
                        </div>
                    </div>
                    <div class="invoice-date">
                        <div class="m-t-5 m-b-5" style="display: grid">
                            <h4>Car Rental Period</h4>
                            <span>Pick Up Date: {{$order->start_date}}</span>
                            <span>Return Date: {{$order->end_date}}</span>
                            <span>Pick Up & Return Time:{{$order->start_time}} - {{$order->end_time}}</span>
                            <span>Vehicle Pickup Address: {{$order->location}}</span>
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                            <tr>
                                <th style="color: #333333">CARS</th>
                                <th style="color: #333333" class="text-center" width="10%">PRICE/DAYS</th>
                                <th style="color: #333333" class="text-center" width="10%">DAYS</th>
                                <th style="color: #333333" class="text-right" width="20%">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="money_total">
                                <td>
                                    <span class="text-inverse">Name</span><br>
                                    <small>sdfghjk</small>
                                </td>
                                <td class="text-center">$</td>
                                <td class="text-center">{{$order->num_of_days}} days</td>
                                <td class="text-right">${{$order->num_of_days}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <div class="invoice-price" style="background-color: #d2e8d1">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>TOTAL</small>
                                    <span class="text-inverse">{{$subtotal}}</span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus text-muted"></i>
                                </div>
                                <div class="sub-price">
                                    <small>VAT</small>
                                    <span class="text-inverse">10%</span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus text-muted"></i>
                                </div>
                                <div class="sub-price">
                                    <small>DEPOSIT</small>
                                    <span class="text-inverse">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right" style="background-color: #1ecb15">
                            <h5 style="color: white; text-align: left">TOTAL</h5> <span class="f-w-600">$4508.00</span>
                        </div>
                    </div>
                    <!-- end invoice-price -->
                    <div style="margin: 50px 60px; display: flex">
                        <div>
                            <h5>Payment Methods</h5>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    COD
                                    <input name="payment_method"  @if(old("payment_method")== "COD") checked @endif value="COD" type="radio" id="payment">
                                    <span class="checkmark"></span>
                                    @error("payment_method")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input name="payment_method"  @if(old("payment_method")== "Paypal") checked @endif  value="Paypal" type="radio" id="paypal">
                                    <span class="checkmark"></span>
                                    @error("payment_method")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn-main btn-fullwidth" style="width: 250px; height: 45px; margin-left: 65%">PAY</button>
                    </div>

                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->
                <div class="invoice-note">
                    * The vehicle is guaranteed to be clean, as shown in the pictures provided.<br>
                    * Desire to give tenants the best experience.<br>
                    * For any damage, errors or any wishes, please contact the company.
                </div>
                <!-- end invoice-note -->
            </div>
        </div>
    </div>

@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
<style>
    body{
        margin-top:20px;
        background:#eee;
    }
    .money_total td {
        color: black;
    }


    .invoice {
        background: #fff;
        padding: 20px
    }

    .invoice-company {
        font-size: 20px
    }

    .invoice-header {
        margin: 0 -20px;
        background: #f0f3f4;
        padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #2d353c;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 300
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }
</style>
</html>


