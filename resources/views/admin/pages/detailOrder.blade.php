
@extends("admin.layouts.admin_app")
@section("content")
    <div class="form-bill">

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
                    <th style="width: 200px;"  scope="col">Vehicle pick up time</th>
                    <th style="width: 200px;"  scope="col">Car return time</th>
                    <th style="width: 100px" scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->Products as $item)
                    <tr>

                        <th scope="row">{{$item->name}}</th>
                        <th scope="row"><img style="width: 180px;border-radius: 3px;margin-top: 15px" src="{{$item->thumbnail}}" alt=""></th>
                        <th scope="row">{{$item->pivot->start_date}}</th>
                        <th scope="row">{{$item->pivot->end_date}}</th>
                        <th scope="row">{{$order->grand_total}}</th>



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
            <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div style="display:flex;justify-content: space-between"     class="btn-xn">
                    <button  style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                    <button style="margin-right:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px"  type="submit" name="status" value="2">Car is Being Delivered</button>
                </div>
            </form>
        @endif
        @if($order->status == 2)

            <div style="display:flex;justify-content: space-between" class="btn-xn">
                <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="4">Return</button>
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
                                <button style="float:right;margin-left:50px;margin-bottom:10px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" name="status" value="3" type="submit">Submit</button>
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
        @if($order->status == 4)
            <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div style="display:flex;justify-content: space-between" class="btn-xn">
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="6">Cancel</button>
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="2">Car is Being Delivered</button></div>
            </form>
        @endif
        @if($order->status == 5)
            <form action="{{url("admin/updateStatus",['order'=>$order->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div style="display:flex;justify-content: space-between"  class="btn-xn">
                    <a style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: #f64242;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" href="">
                        Damages</a>
                    <button style="margin-left:50px;margin-top: 15px;border: red solid 1px;border-radius: 6px;background-color: blue;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" type="submit" name="status" value="7">Complete</button>
                </div>
            </form>
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

