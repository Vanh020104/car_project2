@extends("admin.layouts.admin_app")
@section("content")
    @if($orders->count() > 0)
        <div style="margin: auto;overflow: auto;max-height:100%">

            <table>
                <h1 style="margin-top: 20px;margin-bottom: 20px;text-align: center;color: darkolivegreen;font-size: 20px" class="text-xl font-bold text-black dark:text-white">Overdue Car Rentals</h1>

                <thead>
                <tr>
                    <th style="text-align: center; border: 1px solid #ddd;">Order Id</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Return Date</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Name Customer</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Telephone</th>
                    <th style="width: 300px; text-align: center; border: 1px solid #ddd;">Email</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Car</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Reminders</th>
                    <th style="text-align: center; border: 1px solid #ddd;">Action</th>
                </tr>
                </thead>
                @foreach($orders as $item)
                    <tbody>
                    <tr>
                        <td style="text-align: center; border: 1px solid #ddd;"># {{$item->id}}</td>
                        @foreach($item->Products as $product)
                            <td style="text-align: center; border: 1px solid #ddd;">
                                {{$product->pivot->end_date}} {{$product->pivot->end_time }}
                            </td>
                        @endforeach
                        <td style="text-align: center; border: 1px solid #ddd;">{{$item->full_name}}</td>
                        <td style="text-align: center; border: 1px solid #ddd;">{{$item->tel}}</td>
                        <td style="width: 200px; word-break: break-all; text-align: center; border: 1px solid #ddd;">{{$item->email}}</td>

                        @foreach($item->Products as $product)
                            <td style="text-align: center; border: 1px solid #ddd;">
                                {{$product->name}}
                            </td>
                        @endforeach
                        <td style="border: 1px solid #ddd;">
                            @foreach($item->time_remind as $remind)
                                <p>{{$remind->time_remind}}</p>
                            @endforeach
                        </td>
                        <td style="border: 1px solid #ddd;">
                            <form action="{{url("admin/remindOverdue",['order'=>$item->id])}}" method="post">
                                @csrf
                                <button style="background-color: #f54e4e;color: white;padding-left: 6px;padding-right: 6px;padding-top: 4px;padding-bottom: 4px;border-radius: 4px">Remind</button>
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
    @else
        <p style="font-size: 25px;text-align: center;color: blue;margin-top: auto;margin-bottom: auto;margin-left: auto;margin-right: auto" class="text-xl font-bold text-black dark:text-white">
            No Overdue Car Rental Applications</p>

    @endif
@endsection
