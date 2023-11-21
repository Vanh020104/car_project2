
@extends("admin.layouts.admin_app")
@section("content")
    <div class="form-bill" style="overflow: auto">

        <div class="tieude">
            <div style="margin-top: 60px;margin-right: 10px" class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div style="width: 300px" class="ttstore">
                <h1 style="font-size: 26px;color: blueviolet;text-align: center;margin-bottom: 10px" >Car Rental</h1>
                <p class="ttstore1">Address : 8A Ton That Thuyet, My Dinh2, Nam Tu Liem, Ha Noi</p>
                <p class="ttstore1">Gmail : carrental@gmail.com</p>
                <p class="ttstore1">Telephone : 0911317510</p>
            </div>
        </div>
        <div style="margin-top: 15px; " class="tieude2">
            <h1 style="font-size: 26px;color: #850af6;text-align: center;font-family: 'Cambria Math'" >Bill Car Rental</h1>
        </div>
        <div class="ttorder1">
            <div class="timebooking">
                <p style="text-align: left">Booking time : {{$order->created_at}} </p>
            </div>
            <div  class="order_id">
                <p >Car booking code : # {{$order->id}} </p>
            </div>
        </div>

        <div class="user">
            <p>Customer : {{$order->full_name}}</p>
            <p>Telephone : {{$order->tel}}</p>
            <p>Email : {{$order->email}} </p>
            <p>Address : {{$order->address}} </p>
            <p>Location : {{$order->location}}</p>
        </div>
        <div style="margin-left: -20px" class="order_car">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 150px;"  scope="col">Name Car  </th>
                    <th scope="col">Thumbnail</th>
                    <th style="width: 160px;"  scope="col">Vehicle pick up time</th>
                    <th style="width: 160px;"  scope="col">Car return time</th>
                    <th style="width: 50px" scope="col">Amount</th>
                    <th style="width: 100px" scope="col">Other Costs</th>
                    <th style="width: 60px" scope="col">Total</th>


                </tr>
                </thead>
                <tbody>
                @foreach($order->Products as $item)
                    <tr>

                        <th scope="row">{{$item->name}}</th>
                        <th scope="row"><img style="width: 180px;border-radius: 3px;margin-top: 15px" src="{{$item->thumbnail}}" alt=""></th>
                        <th scope="row"> {{$item->pivot->start_time}} <br> {{$item->pivot->start_date}} </th>
                        <th scope="row"> {{$item->pivot->end_time}} <br> {{$item->pivot->end_date}}</th>
                        <th scope="row">{{$order->grand_total}}</th>
                        <th scope="row">
                            @php
                                $totalCost = 0;
                                $chiphi = \App\Models\OverdueCosts::where("order_id",$order->id)->first();
                                if ($chiphi)
                                    {$totalCost += $chiphi->costs;}

                                $expenses = $order->costsIncurred; // Lấy danh sách chi phí liên quan đến order hiện tại
                                foreach ($expenses as $expense) {
                                    $totalCost += $expense->price; // Tính tổng expense
                                }
                                echo $totalCost; // Hiển thị tổng expense
                            @endphp
                        </th>
                        <th scope="row">{{$order->total}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($order->status == 0)
            <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div style="display:flex;justify-content: space-between" class="btn-xn">
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                    <button style="margin-right:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="1">Confirmed</button>
                </div>
            </form>
        @endif

        @if($order->status == 1)

            <div style="display:flex;justify-content: space-between" class="btn-xn">
                <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                </form>
                <button id="openModalButton" style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Confirm vehicle handover</button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2 style="text-align: center;color: #1a1af8;font-size: 22px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">
                            Image Confirming Vehicle Delivery
                        </h2>
                        <h2>Tải lên ảnh</h2>
                        <form action="{{url("admin/uploadImageCVD",$order->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="display: flex">
                                <input type="file" name="images[]" multiple required>
                                <button style="float:right;margin-left:50px;margin-bottom:10px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" name="status" value="2" type="submit">Submit</button>
                            </div>

                            <div id="preview"></div>

                            <script>
                                function previewImages(event) {
                                    var preview = document.querySelector('#preview');
                                    preview.innerHTML = '';

                                    var files = event.target.files;

                                    for (var i = 0; i < files.length; i++) {
                                        var file = files[i];
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var image = document.createElement('img');
                                            image.src = e.target.result;
                                            image.style.marginTop = '10px';
                                            image.style.width = '200px';
                                            image.style.height = '140px';
                                            preview.appendChild(image);
                                        }

                                        reader.readAsDataURL(file);
                                    }
                                }

                                var fileInput = document.querySelector('input[type="file"]');
                                fileInput.addEventListener('change', previewImages);
                            </script>
                        </form>
                    </div>
                </div>
                <script>
                    var openModalButton = document.getElementById('openModalButton');
                    var modal = document.getElementById('myModal');
                    var close = document.getElementsByClassName('close')[0];

                    openModalButton.addEventListener('click', function() {
                        modal.style.display = 'block';
                    });

                    close.addEventListener('click', function() {
                        modal.style.display = 'none';
                    });

                    window.addEventListener('click', function(event) {
                        if (event.target == modal) {
                            modal.style.display = 'none';
                        }
                    });
                </script>
            </div>

        @endif
        @if($order->status == 2)
            <p style="text-align: center;margin-top: 20px;color: #8ce10a;font-size: 18px">Please wait for the customer to confirm receipt of the vehicle</p>
        @endif
        @if($order->status == 3)
            <div style="display: flex;justify-content: space-between">
                <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="display:flex;justify-content: space-between" class="btn-xn">
                        <a style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: green;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" href="">Reminder to return the car</a>
                    </div>
                </form>
                <button id="openModalButton" style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px"  type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Confirm return of vehicle</button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2 style="text-align: center;color: #1a1af8;font-size: 22px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">
                            Car Return Confirmation Image
                        </h2>
                        <h2>Tải lên ảnh</h2>
                        <form action="{{url("admin/uploadImageReturn",$order->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="display: flex">
                                <input type="file" name="images[]" multiple required>
                                <button style="float:right;margin-left:50px;margin-bottom:10px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" name="status" value="5" type="submit">Submit</button>
                            </div>

                            <div id="preview"></div>

                            <script>
                                function previewImages(event) {
                                    var preview = document.querySelector('#preview');
                                    preview.innerHTML = '';

                                    var files = event.target.files;

                                    for (var i = 0; i < files.length; i++) {
                                        var file = files[i];
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var image = document.createElement('img');
                                            image.src = e.target.result;
                                            image.style.marginTop = '10px';
                                            image.style.width = '200px';
                                            image.style.height = '140px';
                                            preview.appendChild(image);
                                        }

                                        reader.readAsDataURL(file);
                                    }
                                }

                                var fileInput = document.querySelector('input[type="file"]');
                                fileInput.addEventListener('change', previewImages);
                            </script>
                        </form>
                    </div>
                </div>
                <script>
                    var openModalButton = document.getElementById('openModalButton');
                    var modal = document.getElementById('myModal');
                    var close = document.getElementsByClassName('close')[0];

                    openModalButton.addEventListener('click', function() {
                        modal.style.display = 'block';
                    });

                    close.addEventListener('click', function() {
                        modal.style.display = 'none';
                    });

                    window.addEventListener('click', function(event) {
                        if (event.target == modal) {
                            modal.style.display = 'none';
                        }
                    });
                </script>
            </div>
        @endif
        @if($order->status == 5)
            <div style="display:flex;justify-content: space-between"  class="btn-xn">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="open-modal" style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: darkolivegreen;color: white;padding-left: 17px;padding-right: 17px;padding-top: -10px;padding-bottom: -10px">Damages</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div style="box-sizing: border-box;width: 2000px;margin-left: -200px"  class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 style="text-align: center;color: #1a1af8;font-size: 22px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">
                                    Costs Incurred
                                </h2>
                                <button style="float:right;background-color: green;color: white;border-radius: 5px;padding-left: 14px;padding-right: 14px;padding-top: 5px;padding-bottom: 5px" type="button" id="add-row">Add Row</button>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="expense-form" method="POST" action="{{url("/admin/damage",$order->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div id="expense-rows">
                                        @php
                                            $orderProducts = DB::table('order_products')->where('order_id', $order->id)->first();
                                            $product_id = $orderProducts->product_id;
                                        @endphp
                                        <input type="hidden" name="product_id" value="{{$product_id}}">
                                        <div style="display: flex" class="expense-row">
                                            <div><input style="margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;padding-left: 10px" type="text" name="name[]" placeholder="Damage"></div>
                                            <div><input onchange="handleFileSelect(this)" style="margin-left:30px;width:100px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;" type="file" name="image[]" accept="image/*" placeholder="Image">
                                                <img  class="preview-image" src="#" alt="Preview Image" style="max-width: 150px; max-height: 200px; display: none;border-radius: 6px;margin-top: 8px;margin-left: 10px"></div>
                                            <div></div>
                                            <div><select style="margin-left:20px;padding-top:5px;padding-bottom:5px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;" name="level[]" onchange="updatePrice(this)">
                                                    <option value="1">Minor Damage</option>
                                                    <option value="2">Moderate Damage</option>
                                                    <option value="3">Significant Damage</option>
                                                    <option value="4">Severe Damage</option>
                                                </select>
                                                <input style="width:80px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;padding-left: 25px;padding-bottom: 3px;padding-top: 3px" type="number" name="price[]" placeholder="Price" readonly>
                                                <button type="button" class="remove-row">Remove</button></div>

                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: space-between;">
                                        <button style="margin-top:15px;background-color: red;color: white;border-radius: 5px;padding-left: 14px;padding-right: 14px;padding-top: 5px;padding-bottom: 5px" type="button" style="background-color: red" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button style="margin-top:15px;background-color: #0a58ca;color: white;border-radius: 5px;padding-left: 14px;padding-right: 14px;padding-top: 5px;padding-bottom: 5px" type="submit" class="btn btn-primary">Save changes</button>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Xử lý sự kiện khi chọn tệp tin
                    function handleFileSelect(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                var previewImage = input.parentNode.querySelector('.preview-image');
                                previewImage.src = e.target.result;
                                previewImage.style.display = 'block';
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    function updatePrice(selectElement) {
                        var priceInput = selectElement.parentNode.querySelector('input[name="price[]"]');
                        var selectedLevel = selectElement.value;
                        var price = getPriceForLevel(selectedLevel);
                        priceInput.value = price;
                    }

                    // Function to get price based on selected level
                    function getPriceForLevel(level) {
                        // Define your own logic to retrieve price for each level
                        // You can use a switch statement, if-else conditions, or fetch data from an API
                        switch (level) {
                            case '1':
                                return 10;
                            case '2':
                                return 20;
                            case '3':
                                return 30;
                            case '4':
                                return 40;
                            default:
                                return 0;
                        }
                    }

                    // Add row event handler
                    document.getElementById('add-row').addEventListener('click', function() {
                        var expenseRows = document.getElementById('expense-rows');
                        var newRow = document.createElement('div');
                        newRow.classList.add('expense-row');
                        newRow.innerHTML = `
      <div style="display: flex" class="expense-row">
                                            <div><input style="margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;padding-left: 10px" type="text" name="name[]" placeholder="Damage"></div>
                                            <div><input onchange="handleFileSelect(this)" style="margin-left:30px;width:100px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;" type="file" name="image[]" accept="image/*" placeholder="Image">
                                                <img  class="preview-image" src="#" alt="Preview Image" style="max-width: 150px; max-height: 200px; display: none;border-radius: 6px;margin-top: 8px;"></div>
                                            <div></div>
                                            <div><select style="margin-left:20px;padding-top:5px;padding-bottom:5px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;" name="level[]" onchange="updatePrice(this)">
                                                    <option value="1">Minor Damage</option>
                                                    <option value="2">Moderate Damage</option>
                                                    <option value="3">Significant Damage</option>
                                                    <option value="4">Severe Damage</option>
                                                </select>
                                                <input style="width:80px;margin-top: 10px;border: #949393 solid 2px;border-radius: 5px;padding-left: 25px;padding-bottom: 3px;padding-top: 3px" type="number" name="price[]" placeholder="Price" readonly>
                                                <button type="button" class="remove-row">Remove</button></div>

                                        </div>`;
                        expenseRows.appendChild(newRow);
                    });

                    // Remove row event handler
                    document.addEventListener('click', function(event) {
                        if (event.target.classList.contains('remove-row')) {
                            var row = event.target.closest('.expense-row');
                            row.remove();
                        }
                    });
                </script>
                <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="8">Complete</button>
                </form>
            </div>
        @endif
        @if($order->status == 8)
            <p style="text-align: center;margin-top: 20px;color: #8ce10a;font-size: 18px">Waiting for customer confirmation of completion</p>
        @endif
    </div>
@endsection
<style>
    .form-bill{
        margin: auto;
        padding: 50px;
        border-radius: 8px;
        border: #c4c4c4 solid 1px;
        width: 950px;
        max-width: 950px;
    }
    .tieude{
        margin-left: 20%;
        display: flex;
    }
    .ttstore1{
        font-size: 13px;
        margin-left: 50px;
    }
    .ttorder1{
        margin-top: 10px;
        margin-bottom: 10px;
        display: flex;
        width: 800px;
        max-width: 800px;
        justify-content: space-between;
    }
    .order_car{
        margin-left: 30px;
        margin-top: 10px;

    }

</style>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        min-height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        height: 60%;
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;

    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #preview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .preview-image {
        width: 100%;
        height: 100px;
        object-fit: cover;
    }


</style>
