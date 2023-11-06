@extends("user.layouts.app")
@section("content")
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="images/background/2.jpg" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <h1>{{$categoryName}}</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @php
                            $formDisplayed = false; // Biến đếm
                        @endphp



                        @foreach($products as $item)
                            @php $id = $item->category_id; @endphp
                            @php  $c = \App\Models\Category::find($id); @endphp
                            @if(!$formDisplayed)
                                <form action="{{url("filter",["category"=>$c->slug])}}" method="get" >

                                    <div class="item_filter_group" style="display: flex">
                                        <input style="width: 250px;height: 30px;border-radius: 8px;padding-left: 10px"  value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right"  class="fa-solid fa-magnifying-glass" placeholder="Car Name"><i style="position: relative; right: 20px; top: 8px" class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <div class="item_filter_group">
                                        <div class="sidebar__item">
                                            <h4> Car Seats</h4>
                                            <div class="de_form">
                                                <div class="de_checkbox">

                                                    <ul class="checkbox-list" >

                                                        <li >
                                                            <input type="checkbox"
                                                                   name="seat"
                                                                   value="4"
                                                                   id="4">
                                                            <label for="4">4</label>
                                                        </li>

                                                        <li >
                                                            <input type="checkbox"
                                                                   name="seat"
                                                                   value="5"
                                                                   id="5">
                                                            <label for="5">5</label>
                                                        </li>
                                                        <li >
                                                            <input type="checkbox"
                                                                   name="seat"
                                                                   value="6"
                                                                   id="6">
                                                            <label for="6">6</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="item_filter_group">
                                        <div class="sidebar__item">
                                            <h4> Car Color</h4>
                                            <div class="de_form">
                                                <div class="de_checkbox">

                                                    <ul class="checkbox-list" >

                                                        <li >
                                                            <input type="checkbox"
                                                                   name="color"
                                                                   value="MediumSpringGreen"
                                                                   id="MediumSpringGreen">
                                                            <label for="MediumSpringGreen">MediumSpringGreen</label>
                                                        </li>
                                                        <li >
                                                            <input type="checkbox"
                                                                   name="color"
                                                                   value="Red"
                                                                   id="Red">
                                                            <label for="Red">Red</label>
                                                        </li>
                                                        <li >
                                                            <input type="checkbox"
                                                                   name="color"
                                                                   value="Thistle"
                                                                   id="Thistle">
                                                            <label for="Thistle">Thistle</label>
                                                        </li>



                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="item_filter_group">
                                        <h4>Price ($)</h4>
                                        <div class="price-input">
                                            <div class="field">
                                                <span>Min</span>
                                                <input type="number" value="{{app("request")->input("pricemin")}}" name="pricemin" class="input-min" value="0">
                                            </div>
                                            <div class="field">
                                                <span>Max</span>
                                                <input type="number" value="{{app("request")->input("pricemax")}}" name="pricemax" class="input-max" value="2000">
                                            </div>
                                        </div>
                                        <div class="slider">
                                            <div class="progress"></div>
                                        </div>
                                        <div class="range-input">
                                            <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                                            <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                                        </div>


                                    </div>

                                    <script>
                                        const rangeMin = document.querySelector('.range-min');
                                        const rangeMax = document.querySelector('.range-max');
                                        const inputMin = document.querySelector('.input-min');
                                        const inputMax = document.querySelector('.input-max');

                                        rangeMin.addEventListener('input', function() {
                                            inputMin.value = rangeMin.value;
                                        });

                                        rangeMax.addEventListener('input', function() {
                                            inputMax.value = rangeMax.value;
                                        });
                                    </script>

                                    <script>
                                        $(function() {
                                            // Thiết lập thanh trượt
                                            $("#price-range").slider({
                                                range: true,
                                                min: 0,
                                                max: 4000, // Giá trị tối đa cho PriceMax
                                                values: [0, 4000], // Giá trị ban đầu cho PriceMin và PriceMax
                                                slide: function(event, ui) {
                                                    // Cập nhật giá trị cho PriceMin và PriceMax
                                                    $("#pricemin").val(ui.values[0]);
                                                    $("#pricemax").val(ui.values[1]);
                                                }
                                            });

                                            // Khi giá trị PriceMin hoặc PriceMax thay đổi, cập nhật thanh trượt
                                            $("#pricemin, #pricemax").change(function() {
                                                var min = $("#pricemin").val();
                                                var max = $("#pricemax").val();
                                                $("#price-range").slider("values", [min, max]);
                                            });
                                        });
                                    </script>










                                    <button type="submit" class="btn-main">Filter</button>
                                </form>
                                @php
                                    $formDisplayed = true; // Đánh dấu form đã được hiển thị
                                @endphp
                            @endif



                        @endforeach

                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            @foreach($products as $item)
                                <div class="col-xl-4 col-lg-6">
                                    <div class="de-item mb30">
                                        <div class="d-img">
                                            <img src="{{$item->thumbnail}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-text">
                                                <h4><a href="{{url("detail",["product"=>$item->slug])}}">{{$item->name}}</a></h4>
                                                <div class="d-item_like">
                                                    <form action="{{ route('favorites.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button type="submit" style="border: none; background-color: white" class="add-to-favorites" >
                                                            <i class="fa fa-heart"></i><span>74</span>
                                                        </button>
                                                    </form>

                                                </div>
                                                <div class="d-atr-group">
                                                    <span class="d-atr"><img src="images/icons/1.svg" alt="">{{$item->seat}}</span>
                                                    <span class="d-atr"><img src="images/icons/2.svg" alt="">{{$item->id}}</span>
                                                    <span class="d-atr"><img src="images/icons/3.svg" alt="">{{$item->door}}</span>
                                                    <span class="d-atr"><img src="images/icons/4.svg" alt="">{{$item->fuel_style}}</span>
                                                </div>
                                                <div class="d-price">
                                                    Daily rate from <span>{{$item->price}}</span>
                                                    <a class="btn-main" href="{{url("detail",["product"=>$item->slug])}}">Rent Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- content close -->
    <a href="#" id="back-to-top"></a>
    @yield("before_js")
    @include("user.layouts.scriptprice")
    @yield("after_js")
@endsection
