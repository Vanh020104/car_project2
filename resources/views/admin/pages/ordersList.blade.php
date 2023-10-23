@extends("admin.layouts.admin_app")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">


                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 50px" >ID</th>
                            <th style="width: 200px">Created_at</th>
                            <th style="width: 240px">Name</th>
                            <th style="width: 200px">Grand_Total</th>

                            <th>Payment_method</th>
                            <th>Is Paid</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr style="height: 50px">
                                <td style="text-align: center">#{{$loop->index+1}}</td>
                                <td  style="text-align: center">{{$item->created_at}}</td>
                                <td style="text-align: center">{{$item->full_name}}</td>
                                <td style="text-align: center">{{$item->getGrandTotal()}}</td>

                                <td style="text-align: center">{{$item->payment_method}}</td>
                                <td style="text-align: center">{!! $item->getPaid() !!}</td>
                                <td style="text-align: center">{!! $item->getStatus() !!}</td>
                                <td style="text-align: center">
                                    <a href="{{url("admin/detailOrder",["id"=>$item->id])}}" class="btn btn-outline-info">Details</a>
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

