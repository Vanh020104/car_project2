@extends("admin.layouts.admin_app")
@section("content")
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
    <div style="overflow:auto;margin-left: 30px" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">

                        Car Rental History
                    </h2>
                    <div style="margin-left: 50px;margin-bottom: 25px" class="card-tools">
                        <form action="{{url("/admin/historyOrder")}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;float:left">
                                <input style="width: 500px;height: 30px;border-radius: 8px;padding-left: 10px"  value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search Order By Id">
                            </div>
                            <div style="margin-left: 473px;margin-top: 4px" class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i style="margin-top: 10px" class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->

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
                        @foreach($history_order as $item)
                            <tr style="height: 50px">
                                <td style="text-align: center">{{$item->id}}</td>
                                @foreach($item->Products as $o_p)
                                    <td  style="text-align: center">{{$o_p->pivot->start_date}} {{$o_p->pivot->start_time}}</td>
                                    <td  style="text-align: center">{{$o_p->pivot->end_date}} {{$o_p->pivot->end_time}}</td>
                                @endforeach

                                <td style="text-align: center">{{$item->full_name}}</td>
                                @php $ex = $item->grand_total @endphp
                                @foreach($item->costsIncurred as $expense)
                                   @php $ex +=$expense->price @endphp
                                @endforeach
                                <td style="text-align: center">${{$ex}}.00</td>
                                <td style="text-align: center">{{$item->payment_method}}</td>
                                <td  style="text-align: center;margin-left: 20px">
                                    <a href="{{url("admin/billOrderCompleted",["id"=>$item->id])}}" style="background-color: blue;padding-left: 10px;padding-right: 10px;padding-top: 5px;border-radius: 6px;padding-bottom:5px;color: white "    class="btn btn-outline-info">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

@endsection
