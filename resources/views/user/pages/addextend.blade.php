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
                        <h1>Extension</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- section close -->
    <div style="margin: 80px 0 80px 160px ">
        <div style="width: 85%">
            <div class="de-item-list no-border mb30">
                @foreach ($order->Products as $item)
                <div class="d-img">
                    <img src="{{ $item->thumbnail }}" class="img-fluid" alt="">
                </div>
                <div class="d-info">
                    <div class="d-text">
                        <input type="hidden" name="order_id" value="#{{ $order->id }}">
                        <h4>{{ $item->name}}</h4>
                        <form id="rentalForm" style="display: flex; gap:50px"  action="{{ route('update', ['id' => $order->id]) }}" method="POST">
                            @csrf

                            <div style="display: grid">
                                <div>
                                    <p style="margin: 0">Pick Up Date & Time<span>*</span></p>
                                    <div class="d-atr-group" style="display: flex; gap: 3px">
                                        <input style="padding: 0 15px; width: 140px" type="date" id="start_date" name="start_date" value="{{ $item->pivot->start_date }}" onchange="calculateDays()" readonly>
                                        <input style="padding: 0 15px; width: 145px" type="time" id="start_time" name="start_time" value="{{ $item->pivot->start_time }}" onchange="calculateDays()">
                                    </div>
                                </div>


                                <div style="margin-top: 20px">
                                    <p style="margin: 0">Return Date & Time<span>*</span></p>
                                    <div class="d-atr-group" style="display: flex; gap: 3px">
                                        <input style="padding: 0 15px; width: 140px" type="date" id="end_date" value="{{ $item->pivot->end_date }}" name="end_date" onchange="calculateDays()">
                                        <input style="padding: 0 15px; width: 145px" type="time" id="end_time" name="end_time" value="{{ $item->pivot->end_time }}" onchange="calculateDays()">
                                    </div>
                                </div>
                            </div>

                            <div>

                                <div class="d-atr-group">
                                    <p style="margin: 0">Price<span>*</span></p>
                                    @if($item->pivot->end_date != $item->pivot->end_time)
                                        <input style="height: 30px; width: 100px; padding: 5px 15px" id="price" name="price" value="{{$item->price}}$" readonly>
                                    @else
                                        <input style="height: 30px; width: 100px; padding: 5px 15px" id="price" name="price" value="{{$item->hourly_price}}$" readonly>
                                    @endif
                                </div>
                                <div class="d-atr-group" style="margin-top: 20px">
                                    <p style="margin: 0">Total<span>*</span></p>
                                    <input style="height: 30px; width: 100px;padding: 5px 15px" type="text" id="grand_total" name="grand_total" value="{{$order->grand_total}}" readonly>
                                </div>

                            </div>
                            <div style="margin-top: 20px">
                                <div class="d-atr-group" style="margin-left: 45px;margin-bottom: 5px; display: flex">
                                    <label style="margin: 0" for="buy_qty">Total days:</label>
                                    <input style="width: 30px;height: 26px;color: #999999; border: none; margin-left: 10px" type="text" id="buy_qty" name="buy_qty" value="{{$item->pivot->buy_qty}}" readonly>
                                    @if($item->pivot->end_date != $item->pivot->end_time)
                                        days
                                    @else
                                        hours
                                    @endif
                                </div>
                                <div class="d-price" >
                                    <button onclick="return confirm('Are you sure you want to renew the car {{$item->name}}?' )" class="btn-main btn-fullwidth" style="width: 180px" type="submit">Extend</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
                @endforeach


            </div>
        </div>


    </div>


</div>

@include("user.layouts.footer")
@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
<!-- content close -->
</body>
<script>
    var numDaysInput = document.getElementById('buy_qty');
    var priceInput = document.getElementById('price');
    var totalInput = document.getElementById('grand_total');
    var startDateInput = document.getElementById('start_date');
    var endDateInput = document.getElementById('end_date');
    var startTimeInput = document.getElementById('start_time');
    var endTimeInput = document.getElementById('end_time');

    function calculateTotal() {
        var numDays = parseInt(numDaysInput.value);
        var price = parseFloat(priceInput.value);

        var total = numDays * price;
        totalInput.value = total;
    }

    function calculateDays() {
        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);
        var startTime = getTimeFromString(startTimeInput.value);
        var endTime = getTimeFromString(endTimeInput.value);

        if (startDate.getTime() < endDate.getTime()) {
            if (startDate.getTime() === endDate.getTime()) {
                var timeDiff = Math.abs(endTime.getTime() - startTime.getTime());
                var numHours = Math.ceil(timeDiff / (1000 * 60 * 60));

                numDaysInput.value = numHours;
            } else {
                var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                var numDays = Math.ceil(timeDiff / (1000 * 3600 * 24)+1);

                numDaysInput.value = numDays;
            }

            calculateTotal();
        } else {
            alert("Start date must be less than end date.");
            numDaysInput.value = 0;
            totalInput.value = 0;
        }


        calculateTotal();
    }

    function getTimeFromString(timeString) {
        var timeParts = timeString.split(':');
        var hours = parseInt(timeParts[0]);
        var minutes = parseInt(timeParts[1]);

        var time = new Date();
        time.setHours(hours);
        time.setMinutes(minutes);

        return time;
    }

    startDateInput.addEventListener('change', calculateDays);
    endDateInput.addEventListener('change', calculateDays);
    startTimeInput.addEventListener('change', calculateDays);
    endTimeInput.addEventListener('change', calculateDays);
    priceInput.addEventListener('input', calculateTotal);
</script>
</html>
