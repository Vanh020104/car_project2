@extends("admin.layouts.admin_app")
@section("content")


            <div style="overflow: auto" class="card">
                <div style="text-align: center;font-size: 35px;color: blue;margin-top: 20px" class="td">Cars List</div>
                <div class="card-header">
                    <h3  style="margin-top: 30px;margin-bottom: 25px" class="card-title"><a style="background-color:blue;border: blue solid 2px;border-radius: 6px;padding-left: 20px;padding-right: 20px;padding-top: 8px;padding-bottom: 8px;color: white;width: 300px;margin-left: 50px;"  href="{{url("admin/product/create")}}">Create new product</a> </h3>

                    <div style="margin-left: 50px;margin-bottom: 25px" class="card-tools">
                        <form action="{{url("/admin/carsList")}}" method="get">

                            <div class="input-group input-group-sm mr-2" style="width: 150px; float:left">
                                <select style="height: 30px" name="category_id" class="form-control">
                                    <option value="0">Filter by category</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-sm" style="margin-left: 15px;width: 150px;float:left">
                                <input style="width: 500px;height: 30px;border-radius: 8px;padding-left: 10px"  value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">
                            </div>
                            <div style="margin-left: 635px;margin-top: 10px" class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i style="margin-top: 10px" class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table style="margin-left: 50px" class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 50px;margin-left: 50px">No.</th>
                            <th style="width: 250px">Image</th>
                            <th style="width: 200px">Name</th>
                            <th style="width: 130px">Price</th>
                            <th style="width: 100px;">Qty</th>
                            <th style="width: 150px;">Category</th>
                            <th style="width: 200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td style="text-align: center;">#{{$loop->index+1}}</td>
                                <td  style="text-align: center;"><img style="border-radius: 8px;margin-bottom: 15px;margin-left: 25px" width="200px" src="{{$item->thumbnail}}" /></td>
                                <td style="text-align: center;">{{$item->name}}</td>
                                <td style="text-align: center;">{{$item->price}}</td>
                                <td style="text-align: center;">{{$item->qty}}</td>
                                <td style="text-align: center;">{{$item->Category->name}}</td>
                                <td style="text-align: center;">
                                    <a style="border: blue solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 25px;padding-right: 25px;padding-top: 6px;padding-bottom: 6px" href="{{url("admin/product/edit",['product'=>$item->id])}}" class="btn btn-outline-info"><i style="margin-right: 6px" class="fa-regular fa-pen-to-square"></i>Edit</a>
                                    <form action="{{url("admin/product/delete",['product'=>$item->id])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button style="margin-top: 7px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" onclick="return confirm('Chắc chắn muốn xoá sản phẩm: {{$item->name}}')" class="btn btn-outline-danger" type="submit"><i style="margin-right: 6px" class="fa-regular fa-trash-can"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


@endsection
