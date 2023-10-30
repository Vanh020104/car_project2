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

<!-- content begin -->
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="images/background/6.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Vehicle status</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->
    <div class="card p-4 rounded-5 mb25" style="margin: 30px 100px">
        <h4>List of vehicle status</h4>

        <table class="table de-table" >
            <thead>
            <tr>
                <th scope="col"><span class="text-uppercase fs-12 text-gray"> ID</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Thumbnail</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Price</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Action</span></th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td><span class="d-lg-none d-sm-block"> ID</span><div class="badge bg-gray-100 text-dark">{{$order->order_id}}</div></td>
                    <td><span class="d-lg-none d-sm-block" style="width: 50%">Car Name</span><span class="bold">{{$order->name }}</span></td>
                    <td><span class="d-lg-none d-sm-block">Thumbnail</span><img alt="{{ $order->name }}" style="border-radius: 8px;margin-bottom: 15px;margin-left: 25px" width="200px" src="{{$order->thumbnail}}" /></td>
                    <td><span class="d-lg-none d-sm-block">Price</span>{{$order->price}}</td>
                    <td><span class="d-lg-none d-sm-block">Status</span>{!! $order->getStatus() !!}</td>
                    <td><span class="d-lg-none d-sm-block">Action</span>
                        @if($order->status==1)
                            <a href="#" class="btn btn-primary">Extension</a>
                        @elseif($order->status==6)
                            <a href="#" class="btn btn-danger">Car rental</a>
                        @endif

                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- resources/views/date-form.blade.php -->


@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
<!-- content close -->

</body>
<style>
</style>
</html>

