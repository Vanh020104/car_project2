<section id="section-cars">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-lg-3 text-center">
                <h2>New Vehicles</h2>
                <p>Driving your dreams to reality with an exquisite fleet of versatile vehicles for unforgettable journeys.</p>
                <div class="spacer-20"></div>
            </div>

            <div id="items-carousel" class="owl-carousel wow fadeIn">
                @foreach($products as $item)
                    <div class="col-lg-12">

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
                                        @if (session('message') && session('product_id') == $item->id)
                                            <p style="color: red">{{ session('message') }}</p>
                                        @endif

                                    </div>
                                    <div class="d-atr-group">
                                        <span style="color: green" class="d-atr"><img src="images/icons/1.svg" alt="">{{$item->seat}}</span>
                                        <span style="color: green" class="d-atr"><img src="images/icons/2.svg" alt="">4</span>
                                        <span style="color: green" class="d-atr"><img src="images/icons/3.svg" alt="">{{$item ->door}}</span>
                                        <span style="color: green" class="d-atr"><img src="images/icons/4.svg" alt="">{{$item->fuel_style}}</span>
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
</section>
