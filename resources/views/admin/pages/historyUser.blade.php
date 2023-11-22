@extends("admin.layouts.admin_app")
@section("content")

   <div style="margin-left: auto;margin-right: auto ;overflow: auto" >
       <div style="margin-left: auto;margin-right: auto">
           <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 40px;margin-bottom: 40px" class="text-xl font-bold text-black dark:text-white">
               Manage Orders And Favorites
           </h2>
       </div>
       <div style="margin-right: auto;margin-left: auto;display: flex;justify-content: space-between;margin-bottom: 30px">
           <button id="completedButton" onclick="showDiv('completedDiv','completedButton')" style="background-color: #a0fc13;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px">Orders Completed</button>
           <button id="activeLeasesButton" onclick="showDiv('activeLeasesDiv', 'activeLeasesButton')" style="background-color: #00ff00;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px">Active Car Leases</button>
           <button id="favoriteCarsButton" onclick="showDiv('favoriteCarsDiv', 'favoriteCarsButton')" style="background-color: #3498db;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px;color: white">Favorite Cars</button>
       </div>
       <div id="completedDiv" style="margin-right: auto;margin-left: auto;display: block">
           <style>
               th{
                   background-color: blue;
                   padding-top: 12px;padding-bottom: 12px;
                   color: white;
               }
               table {
                   margin-right: auto;

                   margin-left: auto;                            border-collapse: separate;
                   border-spacing: 0;
                   max-width: 1200px;
               }

               th,
               td {
                   padding-left: 6px;
                   padding-right: 6px;
                   border-right: 1px solid #ccc;
                   border-bottom: 1px solid #ccc;
                   border-top: 1px solid #ccc;

               }
               </style>
           @if($orders_completed->count() >0)
               <h1 style="text-align: center;font-size: 23px;color: #0a53be;margin-bottom: 15px" class="text-xl font-bold text-black dark:text-white">Orders Completed</h1>
               <table class="table table-striped table-borderless">
                   <thead>
                   <tr>
                       <th style="width: 50px" >ID</th>
                       <th style="width: 200px">Pick Up Date</th>
                       <th style="width: 200px">Return Date</th>
                       <th style="width: 240px">Name</th>
                       <th style="width: 200px">Total</th>
                       <th style="width: 200px;">Payment_method</th>
                       <th style="margin-left: 20px">Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($orders_completed as $item)
                       <tr style="height: 50px">
                           <td style="text-align: center;border-left: 1px solid #ccc;">{{$item->id}}</td>
                           @foreach($item->Products as $o_p)
                               <td  style="text-align: center">{{$o_p->pivot->start_date}} {{$o_p->pivot->start_time}}</td>
                               <td  style="text-align: center">{{$o_p->pivot->end_date}} {{$o_p->pivot->end_time}}</td>
                           @endforeach

                           <td style="text-align: center">{{$item->full_name}}</td>
                           <td style="text-align: center">${{$item->total}}</td>
                           <td style="text-align: center">{{$item->payment_method}}</td>
                           <td  style="text-align: center;margin-left: 20px">
                               <a href="{{url("admin/billOrderCompletedUser",["id"=>$item->id])}}" style="background-color: blue;padding-left: 10px;padding-right: 10px;padding-top: 5px;border-radius: 6px;padding-bottom:5px;color: white "    class="btn btn-outline-info">Details</a>
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @else
               <p style="font-size: 20px;text-align: center;color: blue;margin-top: auto;margin-bottom: auto">
                   There is no completed car rental application yet</p>
           @endif

       </div>
       <div  id="favoriteCarsDiv" style="margin-left: auto;margin-right: auto;display: none">
            @if($favorites->count() >0)

                   <h1 style="text-align: center;font-size: 23px;color: #0a53be;margin-bottom: 15px" class="text-xl font-bold text-black dark:text-white">Favorite Cars</h1>
                   <table class="table table-striped table-borderless" style="overflow: auto">
                       <thead>
                       <tr>
                           <th style="width: 150px" >Car</th>
                           <th style="width: 200px">Category</th>
                           <th style="width: 300px">Thumbnail</th>
                           <th style="width: 110px">Fuel Style</th>
                           <th style="width: 110px">Color</th>
                           <th style="width: 150px;">Car Year</th>
                           <th style="width: 150px">Power</th>

                       </tr>
                       </thead>
                       <tbody>
                       @foreach($favorites as $favorite)
                           @php
                               $product =\App\Models\Product::where("id",$favorite->product_id)->first();
                               $category = \App\Models\Category::where("id",$product->category_id)->first();
                           @endphp
                           <tr style="height: 50px">
                               <td style="text-align: center;border-left:1px solid #ccc; ">{{$product->name}}</td>
                               <td style="text-align: center">{{$category->name}}</td>
                               <td><img style="border-radius: 8px;width: 230px;margin-left: 35px;margin-top: 15px;margin-bottom: 15px" src="{{$product->thumbnail}}" alt=""></td>
                               <td style="text-align: center">{{$product->fuel_style}}</td>
                               <td style="text-align: center">{{$product->color}}</td>
                               <td style="text-align: center">{{$product->car_year}}</td>
                               <td style="text-align: center">{{$product->power}} kW</td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
           @else
               <p style="font-size: 20px;text-align: center;color: blue;margin-top: auto;margin-bottom: auto"  class="text-xl font-bold text-black dark:text-white">

                   This customer has no favorite products</p>
            @endif
       </div>
       <div id="activeLeasesDiv" style="margin-right: auto;margin-left: auto;display:none;">

           @if($orders_dt->count() >0)
               <h1 style="text-align: center;font-size: 23px;color: #0a53be;margin-bottom: 15px" class="text-xl font-bold text-black dark:text-white">Active Car Leases </h1>
               <table class="table table-striped table-borderless">
                   <thead>
                   <tr>
                       <th style="width: 50px" >ID</th>
                       <th style="width: 200px">Pick Up Date</th>
                       <th style="width: 200px">Return Date</th>
                       <th style="width: 240px">Name</th>
                       <th style="width: 100px">Total</th>
                       <th style="width: 200px;">Payment_method</th>
                       <th style="margin-left: 20px;width: 200px">Status</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($orders_dt as $item)
                       <tr style="height: 50px">
                           <td style="text-align: center;border-left: 1px solid #ccc;">{{$item->id}}</td>
                           @foreach($item->Products as $o_p)
                               <td  style="text-align: center">{{$o_p->pivot->start_date}} {{$o_p->pivot->start_time}}</td>
                               <td  style="text-align: center">{{$o_p->pivot->end_date}} {{$o_p->pivot->end_time}}</td>
                           @endforeach

                           <td style="text-align: center">{{$item->full_name}}</td>
                           <td style="text-align: center">${{$item->total}}</td>
                           <td style="text-align: center">{{$item->payment_method}}</td>
                           <td  style="text-align: center;margin-left: 20px">
                               {!! $item->getStatus() !!}
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @else
               <p style="font-size: 20px;text-align: center;color: blue;margin-top: auto;margin-bottom: auto">
                   There is no completed car rental application yet</p>
           @endif

       </div>

   </div>
   <script type="text/javascript">
       function showDiv(divId, buttonId) {
           var divs = ["completedDiv", "activeLeasesDiv", "favoriteCarsDiv"];
           var buttons = ["completedButton", "activeLeasesButton", "favoriteCarsButton"];
           for (var i = 0; i < divs.length; i++) {
               var div = document.getElementById(divs[i]);
               var button = document.getElementById(buttons[i]);
               if (divs[i] === divId) {
                   div.style.display = "block";
                   button.classList.add("selectedButton");
               } else {
                   div.style.display = "none";
                   button.classList.remove("selectedButton");
               }
           }
       }
   </script>
   <style>
       .selectedButton {
           background-color: blue;
           color: blue;
       }
   </style>
@endsection
