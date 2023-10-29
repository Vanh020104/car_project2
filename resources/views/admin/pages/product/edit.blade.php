@extends("admin.layouts.admin_app")
@section("content")
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form_create" action="{{url("admin/product/edit",['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
            <h2 style="margin-bottom:40px;color: #1270f6;text-align: center;font-size: 30px">Edit Car</h2>
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="ttcar1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input style="margin-left: 15px" type="text" name="name" value="{{$product->name}}" class="form-control"  placeholder="Enter Name" required>
                        @error("name")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select style="width: 200px"  name="category_id" class="form-control">
                            <option value="">Choose category</option>
                            @foreach($categories as $item)
                                <option @if($item->id==$product->category_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error("category_id")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input style="margin-left: 25px" type="number" value="{{$product->price}}" name="price" class="form-control"  placeholder="Price">
                        @error("price")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deposit</label>
                        <input style="margin-left: 7px" type="number" value="{{$product->deposit}}" name="deposit" class="form-control"  placeholder="Deposit">
                        @error("deposit")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Thumbnail</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="thumbnail" type="file" class="custom-file-input" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input style="margin-left: 40px" type="number" value="{{$product->qty}}" name="qty" class="form-control"  placeholder="Qty">
                        @error("qty")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="position: absolute">Description</label>
                        <textarea style="width:270px;border-radius: 8px;position: absolute;margin-top: 30px" name="description" class="form-control" row="5">
                        {{$product->description}}
                    </textarea>
                    </div>
                </div>
                <div class="ttcar2">
                    <div class="form-group">
                        <label>Seat</label>
                        <input type="number" value="{{$product->seat}}" name="seat" class="form-control"  placeholder="Seat">
                        @error("seat")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Door</label>
                        <input type="number" value="{{$product->door}}" name="door" class="form-control"  placeholder="Door">
                        @error("door")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Car Year</label>
                        <input type="number" value="{{$product->car_year}}" name="car_year" class="form-control"  placeholder="Car Year">
                        @error("car_year")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mileage</label>
                        <input type="number" value="{{$product->mileage}}" name="mileage" class="form-control"  placeholder="Mileage">
                        @error("mileage")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Horsepower</label>
                        <input type="number" value="{{$product->power}}" name="power" class="form-control"  placeholder="Horsepower">
                        @error("power")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fuel Style</label>
                        <input type="text" name="fuel_style" value="{{$product->fuel_style}}" class="form-control"  placeholder="Fuel Style" required>
                        @error("fuel_style")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text" name="color" value="{{$product->color}}" class="form-control"  placeholder="Color" required>
                        @error("color")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
        </form>
    </div>
@endsection
<style>
    .form_create{
        border: #cecbcb solid 1px;
        border-radius: 8px;
        margin-top: 6%;
        margin-bottom: 10%;
        margin-left: 20%;
        padding: 80px;


        background-color: #F5F5F5;
    }
    .card-body{
        display: flex;
    }
    .card-footer{
        text-align: center;
        margin-top: 30px;

    }
    #btn{
        width: 300px;
        background-color: #4d4df8;
        color: white;
        padding-top: 8px;
        padding-bottom: 8px;
        border-radius: 8px;
    }
    #btn:hover{
        background-color: #1e1ef8;
    }
    input{
        border-radius: 8px;
        padding-left: 50px;
    }
    .ttcar1 .form-group{
        margin-bottom: 10px;
    }
    .ttcar1 input{
        padding-left: 20px;
    }
    .ttcar2 input{
        padding-left: 20px;
        margin-right: 80px;
    }

</style>
