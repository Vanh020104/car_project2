<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .email-btn {
            color: #5d9fc5;
        }

        .email-btn i {
            color: #5d9fc5;
        }

        .email-btn:hover {
            text-decoration: none;
        }

        .text-muted{
            font-weight: 600;
        }

        .contact-info {
            margin-bottom: 20px;
        }

        .contact-info .info-item {
            margin-bottom: 10px;
        }

        .info-item span {
            color: #5d9fc5;
        }

        .customer-info {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .customer-info .info-item {
            margin-bottom: 10px;
        }

        .customer-info .info-item i {
            color: #84b0ca;
        }

        .customer-info .info-item span {
            font-weight: bold;
        }

        .table thead {
            background-color: #84b0ca;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .thank-you {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-3 float-end">
                    <a class="btn btn-light text-capitalize border-0 email-btn" data-mdb-ripple-color="dark"><i
                            class="fas fa-print text-primary"></i> Email</a>
                </div>
            </div>
            <hr>
        </div>

        <div class="container">
            <div>
                <p class="text-muted">Store</p>
            </div>

            <div class="row">
                <div class="col-md-8 contact-info">
                    <ul class="list-unstyled">
                        <li class="text-muted">To: <span>Rently@gmail.com</span></li>
                        <li class="text-muted info-item">Address: <span>8A Ton That Thuyet, My Dinh2, Nam Tu Liem, Ha Noi.</span></li>
                        <li class="text-muted info-item">Phone Number: <i class="fas fa-phone"></i> +1 333 9296</li>
                    </ul>
                </div>
                <div class="col-md-4 customer-info">
                    <p class="text-muted">Customer</p>
                    <ul class="list-unstyled">
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">ID:</span>#{{$order->id}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Full name:</span>{{$order->full_name}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Telephone:</span>{{$order->tel}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Email: </span>{{$order->email}}</li>
                        <li class="text-muted info-item"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Vehicle pickup location: </span>{{$order->location}}</li>

                    </ul>
                </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless" style="width: 700px">
                    <thead>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Time</th>
                        <th>Total</th>
                        <th>Deposit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->Products as $item)
                        <tr style="text-align: center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>${{$item->pivot->price}}</td>
                            <td>{{$item->pivot->start_date}} <br> {{$item->pivot->start_time}}</td>
                            <td>{{$item->pivot->end_date}} <br> {{$item->pivot->end_time}}</td>
                            <td>{{$item->pivot->buy_qty}}</td>
                            {{--                            <td>${{$item->pivot->buy_qty*$item->pivot->price}}</td>--}}
                            <td>{{$order->total}}</td>
                            <td>${{$item->deposit}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-10 thank-you">
                    <p>If you have completed your order and received your deposit and personal documents in full, please press confirm</p>
                    <form action="{{url("confirmUserCompleted",['order'=>$order->id ]  )}}">
                        <center><button  name="user_id" value="{{$order->user_id}}"  style="background-color: blue;color: white;padding-top: 6px;padding-bottom: 6px;border-radius: 6px;border: blue solid 1px" class="codepro-custom-btn codepro-btn-6" target="blank" title="Code Pro" onclick="window.open('https://www.code.pro.vn/')"><span>Confirmation Completed</span></button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
