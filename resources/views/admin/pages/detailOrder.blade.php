@extends("admin.layouts.admin_app")
@section("content")
    <form class="form-bill" action="">
        <div class="tieude">
            <div style="margin-top: 60px;margin-right: 10px" class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div style="width: 300px" class="ttstore">
                <h1 style="font-size: 26px;color: blueviolet;text-align: center;margin-bottom: 10px" >Car Rental</h1>
                <p class="ttstore1">Address : 8A Ton That Thuyet, My Dinh2, Nam Tu Liem, Ha Noi</p>
                <p class="ttstore1">Gmail : carrental@gmail.com</p>
                <p class="ttstore1">Telephone : 0911317510</p>
            </div>
        </div>
        <div style="margin-top: 15px; " class="tieude2">
            <h1 style="font-size: 26px;color: #850af6;text-align: center;font-family: 'Cambria Math'" >Bill Car Rental</h1>
        </div>
        <div class="ttorder1">
            <div class="timebooking">
                <p style="text-align: left">Booking time : {{$order->created_at}} </p>
            </div>
            <div  class="order_id">
                <p >Car booking code : # {{$order->id}} </p>
            </div>
        </div>

           <div class="user">
               <p>Customer : {{$order->full_name}}</p>
               <p>Telephone : {{$order->tel}}</p>
               <p>EMail : {{$order->email}} </p>
               <p>Address : {{$order->address}} </p>
               <p>Location : {{$order->location}}</p>
           </div>
           <div style="margin-left: -20px" class="order_car">
               <table class="table">
                   <thead>
                   <tr>
                       <th style="width: 150px;"  scope="col">Name Car  </th>
                       <th scope="col">Thumbnail</th>
                       <th style="width: 200px;"  scope="col">Vehicle pick up time</th>
                       <th style="width: 200px;"  scope="col">Car return time</th>
                       <th style="width: 100px" scope="col">Total</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       @foreach($order->Products as $item)
                           <th scope="row">{{$item->name}}</th>
                           <th scope="row"><img style="width: 210px;border-radius: 3px;margin-top: 15px" src="{{$item->thumbnail}}" alt=""></th>
                           <th scope="row"></th>
                           <th scope="row"></th>
                           <th scope="row">{{$order->grand_total}}</th>

                       @endforeach

                   </tr>
                   </tbody>
               </table>
           </div>

    </form>
@endsection
<style>
    .form-bill{
        margin: auto;
        padding: 50px;
        border-radius: 8px;
        border: #c4c4c4 solid 1px;
        width: 950px;
        max-width: 950px;
    }
    .tieude{
        margin-left: 20%;
        display: flex;
    }
    .ttstore1{
        font-size: 13px;
        margin-left: 50px;
    }
    .ttorder1{
        margin-top: 10px;
        margin-bottom: 10px;
        display: flex;
        width: 800px;
        max-width: 800px;
        justify-content: space-between;
    }
    .order_car{
        margin-left: 30px;
        margin-top: 10px;
    }

</style>
