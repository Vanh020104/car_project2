@extends("admin.layouts.admin_app")
@section("content")



        <div style="margin: auto"><table>
                <thead>
                <tr>
                    <th>NameCustomer</th>
                    <th>NameCar</th>
                    <th style="width: 230px;text-align: center">Thumbnail</th>
                    <th style="width: 300px">FeedBack</th>
                    <th>Rating</th>
                </tr>
                </thead>
                @foreach($feedbacks as $item)
                    <tbody>
                    <tr>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->product->name}}</td>
                        <td><img style="border-radius: 4px" src="{{$item->product->thumbnail}}" alt=""></td>
                        <td style=" width: 200px; /* Đặt chiều rộng của phần tử chứa văn bản */
 word-break: break-all;">{{$item->feedback}}</td>
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
