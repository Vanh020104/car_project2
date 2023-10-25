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
                        <h1>Error table</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->
    <div class="card p-4 rounded-5 mb25">
        <h4>Detailed price list</h4>

        <table class="table de-table" style="margin: 0 100px 0 100px">
            <thead>
            <tr>
                <th scope="col"><span class="text-uppercase fs-12 text-gray"> ID</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Error Name</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Price</span></th>
                <th scope="col"><span class="text-uppercase fs-12 text-gray">Severity</span></th>

            </tr>
            </thead>
            <tbody>
            @foreach($errors as $error)
            <tr>
                <td><span class="d-lg-none d-sm-block"> ID</span><div class="badge bg-gray-100 text-dark">#{{$error->id}}</div></td>
                <td><span class="d-lg-none d-sm-block" style="width: 50%">Error Name</span><span class="bold">{{$error->name}}</span></td>
                <td><span class="d-lg-none d-sm-block">Price</span>${{$error->price}}</td>
                <td><span class="d-lg-none d-sm-block">Severity</span>{{$error->severity}}</td>

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


