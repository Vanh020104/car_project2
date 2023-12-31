@extends("admin.layouts.admin_app")
@section("content")
    <div style="overflow:auto;" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">

                        Car Rental List
                    </h2>
                    <div style="margin-left: 50px;margin-bottom: 25px" class="card-tools">
                        <form action="{{url("/admin/ordersList")}}" method="get">
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
                <div style="margin-left: 30px" class="card-body table-responsive p-0">
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
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 50px" >ID</th>
                            <th style="width: 200px">Created_at</th>
                            <th style="width: 240px">Name</th>
                            <th style="width: 200px">Grand_Total</th>

                            <th>Payment_method</th>
                            <th>Is Paid</th>
                            <th style="width: 200px">Status</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr style="height: 50px">
                                <td style="text-align: center">{{$item->id}}</td>
                                <td  style="text-align: center">{{$item->created_at}}</td>
                                <td style="text-align: center">{{$item->full_name}}</td>
                                <td style="text-align: center">{{$item->getGrandTotal()}}</td>

                                <td style="text-align: center">{{$item->payment_method}}</td>
                                <td style="text-align: center">{!! $item->getPaid() !!}</td>
                                <td style="text-align: center">{!! $item->getStatus() !!}</td>
                                <td style="text-align: center">
                                    <a href="{{url("admin/detailOrder",["id"=>$item->id])}}" style="background-color: blue;padding-left: 10px;padding-right: 10px;padding-top: 5px;border-radius: 6px;padding-bottom:5px;color: white "    class="btn btn-outline-info">Details</a>
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
    </div>
@endsection

