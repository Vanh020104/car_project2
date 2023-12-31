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

                            <h1>Feed Back</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <div class="container" style="margin-top: 100px">
            <div class="row g-custom-x">

                <div class="col-lg-8 mb-sm-30">

                    <h3 style="margin-bottom: 50px">Please send me your feedback about our products and service</h3>

                    <form name="contactForm" id="contact_form" class="form-border" method="post" enctype="multipart/form-data" action="{{url("feedbacks")}}">
                        @csrf
                        <div style="display: flex; justify-content: space-between; ">
                            <div class="row">
                                <div class="col-md-4 mb10">
                                    <input name="user_id" type="hidden" value="{{$od->user_id}}">
                                    <input type="hidden" name="order_id" value="{{$od->id}}">
                                    @foreach($od->Products as $order) @endforeach
                                    <div class="field-set">
                                        <img style="border-radius: 5px" src="{{$order->thumbnail}}" alt="" width="350">
                                        <h4 style="width: 350px; margin: 10px 0 20px 0; text-align: center">{{$order->name}}</h4>
                                        <input  type="text" name="product_id" style="display: none" id="product_id" class="form-control" placeholder="Product" value="{{$order->id}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 100px;">
                                <div class="col-md-4 mb10">
                                    <label for="full_name" class="form-label" style="font-weight: 500; font-size: 18px">Full name</label>
                                    <div class="field-set">
                                        <input type="text" name="full_name" id="full_name" style="width: 280px;height: 40px; padding: 0 15px"  placeholder="Your Name" value="{{auth()?auth()->user()->name:old("full_name")}}" required readonly>
                                        <input type="text" style="display: none" name="user_id" id="user_id" class="form-control" placeholder="Your Name" value="{{auth()?auth()->user()->id:old("user_id")}}" required>
                                    </div>
                                </div>
                                <div style="position: relative; bottom: 50px; margin-top: 30px">
                                    <span style="font-weight: 500; display:flex;font-size: 18px;">Choose stars: <input class="form-control" name="rating" id="rating" value="0" style="position: relative;bottom: 9.5px;color:#666666;width: 50px; margin-left: 10px;font-size: 18px; border: none; background-color: white" readonly required><p>stars</p></span>
                                    <div style=" font-size:25px;position: relative; bottom: 10px" id="rateYo"></div>

                                </div>
                            </div>
                        </div>


                        <div class="field-set mb20">

                            <textarea style="width: 740px; height: 120px" name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
                        </div>
                        <button style="width: 200px; height: 40px " type="submit" class="btn-main btn-fullwidth">Sent</button>

                        <div id="success_message" class='success'>
                            Your message has been sent successfully. Refresh this page if you want to send more messages.
                        </div>
                        <div id="error_message" class='error'>
                            Sorry there was an error sending your form.
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">

                    <div class="de-box mb30">
                        <h4>US Office</h4>
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i>08 W 36th St, New York, NY 10001</span>
                            <span><i class="id-color fa fa-phone fa-lg"></i>+1 333 9296</span>
                            <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="mailto:contact@example.com">contact@example.com</a></span>
                            <span><i class="id-color fa fa-file-pdf-o fa-lg"></i><a href="#">Download Brochure</a></span>
                        </address>
                    </div>
                    <div class="de-box mb30">
                        <h4>AU Office</h4>
                        <address class="s1">
                            <span><i class="fa fa-map-marker fa-lg"></i>8A, Ton That Thuyet, Nam Tu Liem, Ha Noi.</span>
                            <span><i class="fa fa-phone fa-lg"></i>+1 333 9296</span>
                            <span><i class="fa fa-envelope-o fa-lg"></i><a href="mailto:contact@example.com">contact@example.com</a></span>
                            <span><i class="fa fa-file-pdf-o fa-lg"></i><a href="#">Download Brochure</a></span>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin: 50px 0"></div>


        <!-- content close -->
        <a href="#" id="back-to-top"></a>
    </div>
@endsection
@section("css_rating")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection
@section("script_rating")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script >
        $(function () {

            $("#rateYo").rateYo({
                rating: 0,
                precision: 0,
            }).on("rateyo.set", function (e, data) {
                $('#rating').val(data.rating);
                //alert("The rating is set to " + data.rating + "!");
            });

        });
    </script>
@endsection
