@extends("admin.layouts.admin_app")
@section("content")
    <div class="card card-primary" style="height: 2050px">
        <!-- form start -->
        <form class="form_create" action="{{url("admin/product/create")}}" method="post" enctype="multipart/form-data">
            <h2 style="margin-top:-20px;text-align: center;color: #1a1af8;font-size: 28px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">
               Create New Car
            </h2>
            @csrf
            <div class="card-body">
             <div class="ttcar1">
                 <div class="form-group">
                     <label for="exampleInputEmail1">Name Car</label><br>
                     <input class="name_car"  type="text" name="name" value="{{old("name")}}"   placeholder="Enter Name" required>
                     @error("name")
                     <p class="text-danger"><i>{{$message}}</i></p>
                     @enderror
                 </div>

                 <div style="display: flex; margin-top: 20px; justify-content: space-between;gap: 20px">
                     <div class="form-group">
                         <label>Category</label> <br>
                         <select class="category_form" name="category_id" >
                             <option value="">Category</option>
                             @foreach($categories as $item)
                                 <option @if($item->id==old("category_id")) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                             @endforeach
                         </select><br>
                         @error("category_id")
                         <p class="text-danger"><i>{{$message}}</i></p>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Price</label> <br>
                         <input class="price_create" type="number" value="{{old("price")}}" name="price"   placeholder="Price" min="300"><br>
                         @error("price")
                         <p class="text-danger"><i>{{$message}}</i></p>
                         @enderror
                     </div>
                 </div>


                 <div style="display: flex; margin-top: 20px; justify-content: space-between;">
                     <div class="form-group">
                         <label for="exampleInputPassword1">Hourly Price</label><br>
                         <input style="width: 220px;" class="hourly_price" type="number" value="{{old("hourly_price")}}" name="hourly_price" placeholder="Hourly Price" min="250">
                         <br>
                         @error("hourly_price")
                         <p class="text-danger"><i>{{$message}}</i></p>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Deposit</label><br>
                         <input style="width: 220px;" class="hourly_price" type="number" value="{{old("deposit")}}" name="deposit"  placeholder="Deposit" min="1200"><br>
                         @error("deposit")
                         <p class="text-danger"><i>{{$message}}</i></p>
                         @enderror
                     </div>
                 </div>

                 <div style="display: flex; margin-top: 20px; justify-content: space-between;">

                     <div class="form-group">
                         <label>Qty</label><br>
                         <input class="qty_car" type="number" value="{{old("qty")}}" name="qty" placeholder="Qty" min="1"><br>
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
                     <textarea style="border-radius: 4px;background-color: #f8f9fa;width: 100%; padding: 0 10px" name="description"  row="5">
                        {{old("description")}}
                    </textarea>
                 </div>
             </div>



                <div class="ttcar2" style="margin-top: 20px; display: flex;  justify-content: space-between;">
                    <div style="display: grid">
                        <div class="form-group">
                            <label>Seat</label><br>
                            <input type="number" value="{{old("seat")}}" name="seat"  placeholder="Seat" min="2"><br>
                            @error("seat")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Door</label><br>
                            <input type="number" value="{{old("door")}}" name="door" placeholder="Door" min="2"><br>
                            @error("door")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Car Year</label><br>
                            <input type="number" value="{{old("car_year")}}" name="car_year" placeholder="Car Year" min="2010"><br>
                            @error("car_year")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>

                    </div>

                    <div style="display: grid">
                        <div class="form-group">
                            <label>Horsepower</label><br>
                            <input type="number" value="{{old("power")}}" name="power"  placeholder="Horsepower" min="534"><br>
                            @error("power")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fuel Style</label><br>
                            <input type="text" name="fuel_style" value="{{old("fuel_style")}}"  placeholder="Fuel Style" required><br>
                            @error("fuel_style")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label><br>
                            <input type="text" name="color" value="{{old("color")}}"   placeholder="Color" required><br>
                            @error("color")
                            <p class="text-danger"><i>{{$message}}</i></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mileage</label><br>
                    <input type="number" class="mileage" value="{{old("mileage")}}" name="mileage"  placeholder="Mileage" min="200"><br>
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

