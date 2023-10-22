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
<div class="container">
    <h1 class="text-center">Thank you</h1>
    <h3 class="text-center mb-3">Your order #{{$order->id}} has been placed</h3>
    <h3>Danh sách sản phẩm của đơn hàng:</h3>
    <table class="table mt-3">
        <thead>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        </thead>
        <tbody>
        @foreach($order->Products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{$item->thumbnail}}" width="120"/></td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->price}}</td>
                <td>{{$item->pivot->buy_qty}}</td>
                <td>{{$item->pivot->buy_qty*$item->pivot->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($order->payment_method == "Paypal" && !$order->is_paid)
        <a href="#" class="btn btn-warning">Thanh toán lại</a>
    @endif
</div>
</body>
</html>
