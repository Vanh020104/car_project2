@extends("admin.layouts.admin_app")
@section("content")

   <div style="margin-left: auto;margin-right: auto">
       <div style="margin-left: auto;margin-right: auto">
           <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 40px;margin-bottom: 40px" class="text-xl font-bold text-black dark:text-white">
               Manage Orders And Favorites
           </h2>
       </div>
       <div style="margin-right: auto;margin-left: auto;display: flex;justify-content: space-between;margin-bottom: 30px">
           <button style="background-color: #a0fc13;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px">Orders Completed</button>
           <button style="background-color: #00ff00;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px">Active Car Leases</button>
           <button style="background-color: #3498db;padding-left: 25px;padding-right: 25px;padding-top: 4px;padding-bottom: 4px;border-radius: 10px;margin-right: 30px;color: white">Favorite Cars </button>
       </div>
       <div style="margin-right: auto;margin-left: auto">
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
                           <td style="text-align: center">{{$item->id}}</td>
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

   </div>
@endsection
