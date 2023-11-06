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

<body onload="initialize()">
<div class="container" style="margin-top: 100px">
    <div class="text-center" style="margin: 20px 0">

        <svg xmlns="http://www.w3.org/2000/svg" class="svg-success" viewBox="0 0 24 24">
            <g stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                <circle class="success-circle-outline" cx="12" cy="12" r="11.5"/>
                <circle class="success-circle-fill" cx="12" cy="12" r="11.5"/>
                <polyline class="success-tick" points="17,8.5 9.5,15.5 7,13"/>
            </g>
        </svg>

    </div>
    <h1 class="text-center">Thank you</h1>
    <h3 class="text-center mb-3">Your order #{{$order->id}} has been placed</h3>
    <h3>Danh sách sản phẩm của đơn hàng:</h3>
    <table class="table mt-3">
        <thead>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Time</th>
        <th>Total</th>
        <th>Deposit</th>
        </thead>
        <tbody>
        @foreach($order->Products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{$item->thumbnail}}" width="120"/></td>
                <td>{{$item->name}}</td>
                <td>${{$item->pivot->price}}</td>
                <td  >{{$item->pivot->buy_qty}}</td>
                <td>${{$order->grand_total}}</td>
                <td>${{$item->deposit}}</td>

            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="btn-main btn-fullwidth" style="width: 200px; height: 45px; margin: 40px 0; padding: 10px 30px">
        <a href="#" class="primary-btn cart-btn" style="background-color: #1ecb15; color: white; border-radius: 5px">CONTINUE TO RENT</a>
    </div>

</div>
</body>
</html>
