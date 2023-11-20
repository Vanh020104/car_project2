@extends("admin.layouts.admin_app")
@section("content")



        <div style="margin: auto;overflow: auto;max-height:100%">
           @if($feedback_today->count() > 0)
                <table >
                    <h1 style="margin-top: 20px;margin-bottom: 20px;text-align: center;color: darkolivegreen;font-size: 20px" class="text-xl font-bold text-black dark:text-white" >Feedbacks New</h1>

                    <thead>
                    <tr>
                        <th style="text-align: center">NameCustomer</th>
                        <th style="text-align: center">NameCar</th>
                        <th style="width: 230px;text-align: center">Thumbnail</th>
                        <th style="width: 300px;text-align: center">Feedback</th>
                        <th style="text-align: center">Rating</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    @foreach($feedback_today as $item)
                        <tbody>
                        <tr>
                            <td style="text-align: center">{{$item->user->name}}</td>
                            <td style="text-align: center;">{{$item->product->name}}</td>
                            <td><img style="border-radius: 4px" src="{{$item->product->thumbnail}}" alt=""></td>
                            <td style=" width: 200px; /* Đặt chiều rộng của phần tử chứa văn bản */
 word-break: break-all;">{{$item->feedback}}</td>
                            <td style="text-align: center">
                                @for($i = 1 ;$i<=$item->rating;$i++)
                                    <i style="color: #cece05" class="fa-solid fa-star"></i>
                                @endfor
                            </td>
                            <td>
                                <form action="{{url("admin/deleteFeedback",['feedback'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button style="margin-top: 7px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" onclick="return confirm('You definitely want to delete order feedback ')" class="btn btn-outline-danger" type="submit"><i style="margin-right: 6px" class="fa-regular fa-trash-can"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
            <table >
                <h1 style="margin-top: 20px;margin-bottom: 20px;text-align: center;color: darkolivegreen;font-size: 28px" class="text-xl font-bold text-black dark:text-white" >Feedbacks</h1>

                <thead>
                <tr>
                    <th style="text-align: center">NameCustomer</th>
                    <th style="text-align: center">NameCar</th>
                    <th style="width: 230px;text-align: center">Thumbnail</th>
                    <th style="width: 300px;text-align: center">Feedback</th>
                    <th style="text-align: center">Rating</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                @foreach($feedbacks as $item)
                    <tbody>
                    <tr>
                        <td style="text-align: center">{{$item->user->name}}</td>
                        <td style="text-align: center;">{{$item->product->name}}</td>
                        <td><img style="border-radius: 4px" src="{{$item->product->thumbnail}}" alt=""></td>
                        <td style=" width: 200px; /* Đặt chiều rộng của phần tử chứa văn bản */
 word-break: break-all;">{{$item->feedback}}</td>
                        <td style="text-align: center">
                            @for($i = 1 ;$i<=$item->rating;$i++)
                                <i style="color: #cece05" class="fa-solid fa-star"></i>
                            @endfor
                        </td>
                        <td>
                            <form action="{{url("admin/deleteFeedback",['feedback'=>$item->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button style="margin-top: 7px;border: red solid 1px;border-radius: 6px;background-color: red;color: white;padding-left: 17px;padding-right: 17px;padding-top: 4px;padding-bottom: 4px" onclick="return confirm('You definitely want to delete order feedback ')" class="btn btn-outline-danger" type="submit"><i style="margin-right: 6px" class="fa-regular fa-trash-can"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                th {
                    background-color: #4CAF50;
                    color: white;
                }
            </style>
        </div>
@endsection
