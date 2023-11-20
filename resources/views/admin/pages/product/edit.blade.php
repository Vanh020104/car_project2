@extends("admin.layouts.admin_app")
@section("content")
    <div class="card card-primary" style="height: 2050px">
        <!-- form start -->
        <form class="form_create" action="{{url("admin/product/edit",['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
            <h2 style="margin-top:-20px;text-align: center;color: #1a1af8;font-size: 28px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">
                Edit Car
            </h2>
            @csrf
            @method('put')
            <div class="card-body">
                <div class="ttcar1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Car</label><br>
                        <input class="name_car"  type="text" name="name" value="{{$product->name}}"  required>
                        @error("name")
                        <p class="text-danger"><i>{{$message}}</i></p>
                        @enderror
                    </div>

                    <div style="display: flex; margin-top: 20px; justify-content: space-between;gap: 20px">
                        <div class="form-group">
                            <label>Category</label> <br>
                            <select name="category_id" class="category_form">
                                @foreach($categories as $item)
                                    <option @if($item->id==old("category_id")) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label><br>
                            <input class="price_create" type="number" value="{{$product->price}}" name="price" placeholder="Price">
                            @error("price")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>

                    <div style="display: flex; margin-top: 20px; justify-content: space-between;">
                        <div class="form-group">
                            <label for="exampleInputPassword1">
                                Hourly Price</label> <br>
                            <input style="width: 220px;" type="number" value="{{$product->hourly_price}}" name="hourly_price" class="hourly_price"  placeholder="Price">
                            <br>
                            @error("hourly_price")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deposit</label><br>
                            <input style="width: 220px;" type="number" value="{{$product->deposit}}" name="deposit" class="hourly_price" placeholder="Deposit"><br>
                            @error("deposit")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>

                    <div style="display: flex; margin-top: 20px; justify-content: space-between;">
                        <div class="form-group">
                            <label>Quantity</label> <br>
                            <input type="number" value="{{$product->qty}}" name="qty" class="qty_car"  placeholder="Qty">
                            @error("qty")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thumbnail</label><br>
                            <input style="width: 220px;" name="thumbnail" type="file" id="exampleInputFile">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 20px">
                        <label>Description</label> <br>
                        <textarea style="border-radius: 4px;background-color: #f8f9fa;width: 100%; padding: 0 10px" name="description" row="5">
                        {{$product->description}}
                            </textarea>
                    </div>
                </div>

                <div class="ttcar2" style="margin-top: 20px; display: flex;  justify-content: space-between;">
                    <div style="display: grid">
                        <div class="form-group">
                            <label>Seat</label><br>
                            <input type="number" value="{{$product->seat}}" name="seat"   placeholder="Seat">
                            <br>
                            @error("seat")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Door</label><br>
                            <input type="number" value="{{$product->door}}" name="door"  placeholder="Door"><br>
                            @error("door")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Car Year</label> <br>
                            <input type="number" value="{{$product->car_year}}" name="car_year"  placeholder="Car Year"><br>
                            @error("car_year")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>

                    <div style="display: grid">
                        <div class="form-group">
                            <label>Horsepower</label><br>
                            <input type="number" value="{{$product->power}}" name="power"  placeholder="Horsepower"><br>
                            @error("power")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fuel Style</label><br>
                            <input type="text" name="fuel_style" value="{{$product->fuel_style}}"  placeholder="Fuel Style" required><br>
                            @error("fuel_style")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label><br>
                            <input type="text" name="color" value="{{$product->color}}"  placeholder="Color" required><br>
                            @error("color")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mileage</label> <br>
                    <input type="number" value="{{$product->mileage}}" name="mileage" class="mileage"  placeholder="Mileage"><br>
                    @error("mileage")
                    <p class="text-danger"><i>{{$message}}</i></p>
                    @enderror
                </div>
            </div>


            <!-- /.card-body -->
            <div class=" btn-fullwidth">
                <button type="submit" class=" btn_fullwidth" id="btn">Submit</button>
            </div>
        </form>
    </div>

@endsection
<style>
    .form_create{
        border: #f2f2f2 solid 1px;
        border-radius: 8px;
        margin-left: 45%;
        padding: 40px 80px;
        background: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color:#333333;
        width: 100%;
    }
    .name_car {
        border: 1px solid #999999;
        width: 100%;
        border-radius: 3px;
        height: 30px;
        padding: 10px 20px;

    }

    .category_form {
        border: 1px solid #999999;
        width: 220px;
        border-radius: 3px;
        height: 30px;
        padding: 5px 20px;
        color: #999999;
    }
    .price_create {
        border: 1px solid #999999;
        width: 220px;
        border-radius: 3px;
        height: 30px;
        padding: 10px 20px;

    }

    .hourly_price {
        border: 1px solid #999999;
        border-radius: 3px;
        height: 30px;
        padding: 10px 20px;

    }

    .qty_car {
        border: 1px solid #999999;
        border-radius: 3px;
        height: 30px;
        padding: 10px 20px;
        width: 220px;
    }

    .ttcar2 input, .mileage{
        border: 1px solid #999999;
        border-radius: 3px;
        height: 30px;
        padding: 10px 20px;
        width: 220px;
    }
    .btn-fullwidth {
        margin-top: 20px;
        background-color: #3c50e0;
        border-radius: 4px;
        width: 150px;
        margin-left: 36%;
    }
    .btn_fullwidth {
        padding: 10px 50px;
        color: white;
    }
</style>
