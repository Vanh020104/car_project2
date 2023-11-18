<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Home-exam_php</title>
    <meta charset="UTF-8">
    <base href="/">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files
    ================================================== -->

    @yield("before_css")
    @include("user.layouts.head")
    @yield("after_css")
    @yield("css_rating")
</head>

<body onload="initialize()">
<div id="wrapper">

    <!-- page preloader begin -->
    <div id="de-preloader"></div>
    <!-- page preloader close -->

    <!-- header begin -->
    @include("user.layouts.hearder")
    <!-- header close -->
    <!-- content begin -->
    <div >
        @yield("content")
    </div>
    <!-- footer begin -->
    @include("user.layouts.footer")
    <!-- footer close -->
</div>

<!-- Javascript Files
================================================== -->
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
@yield("script_rating")
</body>
</html>
