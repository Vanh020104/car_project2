@extends("admin.layouts.admin_app")
@section("content")
    <form style="overflow: auto" action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="post" class="form-bill" >
        @csrf
        @method('PUT')
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
                   @foreach($order->Products as $item)
                   <tr>

                           <th scope="row">{{$item->name}}</th>
                           <th scope="row"><img style="width: 210px;border-radius: 3px;margin-top: 15px" src="{{$item->thumbnail}}" alt=""></th>
                           <th scope="row"></th>
                           <th scope="row"></th>
                           <th scope="row">{{$order->grand_total}}</th>



                   </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>
        @if($order->status == 0)
            <form action="" method="POST">
               <div style="display:flex;justify-content: space-between" class="btn-xn">
                   <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                   <button style="margin-right:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="1">Confirmed</button>
               </div>
            </form>
        @endif
        @if($order->status == 1)
            <form action="" method="POST">
                <div style="display:flex;justify-content: space-between"     class="btn-xn">
                    <button  style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                    <button style="margin-right:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px"  type="submit" name="status" value="2">Shipping</button>

                </div>
            </form>
        @endif
        @if($order->status == 2)
            <form action="" method="POST">
               <div style="display:flex;justify-content: space-between" class="btn-xn">
                   <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="4">Return</button>
                   <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="3">Shipped</button></div>
            </form>
        @endif
        @if($order->status == 3)
            <form action="" method="POST">
              <div style="display:flex;justify-content: space-between" class="btn-xn">
                  <a style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" href="">Rental problems</a>
                  <a style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: green;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" href="">Reminder to return the car</a>
                  <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="5">Confirm return of vehicle</button>
              </div>
            </form>
        @endif
        @if($order->status == 5)
            <form action="" method="POST">
               <div style="display:flex;justify-content: space-between"  class="btn-xn">
                   <a style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" href="">
                       Damages</a>
                   <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="7">Complete</button>
               </div>
            </form>
        @endif


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
