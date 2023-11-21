@extends("admin.layouts.admin_app")
@section("content")
    <style>table {
            border-collapse: separate;
            border-spacing: 0;
        }

        th,
        td {

            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            border-top: 1px solid #ccc;

        }</style>

    <div style="overflow: auto;margin-right: auto;margin-left: auto" >
        <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 40px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">

            History Of Damages
        </h2>

        <!-- /.card-header -->
        <div  class="card-body table-responsive p-0">
            <table  class="table table-hover text-nowrap">
                <form action="{{url("/admin/historyDamages")}}" method="get">


                    <select  style="height: 30px ; border: #4CAF50 solid 2px;border-radius: 3px" name="product_id">
                        <option value="0">Filter By Car</option>
                        @foreach($products as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <button style="background-color: blue;color: white;padding-left: 12px;padding-right: 12px;padding-bottom: 2px;padding-top: 2px;border-radius: 6px;margin-left: 5px;margin-bottom: 15px">Search</button>
                </form>
                @if($expenses->count()>0)
                    <thead>
                    <style>
                        th{
                            background-color: blue;
                            padding-top: 12px;padding-bottom: 12px;
                            color: white;
                        }
                    </style>
                    <tr>
                        <th  style="width: 100px;margin-left: 50px; border-left: 1px solid #ccc;">Order Id</th>
                        <th style="width: 200px">Car</th>
                        <th style="width: 220px">Damage</th>
                        <th style="width: 300px">Image</th>
                        <th style="width: 150px;">Expense</th>

                    </tr>
                    </thead>
                @else

                    <p class="text-xl font-bold text-black dark:text-white" style="color: blue;font-size: 20px">There is no damage on this vehicle</p>
                @endif

                <tbody>

                 @foreach($expenses as $item)
                     <tr>
                        <td style="text-align: center;border-left: 1px solid #ccc;">{{$item->order_id}}</td>
                         @php
                             $orderProducts = DB::table('order_products')
                                ->where('order_id', $item->order_id)
                                ->first();
                             $product_id = $orderProducts->product_id;
                             $product = \App\Models\Product::where("id",$product_id)->first();

                         @endphp
                         <td style="text-align: center">{{$product->name}}</td>
                         <td style="text-align: center">{{$item->damage}}</td>
                         <td style="text-align: center"><img style="width: 220px;max-height: 200px;margin-left:40px;border-radius: 6px;margin-top: 5px;margin-bottom: 5px" src="{{$item->image}}" alt=""></td>
                         <td style="text-align: center">${{$item->price}}</td>
                     </tr>

                 @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


@endsection
