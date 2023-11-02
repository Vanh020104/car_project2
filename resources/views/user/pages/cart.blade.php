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
        <img src="images/background/2.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Cart</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <div class="container">
        @if(count($cart)==0)
            <p class="alert alert-success" style="text-align: center; margin: 80px 0">There are no cars in the cart!</p>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table" style="margin-top: 50px; font-family: Outfit; font-weight: 300; font-size: 16px">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Cars List</th>
                                <th>Name</th>
                                <th>Price/days</th>
                                <th>Time</th>
                                @foreach($cart as $item)
                                @if($item->start_date !== $item->end_date)
                                        <th>Start_date</th>
                                        <th>End_date</th>
                                @else

                                        <th>Rent date</th>
                                @endif
                                @endforeach
                                <th>Deposit</th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{$item->thumbnail}}" width="100" alt="">

                                    </td>
                                    <td>
                                        <h5>{{$item->name}}</h5>
                                    </td>
                                    <td>
                                        @if($item->start_date == $item->end_date)
                                            <h5> ${{$item->hourly_price}}</h5>
                                        @else
                                            <h5> ${{$item->price}}</h5>
                                        @endif
                                    </td>
                                    <td>
                                        <h5>{{$item->buy_qty}}
                                            @if($item->start_date == $item->end_date)
                                                hours
                                            @else
                                                days
                                            @endif
                                        </h5>
                                    </td>
                                        @if($item->start_date !== $item->end_date)
                                            <td>

                                                <h5>{{$item->start_date}} </h5>

                                            </td>
                                            <td>
                                                <h5>{{$item->end_date}} </h5>
                                            </td>
                                        @else
                                        <td>
                                            <h5>{{$item->end_date}} </h5>
                                        </td>
                                        @endif
                                    <td>
                                        <h5>${{$item->deposit}}</h5>
                                    </td>
                                    <td>
                                        <h5>${{$total}}</h5>
                                    </td>


                                    <td>
                                        <a  href="{{url("checkout")}}" class="btn-main btn-fullwidth" style="width: 200px">Rent Now</a>
                                    </td>


                                    <td class="shoping__cart__item__close">
                                        <a onclick="return confirm('Definitely want to delete the car: <?php echo $item->name ?>?' )" href="/delete-from-cart/{{ $item->id }}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 50px">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn" style="background-color: #1ecb15; color: white; border-radius: 5px">CONTINUE TO RENT</a>
                        <a onclick="return confirm('Are you sure you want to delete them all?' )" href="/clear-cart" class="primary-btn cart-btn cart-btn-right "><span class="icon_loading"></span>
                            Clear Cart</a>
                    </div>
                </div>

            </div>
        @endif
    </div>
@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
<style>
    {{--    css cho phần continue shoping--}}

/******************************************************************
  Template Name: Ogani
  Description:  Ogani eCommerce  HTML Template
  Author: Colorlib
  Author URI: https://colorlib.com
  Version: 1.0
  Created: Colorlib
******************************************************************/

    /*------------------------------------------------------------------
    [Table of contents]

    1.  Template default CSS
        1.1	Variables
        1.2	Mixins
        1.3	Flexbox
        1.4	Reset
    2.  Helper Css
    3.  Header Section
    4.  Hero Section
    5.  Service Section
    6.  Categories Section
    7.  Featured Section
    8.  Latest Product Section
    9.  Contact
    10.  Footer Style
    -------------------------------------------------------------------*/

    /*----------------------------------------*/
    /* Template default CSS
    /*----------------------------------------*/

    html,
    body {
        height: 100%;
        font-family: "Cairo", sans-serif;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        color: #111111;
        font-weight: 400;
        font-family: "Cairo", sans-serif;
    }

    h1 {
        font-size: 70px;
    }

    h2 {
        font-size: 36px;
    }

    h3 {
        font-size: 30px;
    }

    h4 {
        font-size: 24px;
    }

    h5 {
        font-size: 18px;
    }

    h6 {
        font-size: 16px;
    }

    p {
        font-size: 16px;
        font-family: "Cairo", sans-serif;
        color: #6f6f6f;
        font-weight: 400;
        line-height: 26px;
        margin: 0 0 15px 0;
    }

    img {
        max-width: 100%;
    }

    input:focus,
    select:focus,
    button:focus,
    textarea:focus {
        outline: none;
    }

    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
        color: #ffffff;
    }

    ul,
    ol {
        padding: 0;
        margin: 0;
    }

    /*---------------------
      Helper CSS
    -----------------------*/

    .section-title {
        margin-bottom: 50px;
        text-align: center;
    }

    .section-title h2 {
        color: #1c1c1c;
        font-weight: 700;
        position: relative;
    }

    .section-title h2:after {
        position: absolute;
        left: 0;
        bottom: -15px;
        right: 0;
        height: 4px;
        width: 80px;
        background: #7fad39;
        content: "";
        margin: 0 auto;
    }

    .set-bg {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top center;
    }

    .spad {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .text-white h1,
    .text-white h2,
    .text-white h3,
    .text-white h4,
    .text-white h5,
    .text-white h6,
    .text-white p,
    .text-white span,
    .text-white li,
    .text-white a {
        color: #fff;
    }

    /* buttons */

    .primary-btn {
        display: inline-block;
        font-size: 14px;
        padding: 10px 28px 10px;
        color: #ffffff;
        text-transform: uppercase;
        font-weight: 700;
        background: #7fad39;
        letter-spacing: 2px;
    }

    .site-btn {
        font-size: 14px;
        color: #ffffff;
        font-weight: 800;
        text-transform: uppercase;
        display: inline-block;
        padding: 13px 30px 12px;
        background: #7fad39;
        border: none;
    }

    /* Preloder */

    #preloder {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999999;
        background: #000;
    }

    .loader {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -13px;
        margin-left: -13px;
        border-radius: 60px;
        animation: loader 0.8s linear infinite;
        -webkit-animation: loader 0.8s linear infinite;
    }

    @keyframes loader {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            border: 4px solid #f44336;
            border-left-color: transparent;
        }
        50% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
            border: 4px solid #673ab7;
            border-left-color: transparent;
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
            border: 4px solid #f44336;
            border-left-color: transparent;
        }
    }

    @-webkit-keyframes loader {
        0% {
            -webkit-transform: rotate(0deg);
            border: 4px solid #f44336;
            border-left-color: transparent;
        }
        50% {
            -webkit-transform: rotate(180deg);
            border: 4px solid #673ab7;
            border-left-color: transparent;
        }
        100% {
            -webkit-transform: rotate(360deg);
            border: 4px solid #f44336;
            border-left-color: transparent;
        }
    }

    /*---------------------
      Header
    -----------------------*/

    .header__top {
        background: #f5f5f5;
    }

    .header__top__left {
        padding: 10px 0 13px;
    }

    .header__top__left ul li {
        font-size: 14px;
        color: #1c1c1c;
        display: inline-block;
        margin-right: 45px;
        position: relative;
    }

    .header__top__left ul li:after {
        position: absolute;
        right: -25px;
        top: 1px;
        height: 20px;
        width: 1px;
        background: #000000;
        opacity: 0.1;
        content: "";
    }

    .header__top__left ul li:last-child {
        margin-right: 0;
    }

    .header__top__left ul li:last-child:after {
        display: none;
    }

    .header__top__left ul li i {
        color: #252525;
        margin-right: 5px;
    }

    .header__top__right {
        text-align: right;
        padding: 10px 0 13px;
    }

    .header__top__right__social {
        position: relative;
        display: inline-block;
        margin-right: 35px;
    }

    .header__top__right__social:after {
        position: absolute;
        right: -20px;
        top: 1px;
        height: 20px;
        width: 1px;
        background: #000000;
        opacity: 0.1;
        content: "";
    }

    .header__top__right__social a {
        font-size: 14px;
        display: inline-block;
        color: #1c1c1c;
        margin-right: 20px;
    }

    .header__top__right__social a:last-child {
        margin-right: 0;
    }

    .header__top__right__language {
        position: relative;
        display: inline-block;
        margin-right: 40px;
        cursor: pointer;
    }

    .header__top__right__language:hover ul {
        top: 23px;
        opacity: 1;
        visibility: visible;
    }

    .header__top__right__language:after {
        position: absolute;
        right: -21px;
        top: 1px;
        height: 20px;
        width: 1px;
        background: #000000;
        opacity: 0.1;
        content: "";
    }

    .header__top__right__language img {
        margin-right: 6px;
    }

    .header__top__right__language div {
        font-size: 14px;
        color: #1c1c1c;
        display: inline-block;
        margin-right: 4px;
    }

    .header__top__right__language span {
        font-size: 14px;
        color: #1c1c1c;
        position: relative;
        top: 2px;
    }

    .header__top__right__language ul {
        background: #222222;
        width: 100px;
        text-align: left;
        padding: 5px 0;
        position: absolute;
        left: 0;
        top: 43px;
        z-index: 9;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .header__top__right__language ul li {
        list-style: none;
    }

    .header__top__right__language ul li a {
        font-size: 14px;
        color: #ffffff;
        padding: 5px 10px;
    }

    .header__top__right__auth {
        display: inline-block;
    }

    .header__top__right__auth a {
        display: block;
        font-size: 14px;
        color: #1c1c1c;
    }

    .header__top__right__auth a i {
        margin-right: 6px;
    }

    .header__logo {
        padding: 15px 0;
    }

    .header__logo a {
        display: inline-block;
    }

    .header__menu {
        padding: 24px 0;
    }

    .header__menu ul li {
        list-style: none;
        display: inline-block;
        margin-right: 50px;
        position: relative;
    }

    .header__menu ul li .header__menu__dropdown {
        position: absolute;
        left: 0;
        top: 50px;
        background: #222222;
        width: 180px;
        z-index: 9;
        padding: 5px 0;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
        opacity: 0;
        visibility: hidden;
    }

    .header__menu ul li .header__menu__dropdown li {
        margin-right: 0;
        display: block;
    }

    .header__menu ul li .header__menu__dropdown li:hover>a {
        color: #7fad39;
    }

    .header__menu ul li .header__menu__dropdown li a {
        text-transform: capitalize;
        color: #ffffff;
        font-weight: 400;
        padding: 5px 15px;
    }

    .header__menu ul li.active a {
        color: #7fad39;
    }

    .header__menu ul li:hover .header__menu__dropdown {
        top: 30px;
        opacity: 1;
        visibility: visible;
    }

    .header__menu ul li:hover>a {
        color: #7fad39;
    }

    .header__menu ul li:last-child {
        margin-right: 0;
    }

    .header__menu ul li a {
        font-size: 14px;
        color: #252525;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 2px;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
        padding: 5px 0;
        display: block;
    }

    .header__cart {
        text-align: right;
        padding: 24px 0;
    }

    .header__cart ul {
        display: inline-block;
        margin-right: 25px;
    }

    .header__cart ul li {
        list-style: none;
        display: inline-block;
        margin-right: 15px;
    }

    .header__cart ul li:last-child {
        margin-right: 0;
    }

    .header__cart ul li a {
        position: relative;
    }

    .header__cart ul li a i {
        font-size: 18px;
        color: #1c1c1c;
    }

    .header__cart ul li a span {
        height: 13px;
        width: 13px;
        background: #7fad39;
        font-size: 10px;
        color: #ffffff;
        line-height: 13px;
        text-align: center;
        font-weight: 700;
        display: inline-block;
        border-radius: 50%;
        position: absolute;
        top: 0;
        right: -12px;
    }

    .header__cart .header__cart__price {
        font-size: 14px;
        color: #6f6f6f;
        display: inline-block;
    }

    .header__cart .header__cart__price span {
        color: #252525;
        font-weight: 700;
    }

    .humberger__menu__wrapper {
        display: none;
    }

    .humberger__open {
        display: none;
    }

    /*---------------------
      Hero
    -----------------------*/

    .hero {
        padding-bottom: 50px;
    }

    .hero.hero-normal {
        padding-bottom: 30px;
    }

    .hero.hero-normal .hero__categories {
        position: relative;
    }

    .hero.hero-normal .hero__categories ul {
        display: none;
        position: absolute;
        left: 0;
        top: 46px;
        width: 100%;
        z-index: 9;
        background: #ffffff;
    }

    .hero.hero-normal .hero__search {
        margin-bottom: 0;
    }

    .hero__categories__all {
        background: #7fad39;
        position: relative;
        padding: 10px 25px 10px 40px;
        cursor: pointer;
    }

    .hero__categories__all i {
        font-size: 16px;
        color: #ffffff;
        margin-right: 10px;
    }

    .hero__categories__all span {
        font-size: 18px;
        font-weight: 700;
        color: #ffffff;
    }

    .hero__categories__all:after {
        position: absolute;
        right: 18px;
        top: 9px;
        content: "3";
        font-family: "ElegantIcons";
        font-size: 18px;
        color: #ffffff;
    }

    .hero__categories ul {
        border: 1px solid #ebebeb;
        padding-left: 40px;
        padding-top: 10px;
        padding-bottom: 12px;
    }

    .hero__categories ul li {
        list-style: none;
    }

    .hero__categories ul li a {
        font-size: 16px;
        color: #1c1c1c;
        line-height: 39px;
        display: block;
    }

    .hero__search {
        overflow: hidden;
        margin-bottom: 30px;
    }

    .hero__search__form {
        width: 610px;
        height: 50px;
        border: 1px solid #ebebeb;
        position: relative;
        float: left;
    }

    .hero__search__form form .hero__search__categories {
        width: 30%;
        float: left;
        font-size: 16px;
        color: #1c1c1c;
        font-weight: 700;
        padding-left: 18px;
        padding-top: 11px;
        position: relative;
    }

    .hero__search__form form .hero__search__categories:after {
        position: absolute;
        right: 0;
        top: 14px;
        height: 20px;
        width: 1px;
        background: #000000;
        opacity: 0.1;
        content: "";
    }

    .hero__search__form form .hero__search__categories span {
        position: absolute;
        right: 14px;
        top: 14px;
    }

    .hero__search__form form input {
        width: 70%;
        border: none;
        height: 48px;
        font-size: 16px;
        color: #b2b2b2;
        padding-left: 20px;
    }

    .hero__search__form form input::placeholder {
        color: #b2b2b2;
    }

    .hero__search__form form button {
        position: absolute;
        right: 0;
        top: -1px;
        height: 50px;
    }

    .hero__search__phone {
        float: right;
    }

    .hero__search__phone__icon {
        font-size: 18px;
        color: #7fad39;
        height: 50px;
        width: 50px;
        background: #f5f5f5;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
        float: left;
        margin-right: 20px;
    }

    .hero__search__phone__text {
        overflow: hidden;
    }

    .hero__search__phone__text h5 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .hero__search__phone__text span {
        font-size: 14px;
        color: #6f6f6f;
    }

    .hero__item {
        height: 431px;
        display: flex;
        align-items: center;
        padding-left: 75px;
    }

    .hero__text span {
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 4px;
        color: #7fad39;
    }

    .hero__text h2 {
        font-size: 46px;
        color: #252525;
        line-height: 52px;
        font-weight: 700;
        margin: 10px 0;
    }

    .hero__text p {
        margin-bottom: 35px;
    }

    /*---------------------
      Categories
    -----------------------*/

    .categories__item {
        height: 270px;
        position: relative;
    }

    .categories__item h5 {
        position: absolute;
        left: 0;
        width: 100%;
        padding: 0 20px;
        bottom: 20px;
        text-align: center;
    }

    .categories__item h5 a {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 12px 0 10px;
        background: #ffffff;
        display: block;
    }

    .categories__slider .col-lg-3 {
        max-width: 100%;
    }

    .categories__slider.owl-carousel .owl-nav button {
        font-size: 18px;
        color: #1c1c1c;
        height: 70px;
        width: 30px;
        line-height: 70px;
        text-align: center;
        border: 1px solid #ebebeb;
        position: absolute;
        left: -35px;
        top: 50%;
        -webkit-transform: translateY(-35px);
        background: #ffffff;
    }

    .categories__slider.owl-carousel .owl-nav button.owl-next {
        left: auto;
        right: -35px;
    }

    /*---------------------
      Featured
    -----------------------*/

    .featured {
        padding-top: 80px;
        padding-bottom: 40px;
    }

    .featured__controls {
        text-align: center;
        margin-bottom: 50px;
    }

    .featured__controls ul li {
        list-style: none;
        font-size: 18px;
        color: #1c1c1c;
        display: inline-block;
        margin-right: 25px;
        position: relative;
        cursor: pointer;
    }

    .featured__controls ul li.active:after {
        opacity: 1;
    }

    .featured__controls ul li:after {
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background: #7fad39;
        content: "";
        opacity: 0;
    }

    .featured__controls ul li:last-child {
        margin-right: 0;
    }

    .featured__item {
        margin-bottom: 50px;
    }

    .featured__item:hover .featured__item__pic .featured__item__pic__hover {
        bottom: 20px;
    }

    .featured__item__pic {
        height: 270px;
        position: relative;
        overflow: hidden;
        background-position: center center;
    }

    .featured__item__pic__hover {
        position: absolute;
        left: 0;
        bottom: -50px;
        width: 100%;
        text-align: center;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .featured__item__pic__hover li {
        list-style: none;
        display: inline-block;
        margin-right: 6px;
    }

    .featured__item__pic__hover li:last-child {
        margin-right: 0;
    }

    .featured__item__pic__hover li:hover a {
        background: #7fad39;
        border-color: #7fad39;
    }

    .featured__item__pic__hover li:hover a i {
        color: #ffffff;
        transform: rotate(360deg);
    }

    .featured__item__pic__hover li a {
        font-size: 16px;
        color: #1c1c1c;
        height: 40px;
        width: 40px;
        line-height: 40px;
        text-align: center;
        border: 1px solid #ebebeb;
        background: #ffffff;
        display: block;
        border-radius: 50%;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .featured__item__pic__hover li a i {
        position: relative;
        transform: rotate(0);
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .featured__item__text {
        text-align: center;
        padding-top: 15px;
    }

    .featured__item__text h6 {
        margin-bottom: 10px;
    }

    .featured__item__text h6 a {
        color: #252525;
    }

    .featured__item__text h5 {
        color: #252525;
        font-weight: 700;
    }

    /*---------------------
      Latest Product
    -----------------------*/

    .latest-product {
        padding-top: 80px;
        padding-bottom: 0;
    }

    .latest-product__text h4 {
        font-weight: 700;
        color: #1c1c1c;
        margin-bottom: 45px;
    }

    .latest-product__slider.owl-carousel .owl-nav {
        position: absolute;
        right: 20px;
        top: -75px;
    }

    .latest-product__slider.owl-carousel .owl-nav button {
        height: 30px;
        width: 30px;
        background: #F3F6FA;
        border: 1px solid #e6e6e6;
        font-size: 14px;
        color: #636363;
        margin-right: 10px;
        line-height: 30px;
        text-align: center;
    }

    .latest-product__slider.owl-carousel .owl-nav button span {
        font-weight: 700;
    }

    .latest-product__slider.owl-carousel .owl-nav button:last-child {
        margin-right: 0;
    }

    .latest-product__item {
        margin-bottom: 20px;
        overflow: hidden;
        display: block;
    }

    .latest-product__item__pic {
        float: left;
        margin-right: 26px;
    }

    .latest-product__item__pic img {
        height: 110px;
        width: 110px;
    }

    .latest-product__item__text {
        overflow: hidden;
        padding-top: 10px;
    }

    .latest-product__item__text h6 {
        color: #252525;
        margin-bottom: 8px;
    }

    .latest-product__item__text span {
        font-size: 18px;
        display: block;
        color: #252525;
        font-weight: 700;
    }

    /*---------------------
      Form BLog
    -----------------------*/

    .from-blog {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .from-blog .blog__item {
        margin-bottom: 30px;
    }

    .from-blog__title {
        margin-bottom: 70px;
    }

    /*---------------------
      Breadcrumb
    -----------------------*/

    .breadcrumb-section {
        display: flex;
        align-items: center;
        padding: 45px 0 40px;
    }

    .breadcrumb__text h2 {
        font-size: 46px;
        color: #ffffff;
        font-weight: 700;
    }

    .breadcrumb__option a {
        display: inline-block;
        font-size: 16px;
        color: #ffffff;
        font-weight: 700;
        margin-right: 20px;
        position: relative;
    }

    .breadcrumb__option a:after {
        position: absolute;
        right: -12px;
        top: 13px;
        height: 1px;
        width: 10px;
        background: #ffffff;
        content: "";
    }

    .breadcrumb__option span {
        display: inline-block;
        font-size: 16px;
        color: #ffffff;
    }

    /*---------------------
      Sidebar
    -----------------------*/

    .sidebar__item {
        margin-bottom: 35px;
    }

    .sidebar__item.sidebar__item__color--option {
        overflow: hidden;
    }

    .sidebar__item h4 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .sidebar__item ul li {
        list-style: none;
    }

    .sidebar__item ul li a {
        font-size: 16px;
        color: #1c1c1c;
        line-height: 39px;
        display: block;
    }

    .sidebar__item .latest-product__text {
        position: relative;
    }

    .sidebar__item .latest-product__text h4 {
        margin-bottom: 45px;
    }

    .sidebar__item .latest-product__text .owl-carousel .owl-nav {
        right: 0;
    }

    .price-range-wrap .range-slider {
        margin-top: 20px;
    }

    .price-range-wrap .range-slider .price-input {
        position: relative;
    }

    .price-range-wrap .range-slider .price-input:after {
        position: absolute;
        left: 38px;
        top: 13px;
        height: 1px;
        width: 5px;
        background: #dd2222;
        content: "";
    }

    .price-range-wrap .range-slider .price-input input {
        font-size: 16px;
        color: #dd2222;
        font-weight: 700;
        max-width: 20%;
        border: none;
        display: inline-block;
    }

    .price-range-wrap .price-range {
        border-radius: 0;
    }

    .price-range-wrap .price-range.ui-widget-content {
        border: none;
        background: #ebebeb;
        height: 5px;
    }

    .price-range-wrap .price-range.ui-widget-content .ui-slider-handle {
        height: 13px;
        width: 13px;
        border-radius: 50%;
        background: #ffffff;
        border: none;
        -webkit-box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
        outline: none;
        cursor: pointer;
    }

    .price-range-wrap .price-range .ui-slider-range {
        background: #dd2222;
        border-radius: 0;
    }

    .price-range-wrap .price-range .ui-slider-range.ui-corner-all.ui-widget-header:last-child {
        background: #dd2222;
    }

    .sidebar__item__color {
        float: left;
        width: 40%;
    }

    .sidebar__item__color.sidebar__item__color--white label:after {
        border: 2px solid #333333;
        background: transparent;
    }

    .sidebar__item__color.sidebar__item__color--gray label:after {
        background: #E9A625;
    }

    .sidebar__item__color.sidebar__item__color--red label:after {
        background: #D62D2D;
    }

    .sidebar__item__color.sidebar__item__color--black label:after {
        background: #252525;
    }

    .sidebar__item__color.sidebar__item__color--blue label:after {
        background: #249BC8;
    }

    .sidebar__item__color.sidebar__item__color--green label:after {
        background: #3CC032;
    }

    .sidebar__item__color label {
        font-size: 16px;
        color: #333333;
        position: relative;
        padding-left: 32px;
        cursor: pointer;
    }

    .sidebar__item__color label input {
        position: absolute;
        visibility: hidden;
    }

    .sidebar__item__color label:after {
        position: absolute;
        left: 0;
        top: 5px;
        height: 14px;
        width: 14px;
        background: #222;
        content: "";
        border-radius: 50%;
    }

    .sidebar__item__size {
        display: inline-block;
        margin-right: 16px;
        margin-bottom: 10px;
    }

    .sidebar__item__size label {
        font-size: 12px;
        color: #6f6f6f;
        display: inline-block;
        padding: 8px 25px 6px;
        background: #f5f5f5;
        cursor: pointer;
        margin-bottom: 0;
    }

    .sidebar__item__size label input {
        position: absolute;
        visibility: hidden;
    }

    /*---------------------
      Shop Grid
    -----------------------*/

    .product {
        padding-top: 80px;
        padding-bottom: 80px;
    }

    .product__discount {
        padding-bottom: 50px;
    }

    .product__discount__title {
        text-align: left;
        margin-bottom: 65px;
    }

    .product__discount__title h2 {
        display: inline-block;
    }

    .product__discount__title h2:after {
        margin: 0;
        width: 100%;
    }

    .product__discount__item:hover .product__discount__item__pic .product__item__pic__hover {
        bottom: 20px;
    }

    .product__discount__item__pic {
        height: 270px;
        position: relative;
        overflow: hidden;
    }

    .product__discount__item__pic .product__discount__percent {
        height: 45px;
        width: 45px;
        background: #dd2222;
        border-radius: 50%;
        font-size: 14px;
        color: #ffffff;
        line-height: 45px;
        text-align: center;
        position: absolute;
        left: 15px;
        top: 15px;
    }

    .product__item__pic__hover {
        position: absolute;
        left: 0;
        bottom: -50px;
        width: 100%;
        text-align: center;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .product__item__pic__hover li {
        list-style: none;
        display: inline-block;
        margin-right: 6px;
    }

    .product__item__pic__hover li:last-child {
        margin-right: 0;
    }

    .product__item__pic__hover li:hover a {
        background: #7fad39;
        border-color: #7fad39;
    }

    .product__item__pic__hover li:hover a i {
        color: #ffffff;
        transform: rotate(360deg);
    }

    .product__item__pic__hover li a {
        font-size: 16px;
        color: #1c1c1c;
        height: 40px;
        width: 40px;
        line-height: 40px;
        text-align: center;
        border: 1px solid #ebebeb;
        background: #ffffff;
        display: block;
        border-radius: 50%;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .product__item__pic__hover li a i {
        position: relative;
        transform: rotate(0);
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .product__discount__item__text {
        text-align: center;
        padding-top: 20px;
    }

    .product__discount__item__text span {
        font-size: 14px;
        color: #b2b2b2;
        display: block;
        margin-bottom: 4px;
    }

    .product__discount__item__text h5 {
        margin-bottom: 6px;
    }

    .product__discount__item__text h5 a {
        color: #1c1c1c;
    }

    .product__discount__item__text .product__item__price {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
    }

    .product__discount__item__text .product__item__price span {
        display: inline-block;
        font-weight: 400;
        text-decoration: line-through;
        margin-left: 10px;
    }

    .product__discount__slider .col-lg-4 {
        max-width: 100%;
    }

    .product__discount__slider.owl-carousel .owl-dots {
        text-align: center;
        margin-top: 30px;
    }

    .product__discount__slider.owl-carousel .owl-dots button {
        height: 12px;
        width: 12px;
        border: 1px solid #b2b2b2;
        border-radius: 50%;
        margin-right: 12px;
    }

    .product__discount__slider.owl-carousel .owl-dots button.active {
        background: #707070;
        border-color: #6f6f6f;
    }

    .product__discount__slider.owl-carousel .owl-dots button:last-child {
        margin-right: 0;
    }

    .filter__item {
        padding-top: 45px;
        border-top: 1px solid #ebebeb;
        padding-bottom: 20px;
    }

    .filter__sort {
        margin-bottom: 15px;
    }

    .filter__sort span {
        font-size: 16px;
        color: #6f6f6f;
        display: inline-block;
    }

    .filter__sort .nice-select {
        background-color: #fff;
        border-radius: 0;
        border: none;
        display: inline-block;
        float: none;
        height: 0;
        line-height: 0;
        padding-left: 18px;
        padding-right: 30px;
        font-size: 16px;
        color: #1c1c1c;
        font-weight: 700;
        cursor: pointer;
    }

    .filter__sort .nice-select span {
        color: #1c1c1c;
    }

    .filter__sort .nice-select:after {
        border-bottom: 1.5px solid #1c1c1c;
        border-right: 1.5px solid #1c1c1c;
        height: 8px;
        margin-top: 0;
        right: 16px;
        width: 8px;
        top: -5px;
    }

    .filter__sort .nice-select.open .list {
        opacity: 1;
        pointer-events: auto;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
    }

    .filter__sort .nice-select .list {
        border-radius: 0;
        margin-top: 0;
        top: 15px;
    }

    .filter__sort .nice-select .option {
        line-height: 30px;
        min-height: 30px;
    }

    .filter__found {
        text-align: center;
        margin-bottom: 15px;
    }

    .filter__found h6 {
        font-size: 16px;
        color: #b2b2b2;
    }

    .filter__found h6 span {
        color: #1c1c1c;
        font-weight: 700;
        margin-right: 5px;
    }

    .filter__option {
        text-align: right;
        margin-bottom: 15px;
    }

    .filter__option span {
        font-size: 24px;
        color: #b2b2b2;
        margin-right: 10px;
        cursor: pointer;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .filter__option span:last-child {
        margin: 0;
    }

    .filter__option span:hover {
        color: #7fad39;
    }

    .product__item {
        margin-bottom: 50px;
    }

    .product__item:hover .product__item__pic .product__item__pic__hover {
        bottom: 20px;
    }

    .product__item__pic {
        height: 270px;
        position: relative;
        overflow: hidden;
    }

    .product__item__pic__hover {
        position: absolute;
        left: 0;
        bottom: -50px;
        width: 100%;
        text-align: center;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .product__item__pic__hover li {
        list-style: none;
        display: inline-block;
        margin-right: 6px;
    }

    .product__item__pic__hover li:last-child {
        margin-right: 0;
    }

    .product__item__pic__hover li:hover a {
        background: #7fad39;
        border-color: #7fad39;
    }

    .product__item__pic__hover li:hover a i {
        color: #ffffff;
        transform: rotate(360deg);
    }

    .product__item__pic__hover li a {
        font-size: 16px;
        color: #1c1c1c;
        height: 40px;
        width: 40px;
        line-height: 40px;
        text-align: center;
        border: 1px solid #ebebeb;
        background: #ffffff;
        display: block;
        border-radius: 50%;
        -webkit-transition: all, 0.5s;
        -moz-transition: all, 0.5s;
        -ms-transition: all, 0.5s;
        -o-transition: all, 0.5s;
        transition: all, 0.5s;
    }

    .product__item__pic__hover li a i {
        position: relative;
        transform: rotate(0);
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .product__item__text {
        text-align: center;
        padding-top: 15px;
    }

    .product__item__text h6 {
        margin-bottom: 10px;
    }

    .product__item__text h6 a {
        color: #252525;
    }

    .product__item__text h5 {
        color: #252525;
        font-weight: 700;
    }

    .product__pagination,
    .blog__pagination {
        padding-top: 10px;
    }

    .product__pagination a,
    .blog__pagination a {
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 1px solid #b2b2b2;
        font-size: 14px;
        color: #b2b2b2;
        font-weight: 700;
        line-height: 28px;
        text-align: center;
        margin-right: 16px;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .product__pagination a:hover,
    .blog__pagination a:hover {
        background: #7fad39;
        border-color: #7fad39;
        color: #ffffff;
    }

    .product__pagination a:last-child,
    .blog__pagination a:last-child {
        margin-right: 0;
    }

    /*---------------------
      Shop Details
    -----------------------*/

    .product-details {
        padding-top: 80px;
    }

    .product__details__pic__item {
        margin-bottom: 20px;
    }

    .product__details__pic__item img {
        min-width: 100%;
    }

    .product__details__pic__slider img {
        cursor: pointer;
    }

    .product__details__pic__slider.owl-carousel .owl-item img {
        width: auto;
    }

    .product__details__text h3 {
        color: #252525;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .product__details__text .product__details__rating {
        font-size: 14px;
        margin-bottom: 12px;
    }

    .product__details__text .product__details__rating i {
        margin-right: -2px;
        color: #EDBB0E;
    }

    .product__details__text .product__details__rating span {
        color: #dd2222;
        margin-left: 4px;
    }

    .product__details__text .product__details__price {
        font-size: 30px;
        color: #dd2222;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .product__details__text p {
        margin-bottom: 45px;
    }

    .product__details__text .primary-btn {
        padding: 16px 28px 14px;
        margin-right: 6px;
        margin-bottom: 5px;
    }

    .product__details__text .heart-icon {
        display: inline-block;
        font-size: 16px;
        color: #6f6f6f;
        padding: 13px 16px 13px;
        background: #f5f5f5;
    }

    .product__details__text ul {
        border-top: 1px solid #ebebeb;
        padding-top: 40px;
        margin-top: 50px;
    }

    .product__details__text ul li {
        font-size: 16px;
        color: #1c1c1c;
        list-style: none;
        line-height: 36px;
    }

    .product__details__text ul li b {
        font-weight: 700;
        width: 170px;
        display: inline-block;
    }

    .product__details__text ul li span samp {
        color: #dd2222;
    }

    .product__details__text ul li .share {
        display: inline-block;
    }

    .product__details__text ul li .share a {
        display: inline-block;
        font-size: 15px;
        color: #1c1c1c;
        margin-right: 25px;
    }

    .product__details__text ul li .share a:last-child {
        margin-right: 0;
    }

    .product__details__quantity {
        display: inline-block;
        margin-right: 6px;
    }

    .pro-qty {
        width: 140px;
        height: 50px;
        display: inline-block;
        position: relative;
        text-align: center;
        background: #f5f5f5;
        margin-bottom: 5px;
    }

    .pro-qty input {
        height: 100%;
        width: 100%;
        font-size: 16px;
        color: #6f6f6f;
        width: 50px;
        border: none;
        background: #f5f5f5;
        text-align: center;
    }

    .pro-qty .qtybtn {
        width: 35px;
        font-size: 16px;
        color: #6f6f6f;
        cursor: pointer;
        display: inline-block;
    }

    .product__details__tab {
        padding-top: 85px;
    }

    .product__details__tab .nav-tabs {
        border-bottom: none;
        justify-content: center;
        position: relative;
    }

    .product__details__tab .nav-tabs:before {
        position: absolute;
        left: 0;
        top: 12px;
        height: 1px;
        width: 370px;
        background: #ebebeb;
        content: "";
    }

    .product__details__tab .nav-tabs:after {
        position: absolute;
        right: 0;
        top: 12px;
        height: 1px;
        width: 370px;
        background: #ebebeb;
        content: "";
    }

    .product__details__tab .nav-tabs li {
        margin-bottom: 0;
        margin-right: 65px;
    }

    .product__details__tab .nav-tabs li:last-child {
        margin-right: 0;
    }

    .product__details__tab .nav-tabs li a {
        font-size: 16px;
        color: #999999;
        font-weight: 700;
        border: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        padding: 0;
    }

    .product__details__tab .product__details__tab__desc {
        padding-top: 44px;
    }

    .product__details__tab .product__details__tab__desc h6 {
        font-weight: 700;
        color: #333333;
        margin-bottom: 26px;
    }

    .product__details__tab .product__details__tab__desc p {
        color: #666666;
    }

    /*---------------------
      Shop Details
    -----------------------*/

    .related-product {
        padding-bottom: 30px;
    }

    .related__product__title {
        margin-bottom: 70px;
    }

    /*---------------------
      Shop Cart
    -----------------------*/

    .shoping-cart {
        padding-top: 80px;
        padding-bottom: 80px;
    }

    .shoping__cart__table {
        margin-bottom: 30px;
    }

    .shoping__cart__table table {
        width: 100%;
        text-align: center;
    }

    .shoping__cart__table table thead tr {
        border-bottom: 1px solid #ebebeb;
    }

    .shoping__cart__table table thead th {
        font-size: 20px;
        font-weight: 700;
        color: #1c1c1c;
        padding-bottom: 20px;
    }

    .shoping__cart__table table thead th.shoping__product {
        text-align: left;

    }

    .shoping__cart__table table tbody tr td {
        padding-top: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #ebebeb;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__item {
        /*width: 630px;*/
        text-align: left;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__item img {
        display: inline-block;
        margin-right: 25px;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__item h5 {
        color: #1c1c1c;
        display: inline-block;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__price {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        width: 100px;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__total {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        width: 110px;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__item__close {
        text-align: right;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__item__close span {
        font-size: 24px;
        color: #b2b2b2;
        cursor: pointer;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__quantity {
        width: 225px;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty {
        width: 120px;
        height: 40px;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty input {
        color: #1c1c1c;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty input::placeholder {
        color: #1c1c1c;
    }

    .shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty .qtybtn {
        width: 15px;
    }

    .primary-btn.cart-btn {
        color: #6f6f6f;
        padding: 14px 30px 12px;
        background: #f5f5f5;
    }

    .primary-btn.cart-btn span {
        font-size: 14px;
    }

    .primary-btn.cart-btn.cart-btn-right {
        float: right;
    }

    .shoping__discount {
        margin-top: 45px;
    }

    .shoping__discount h5 {
        font-size: 20px;
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .shoping__discount form input {
        width: 255px;
        height: 46px;
        border: 1px solid #cccccc;
        font-size: 16px;
        color: #b2b2b2;
        text-align: center;
        display: inline-block;
        margin-right: 15px;
    }

    .shoping__discount form input::placeholder {
        color: #b2b2b2;
    }

    .shoping__discount form button {
        padding: 15px 30px 11px;
        font-size: 12px;
        letter-spacing: 4px;
        background: #6f6f6f;
    }

    .shoping__checkout {
        background: #f5f5f5;
        padding: 30px;
        padding-top: 20px;
        margin-top: 50px;
    }

    .shoping__checkout h5 {
        color: #1c1c1c;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 28px;
    }

    .shoping__checkout ul {
        margin-bottom: 28px;
    }

    .shoping__checkout ul li {
        font-size: 16px;
        color: #1c1c1c;
        font-weight: 700;
        list-style: none;
        overflow: hidden;
        border-bottom: 1px solid #ebebeb;
        padding-bottom: 13px;
        margin-bottom: 18px;
    }

    .shoping__checkout ul li:last-child {
        padding-bottom: 0;
        border-bottom: none;
        margin-bottom: 0;
    }

    .shoping__checkout ul li span {
        font-size: 18px;
        color: #dd2222;
        float: right;
    }

    .shoping__checkout .primary-btn {
        display: block;
        text-align: center;
    }

    /*---------------------
      Checkout
    -----------------------*/

    .checkout {
        padding-top: 80px;
        padding-bottom: 60px;
    }

    .checkout h6 {
        color: #999999;
        text-align: center;
        background: #f5f5f5;
        border-top: 1px solid #6AB963;
        padding: 12px 0 12px;
        margin-bottom: 75px;
    }

    .checkout h6 span {
        font-size: 16px;
        color: #6AB963;
        margin-right: 5px;
    }

    .checkout h6 a {
        text-decoration: underline;
        color: #999999;
    }

    .checkout__form h4 {
        color: #1c1c1c;
        font-weight: 700;
        border-bottom: 1px solid #e1e1e1;
        padding-bottom: 20px;
        margin-bottom: 25px;
    }

    .checkout__form p {
        column-rule: #b2b2b2;
    }

    .checkout__input {
        margin-bottom: 24px;
    }

    .checkout__input p {
        color: #1c1c1c;
        margin-bottom: 20px;
    }

    .checkout__input p span {
        color: #dd2222;
    }

    .checkout__input input {
        width: 100%;
        height: 46px;
        border: 1px solid #ebebeb;
        padding-left: 20px;
        font-size: 16px;
        color: #b2b2b2;
        border-radius: 4px;
    }

    .checkout__input input.checkout__input__add {
        margin-bottom: 20px;
    }

    .checkout__input input::placeholder {
        color: #b2b2b2;
    }

    .checkout__input__checkbox {
        margin-bottom: 10px;
    }

    .checkout__input__checkbox label {
        position: relative;
        font-size: 16px;
        color: #1c1c1c;
        padding-left: 40px;
        cursor: pointer;
    }

    .checkout__input__checkbox label input {
        position: absolute;
        visibility: hidden;
    }

    .checkout__input__checkbox label input:checked~.checkmark {
        background: #7fad39;
        border-color: #7fad39;
    }

    .checkout__input__checkbox label input:checked~.checkmark:after {
        opacity: 1;
    }

    .checkout__input__checkbox label .checkmark {
        position: absolute;
        left: 0;
        top: 4px;
        height: 16px;
        width: 14px;
        border: 1px solid #a6a6a6;
        content: "";
        border-radius: 4px;
    }

    .checkout__input__checkbox label .checkmark:after {
        position: absolute;
        left: 1px;
        top: 1px;
        width: 10px;
        height: 8px;
        border: solid white;
        border-width: 3px 3px 0px 0px;
        -webkit-transform: rotate(127deg);
        -ms-transform: rotate(127deg);
        transform: rotate(127deg);
        content: "";
        opacity: 0;
    }

    .checkout__order {
        background: #f5f5f5;
        padding: 40px;
        padding-top: 30px;
    }

    .checkout__order h4 {
        color: #1c1c1c;
        font-weight: 700;
        border-bottom: 1px solid #e1e1e1;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .checkout__order .checkout__order__products {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .checkout__order .checkout__order__products span {
        float: right;
    }

    .checkout__order ul {
        margin-bottom: 12px;
    }

    .checkout__order ul li {
        font-size: 16px;
        color: #6f6f6f;
        line-height: 40px;
        list-style: none;
    }

    .checkout__order ul li span {
        font-weight: 700;
        float: right;
    }

    .checkout__order .checkout__order__subtotal {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        border-bottom: 1px solid #e1e1e1;
        border-top: 1px solid #e1e1e1;
        padding-bottom: 15px;
        margin-bottom: 15px;
        padding-top: 15px;
    }

    .checkout__order .checkout__order__subtotal span {
        float: right;
    }

    .checkout__order .checkout__input__checkbox label {
        padding-left: 20px;
    }

    .checkout__order .checkout__order__total {
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        border-bottom: 1px solid #e1e1e1;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }

    .checkout__order .checkout__order__total span {
        float: right;
        color: #dd2222;
    }

    .checkout__order button {
        font-size: 18px;
        letter-spacing: 2px;
        width: 100%;
        margin-top: 10px;
    }

    /*---------------------
      Blog
    -----------------------*/

    .blog__item {
        margin-bottom: 60px;
    }

    .blog__item__pic img {
        min-width: 100%;
    }

    .blog__item__text {
        padding-top: 25px;
    }

    .blog__item__text ul {
        margin-bottom: 15px;
    }

    .blog__item__text ul li {
        font-size: 16px;
        color: #b2b2b2;
        list-style: none;
        display: inline-block;
        margin-right: 15px;
    }

    .blog__item__text ul li:last-child {
        margin-right: 0;
    }

    .blog__item__text h5 {
        margin-bottom: 12px;
    }

    .blog__item__text h5 a {
        font-size: 20px;
        color: #1c1c1c;
        font-weight: 700;
    }

    .blog__item__text p {
        margin-bottom: 25px;
    }

    .blog__item__text .blog__btn {
        display: inline-block;
        font-size: 14px;
        color: #1c1c1c;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 1px solid #b2b2b2;
        padding: 14px 20px 12px;
        border-radius: 25px;
    }

    .blog__item__text .blog__btn span {
        position: relative;
        top: 1px;
        margin-left: 5px;
    }

    .blog__pagination {
        padding-top: 5px;
        position: relative;
    }

    .blog__pagination:before {
        position: absolute;
        left: 0;
        top: -29px;
        height: 1px;
        width: 100%;
        background: #000000;
        opacity: 0.1;
        content: "";
    }

    /*---------------------
      Blog Sidebar
    -----------------------*/

    .blog__sidebar {
        padding-top: 50px;
    }

    .blog__sidebar__item {
        margin-bottom: 50px;
    }

    .blog__sidebar__item h4 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .blog__sidebar__item ul li {
        list-style: none;
    }

    .blog__sidebar__item ul li a {
        font-size: 16px;
        color: #666666;
        line-height: 48px;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .blog__sidebar__item ul li a:hover {
        color: #7fad39;
    }

    .blog__sidebar__search {
        margin-bottom: 50px;
    }

    .blog__sidebar__search form {
        position: relative;
    }

    .blog__sidebar__search form input {
        width: 100%;
        height: 46px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 15px;
        border: 1px solid #e1e1e1;
        border-radius: 20px;
    }

    .blog__sidebar__search form input::placeholder {
        color: #6f6f6f;
    }

    .blog__sidebar__search form button {
        font-size: 16px;
        color: #6f6f6f;
        background: transparent;
        border: none;
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        padding: 0px 18px;
    }

    .blog__sidebar__recent .blog__sidebar__recent__item {
        display: block;
    }

    .blog__sidebar__recent .blog__sidebar__recent__item:last-child {
        margin-bottom: 0;
    }

    .blog__sidebar__recent__item {
        overflow: hidden;
        margin-bottom: 20px;
    }

    .blog__sidebar__recent__item__pic {
        float: left;
        margin-right: 20px;
    }

    .blog__sidebar__recent__item__text {
        overflow: hidden;
    }

    .blog__sidebar__recent__item__text h6 {
        font-weight: 700;
        color: #333333;
        line-height: 20px;
        margin-bottom: 5px;
    }

    .blog__sidebar__recent__item__text span {
        font-size: 12px;
        color: #999999;
        text-transform: uppercase;
    }

    .blog__sidebar__item__tags a {
        font-size: 16px;
        color: #6f6f6f;
        background: #f5f5f5;
        display: inline-block;
        padding: 7px 26px 5px;
        margin-right: 6px;
        margin-bottom: 10px;
    }

    /*---------------------
      Blog Details Hero
    -----------------------*/

    .blog-details-hero {
        height: 350px;
        display: flex;
        align-items: center;
    }

    .blog__details__hero__text {
        text-align: center;
    }

    .blog__details__hero__text h2 {
        font-size: 46px;
        color: #ffffff;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .blog__details__hero__text ul li {
        font-size: 16px;
        color: #ffffff;
        list-style: none;
        display: inline-block;
        margin-right: 45px;
        position: relative;
    }

    .blog__details__hero__text ul li:after {
        position: absolute;
        right: -26px;
        top: 0;
        content: "|";
    }

    .blog__details__hero__text ul li:last-child {
        margin-right: 0;
    }

    .blog__details__hero__text ul li:last-child:after {
        display: none;
    }

    /*---------------------
      Blog Details
    -----------------------*/

    .related-blog {
        padding-top: 70px;
        padding-bottom: 10px;
    }

    .related-blog-title {
        margin-bottom: 70px;
    }

    .blog-details {
        padding-bottom: 75px;
        border-bottom: 1px solid #e1e1e1;
    }

    .blog__details__text {
        margin-bottom: 45px;
    }

    .blog__details__text img {
        margin-bottom: 30px;
    }

    .blog__details__text p {
        font-size: 18px;
        line-height: 30px;
    }

    .blog__details__text h3 {
        color: #333333;
        font-weight: 700;
        line-height: 30px;
        margin-bottom: 30px;
    }

    .blog__details__author__pic {
        float: left;
        margin-right: 15px;
    }

    .blog__details__author__pic img {
        height: 92px;
        width: 92px;
        border-radius: 50%;
    }

    .blog__details__author__text {
        overflow: hidden;
        padding-top: 30px;
    }

    .blog__details__author__text h6 {
        color: #1c1c1c;
        font-weight: 700;
    }

    .blog__details__author__text span {
        font-size: 16px;
        color: #6f6f6f;
    }

    .blog__details__widget ul {
        margin-bottom: 5px;
    }

    .blog__details__widget ul li {
        font-size: 16px;
        color: #6f6f6f;
        list-style: none;
        line-height: 30px;
    }

    .blog__details__widget ul li span {
        color: #1c1c1c;
        font-weight: 700;
    }

    .blog__details__widget .blog__details__social a {
        display: inline-block;
        font-size: 20px;
        color: #6f6f6f;
        margin-right: 24px;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .blog__details__widget .blog__details__social a:hover {
        color: #7fad39;
    }

    .blog__details__widget .blog__details__social a:last-child {
        margin-right: 0;
    }

    /*---------------------
      Footer
    -----------------------*/

    .footer {
        background: #F3F6FA;
        padding-top: 70px;
        padding-bottom: 0;
    }

    .footer__about {
        margin-bottom: 30px;
    }

    .footer__about ul li {
        font-size: 16px;
        color: #1c1c1c;
        line-height: 36px;
        list-style: none;
    }

    .footer__about__logo {
        margin-bottom: 15px;
    }

    .footer__about__logo a {
        display: inline-block;
    }

    .footer__widget {
        margin-bottom: 30px;
        overflow: hidden;
    }

    .footer__widget h6 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .footer__widget ul {
        width: 50%;
        float: left;
    }

    .footer__widget ul li {
        list-style: none;
    }

    .footer__widget ul li a {
        color: #1c1c1c;
        font-size: 14px;
        line-height: 32px;
    }

    .footer__widget p {
        font-size: 14px;
        color: #1c1c1c;
        margin-bottom: 30px;
    }

    .footer__widget form {
        position: relative;
        margin-bottom: 30px;
    }

    .footer__widget form input {
        width: 100%;
        font-size: 16px;
        padding-left: 20px;
        color: #1c1c1c;
        height: 46px;
        border: 1px solid #ededed;
    }

    .footer__widget form input::placeholder {
        color: #1c1c1c;
    }

    .footer__widget form button {
        position: absolute;
        right: 0;
        top: 0;
        padding: 0 26px;
        height: 100%;
    }

    .footer__widget .footer__widget__social a {
        display: inline-block;
        height: 41px;
        width: 41px;
        font-size: 16px;
        color: #404040;
        border: 1px solid #ededed;
        border-radius: 50%;
        line-height: 38px;
        text-align: center;
        background: #ffffff;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
        margin-right: 10px;
    }

    .footer__widget .footer__widget__social a:last-child {
        margin-right: 0;
    }

    .footer__widget .footer__widget__social a:hover {
        background: #7fad39;
        color: #ffffff;
        border-color: #ffffff;
    }

    .footer__copyright {
        border-top: 1px solid #ebebeb;
        padding: 15px 0;
        overflow: hidden;
        margin-top: 20px;
    }

    .footer__copyright__text {
        font-size: 14px;
        color: #1c1c1c;
        float: left;
        line-height: 25px;
    }

    .footer__copyright__payment {
        float: right;
    }

    /*---------------------
      Contact
    -----------------------*/

    .contact {
        padding-top: 80px;
        padding-bottom: 50px;
    }

    .contact__widget {
        margin-bottom: 30px;
    }

    .contact__widget span {
        font-size: 36px;
        color: #7fad39;
    }

    .contact__widget h4 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 6px;
        margin-top: 18px;
    }

    .contact__widget p {
        color: #666666;
        margin-bottom: 0;
    }

    /*---------------------
      Map
    -----------------------*/

    .map {
        height: 500px;
        position: relative;
    }

    .map iframe {
        width: 100%;
    }

    .map .map-inside {
        position: absolute;
        left: 50%;
        top: 160px;
        -webkit-transform: translateX(-175px);
        -ms-transform: translateX(-175px);
        transform: translateX(-175px);
    }

    .map .map-inside i {
        font-size: 48px;
        color: #7fad39;
        position: absolute;
        bottom: -75px;
        left: 50%;
        -webkit-transform: translateX(-18px);
        -ms-transform: translateX(-18px);
        transform: translateX(-18px);
    }

    .map .map-inside .inside-widget {
        width: 350px;
        background: #ffffff;
        text-align: center;
        padding: 23px 0;
        position: relative;
        z-index: 1;
        -webkit-box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
        box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
    }

    .map .map-inside .inside-widget:after {
        position: absolute;
        left: 50%;
        bottom: -30px;
        -webkit-transform: translateX(-6px);
        -ms-transform: translateX(-6px);
        transform: translateX(-6px);
        border: 12px solid transparent;
        border-top: 30px solid #ffffff;
        content: "";
        z-index: -1;
    }

    .map .map-inside .inside-widget h4 {
        font-size: 22px;
        font-weight: 700;
        color: #1c1c1c;
        margin-bottom: 4px;
    }

    .map .map-inside .inside-widget ul li {
        list-style: none;
        font-size: 16px;
        color: #666666;
        line-height: 26px;
    }

    /*---------------------
      Contact Form
    -----------------------*/

    .contact__form__title {
        margin-bottom: 50px;
        text-align: center;
    }

    .contact__form__title h2 {
        color: #1c1c1c;
        font-weight: 700;
    }

    .contact-form {
        padding-top: 80px;
        padding-bottom: 80px;
    }

    .contact-form form input {
        width: 100%;
        height: 50px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 20px;
        margin-bottom: 30px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
    }

    .contact-form form input::placeholder {
        color: #6f6f6f;
    }

    .contact-form form textarea {
        width: 100%;
        height: 150px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 20px;
        margin-bottom: 24px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
        padding-top: 12px;
        resize: none;
    }

    .contact-form form textarea::placeholder {
        color: #6f6f6f;
    }

    .contact-form form button {
        font-size: 18px;
        letter-spacing: 2px;
    }

    /*--------------------------------- Responsive Media Quaries -----------------------------*/

    @media only screen and (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }
    }

    /* Medium Device = 1200px */

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .header__menu ul li {
            margin-right: 45px;
        }
        .hero__search__form {
            width: 490px;
        }
        .hero__categories__all {
            padding: 10px 25px 10px 20px;
        }
        .hero__categories ul {
            padding-left: 20px;
        }
        .latest-product__slider.owl-carousel .owl-nav {
            right: 0;
        }
        .product__details__tab .nav-tabs:before {
            width: 265px;
        }
        .product__details__tab .nav-tabs:after {
            width: 265px;
        }
        .shoping__discount form input {
            width: 240px;
        }
    }

    /* Tablet Device = 768px */

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .hero__categories {
            margin-bottom: 30px;
        }
        .hero__search__form {
            width: 485px;
        }
        .categories__slider.owl-carousel .owl-nav button {
            left: -20px;
        }
        .categories__slider.owl-carousel .owl-nav button.owl-next {
            right: -20px;
        }
        .filter__sort .nice-select {
            padding-left: 5px;
            padding-right: 28px;
        }
        .product__details__quantity {
            margin-bottom: 10px;
        }
        .product__details__text .primary-btn {
            margin-bottom: 10px;
        }
        .product__details__tab .nav-tabs:before {
            width: 150px;
        }
        .product__details__tab .nav-tabs:after {
            width: 150px;
        }
        .blog__details__author {
            overflow: hidden;
            margin-bottom: 25px;
        }
        .humberger__open {
            display: block;
            font-size: 22px;
            color: #1c1c1c;
            height: 35px;
            width: 35px;
            line-height: 33px;
            text-align: center;
            border: 1px solid #1c1c1c;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 22px;
        }
        .header .container {
            position: relative;
        }
        .humberger__menu__wrapper {
            width: 300px;
            background: #ffffff;
            position: fixed;
            left: -300px;
            top: 0;
            height: 100%;
            overflow-y: auto;
            z-index: 99;
            padding: 30px;
            padding-top: 50px;
            opacity: 0;
            display: block;
            -webkit-transition: all, 0.6s;
            -moz-transition: all, 0.6s;
            -ms-transition: all, 0.6s;
            -o-transition: all, 0.6s;
            transition: all, 0.6s;
        }
        .humberger__menu__wrapper.show__humberger__menu__wrapper {
            opacity: 1;
            left: 0;
        }
        .humberger__menu__logo {
            margin-bottom: 30px;
        }
        .humberger__menu__logo a {
            display: inline-block;
        }
        .humberger__menu__contact {
            padding: 10px 0 13px;
        }
        .humberger__menu__contact ul li {
            font-size: 14px;
            color: #1c1c1c;
            position: relative;
            line-height: 30px;
            list-style: none;
        }
        .humberger__menu__contact ul li i {
            color: #252525;
            margin-right: 5px;
        }
        .humberger__menu__cart ul {
            display: inline-block;
            margin-right: 25px;
        }
        .humberger__menu__cart ul li {
            list-style: none;
            display: inline-block;
            margin-right: 15px;
        }
        .humberger__menu__cart ul li:last-child {
            margin-right: 0;
        }
        .humberger__menu__cart ul li a {
            position: relative;
        }
        .humberger__menu__cart ul li a i {
            font-size: 18px;
            color: #1c1c1c;
        }
        .humberger__menu__cart ul li a span {
            height: 13px;
            width: 13px;
            background: #7fad39;
            font-size: 10px;
            color: #ffffff;
            line-height: 13px;
            text-align: center;
            font-weight: 700;
            display: inline-block;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: -12px;
        }
        .humberger__menu__cart .header__cart__price {
            font-size: 14px;
            color: #6f6f6f;
            display: inline-block;
        }
        .humberger__menu__cart .header__cart__price span {
            color: #252525;
            font-weight: 700;
        }
        .humberger__menu__cart {
            margin-bottom: 25px;
        }
        .humberger__menu__widget {
            margin-bottom: 20px;
        }
        .humberger__menu__widget .header__top__right__language {
            margin-right: 20px;
        }
        .humberger__menu__nav {
            display: none;
        }
        .humberger__menu__wrapper .header__top__right__social {
            display: block;
            margin-right: 0;
            margin-bottom: 20px;
        }
        .humberger__menu__wrapper .slicknav_btn {
            display: none;
        }
        .humberger__menu__wrapper .slicknav_nav .slicknav_item a {
            border-bottom: none !important;
        }
        .humberger__menu__wrapper .slicknav_nav {
            display: block !important;
        }
        .humberger__menu__wrapper .slicknav_menu {
            background: transparent;
            padding: 0;
            margin-bottom: 30px;
        }
        .humberger__menu__wrapper .slicknav_nav ul {
            margin: 0;
        }
        .humberger__menu__wrapper .slicknav_nav a {
            color: #1c1c1c;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            border-bottom: 1px solid #e1e1e1;
        }
        .humberger__menu__wrapper .slicknav_nav a:hover {
            -webkit-border-radius: 0;
            border-radius: 0;
            background: transparent;
            color: #7fad39;
        }
        .humberger__menu__wrapper .slicknav_nav .slicknav_row,
        .humberger__menu__wrapper .slicknav_nav a {
            padding: 8px 0;
        }
        .humberger__menu__overlay {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            content: "";
            z-index: 98;
            visibility: hidden;
            -webkit-transition: all, 0.6s;
            -moz-transition: all, 0.6s;
            -ms-transition: all, 0.6s;
            -o-transition: all, 0.6s;
            transition: all, 0.6s;
        }
        .humberger__menu__overlay.active {
            visibility: visible;
        }
        .header__top {
            display: none;
        }
        .header__menu {
            display: none;
        }
        .header__cart {
            text-align: center;
            padding: 10px 0 24px;
        }
        .over_hid {
            overflow: hidden;
        }
    }

    /* Wide Mobile = 480px */

    @media only screen and (max-width: 767px) {
        .hero__categories {
            margin-bottom: 30px;
        }
        .hero__search {
            margin-bottom: 30px;
        }
        .hero__search__form {
            width: 100%;
        }
        .hero__search__form form input {
            width: 100%;
        }
        .hero__search__form form .hero__search__categories {
            display: none;
        }
        .hero__search__phone {
            float: left;
            margin-top: 30px;
        }
        .categories__slider.owl-carousel .owl-nav {
            text-align: center;
            margin-top: 40px;
        }
        .categories__slider.owl-carousel .owl-nav button {
            position: relative;
            left: 0;
            top: 0;
            -webkit-transform: translateY(0);
        }
        .categories__slider.owl-carousel .owl-nav button.owl-next {
            right: -10px;
        }
        .footer__copyright {
            text-align: center;
        }
        .footer__copyright__text {
            float: none;
            margin-bottom: 25px;
        }
        .footer__copyright__payment {
            float: none;
        }
        .filter__item {
            text-align: center;
        }
        .filter__option {
            text-align: center;
        }
        .product__details__pic {
            margin-bottom: 40px;
        }
        .product__details__tab .nav-tabs:before {
            display: none;
        }
        .product__details__tab .nav-tabs:after {
            display: none;
        }
        .shoping__cart__table {
            overflow-y: auto;
        }
        .shoping__discount form input {
            margin-bottom: 15px;
        }
        .blog__details__author {
            overflow: hidden;
            margin-bottom: 25px;
        }
        .humberger__open {
            display: block;
            font-size: 22px;
            color: #1c1c1c;
            height: 35px;
            width: 35px;
            line-height: 33px;
            text-align: center;
            border: 1px solid #1c1c1c;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 22px;
        }
        .header .container {
            position: relative;
        }
        .humberger__menu__wrapper {
            width: 300px;
            background: #ffffff;
            position: fixed;
            left: -300px;
            top: 0;
            height: 100%;
            overflow-y: auto;
            z-index: 99;
            padding: 30px;
            padding-top: 50px;
            opacity: 0;
            display: block;
            -webkit-transition: all, 0.6s;
            -moz-transition: all, 0.6s;
            -ms-transition: all, 0.6s;
            -o-transition: all, 0.6s;
            transition: all, 0.6s;
        }
        .humberger__menu__wrapper.show__humberger__menu__wrapper {
            opacity: 1;
            left: 0;
        }
        .humberger__menu__logo {
            margin-bottom: 30px;
        }
        .humberger__menu__logo a {
            display: inline-block;
        }
        .humberger__menu__contact {
            padding: 10px 0 13px;
        }
        .humberger__menu__contact ul li {
            font-size: 14px;
            color: #1c1c1c;
            position: relative;
            line-height: 30px;
            list-style: none;
        }
        .humberger__menu__contact ul li i {
            color: #252525;
            margin-right: 5px;
        }
        .humberger__menu__cart ul {
            display: inline-block;
            margin-right: 25px;
        }
        .humberger__menu__cart ul li {
            list-style: none;
            display: inline-block;
            margin-right: 15px;
        }
        .humberger__menu__cart ul li:last-child {
            margin-right: 0;
        }
        .humberger__menu__cart ul li a {
            position: relative;
        }
        .humberger__menu__cart ul li a i {
            font-size: 18px;
            color: #1c1c1c;
        }
        .humberger__menu__cart ul li a span {
            height: 13px;
            width: 13px;
            background: #7fad39;
            font-size: 10px;
            color: #ffffff;
            line-height: 13px;
            text-align: center;
            font-weight: 700;
            display: inline-block;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: -12px;
        }
        .humberger__menu__cart .header__cart__price {
            font-size: 14px;
            color: #6f6f6f;
            display: inline-block;
        }
        .humberger__menu__cart .header__cart__price span {
            color: #252525;
            font-weight: 700;
        }
        .humberger__menu__cart {
            margin-bottom: 25px;
        }
        .humberger__menu__widget {
            margin-bottom: 20px;
        }
        .humberger__menu__widget .header__top__right__language {
            margin-right: 20px;
        }
        .humberger__menu__nav {
            display: none;
        }
        .humberger__menu__wrapper .header__top__right__social {
            display: block;
            margin-right: 0;
            margin-bottom: 20px;
        }
        .humberger__menu__wrapper .slicknav_btn {
            display: none;
        }
        .humberger__menu__wrapper .slicknav_nav .slicknav_item a {
            border-bottom: none !important;
        }
        .humberger__menu__wrapper .slicknav_nav {
            display: block !important;
        }
        .humberger__menu__wrapper .slicknav_menu {
            background: transparent;
            padding: 0;
            margin-bottom: 30px;
        }
        .humberger__menu__wrapper .slicknav_nav ul {
            margin: 0;
        }
        .humberger__menu__wrapper .slicknav_nav a {
            color: #1c1c1c;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            border-bottom: 1px solid #e1e1e1;
        }
        .humberger__menu__wrapper .slicknav_nav a:hover {
            -webkit-border-radius: 0;
            border-radius: 0;
            background: transparent;
            color: #7fad39;
        }
        .humberger__menu__wrapper .slicknav_nav .slicknav_row,
        .humberger__menu__wrapper .slicknav_nav a {
            padding: 8px 0;
        }
        .humberger__menu__overlay {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            content: "";
            z-index: 98;
            visibility: hidden;
            -webkit-transition: all, 0.6s;
            -moz-transition: all, 0.6s;
            -ms-transition: all, 0.6s;
            -o-transition: all, 0.6s;
            transition: all, 0.6s;
        }
        .humberger__menu__overlay.active {
            visibility: visible;
        }
        .header__top {
            display: none;
        }
        .header__menu {
            display: none;
        }
        .header__cart {
            text-align: center;
            padding: 10px 0 24px;
        }
        .over_hid {
            overflow: hidden;
        }
    }

    /* Small Device = 320px */

    @media only screen and (max-width: 479px) {
        .hero__search__form form .hero__search__categories {
            display: none;
        }
        .featured__controls ul li {
            margin-bottom: 10px;
        }
        .product__details__text ul li b {
            width: 100px;
        }
        .product__details__tab .nav-tabs li {
            margin-right: 20px;
        }
        .shoping__cart__btns {
            text-align: center;
        }
        .primary-btn.cart-btn.cart-btn-right {
            float: none;
            margin-top: 10px;
        }
        .shoping__checkout .primary-btn {
            display: block;
            text-align: center;
            padding: 10px 15px 10px;
        }
        .map .map-inside {
            -webkit-transform: translateX(-125px);
            -ms-transform: translateX(-125px);
            transform: translateX(-125px);
        }
        .map .map-inside .inside-widget {
            width: 250px;
        }
        .product__details__tab .nav-tabs li {
            margin-right: 15px;
        }
        .shoping__discount form input {
            width: 100%;
        }
        .checkout__order {
            padding: 20px;
        }
        .blog__details__hero__text h2 {
            font-size: 24px;
        }
    }
</style>
</html>
