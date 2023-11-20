@extends("admin.layouts.admin_app")
@section("content")
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px; /* Chiều rộng tối đa của bảng */
            height: 230px; /* Chiều cao của bảng */
            margin-left: auto; /* Cân nhau khoảng cách trái */
            margin-right: auto; /* Cân nhau khoảng cách phải */
            overflow-y: auto; /* Hiển thị thanh cuộn dọc nếu nội dung vượt quá chiều cao */
        }

        th, td {
            text-align: center;
            padding: 12px;
            border-right: 1px solid #ccc; /* Vạch kẻ ngăn cách các cột */
        }

        th:last-child,
        td:last-child {
            border-right: none; /* Loại bỏ vạch kẻ cho cột cuối cùng */
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #ebebeb;
        }
    </style>

   <div style="display: block;margin-right: auto;margin-left: auto">
    <div> <h2 style="text-align: center;color: #1a1af8;font-size: 28px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">

            Users
        </h2>
        <style>
            .button {
                background-color: #0909f6; /* Màu nền */
                border: none; /* Loại bỏ viền */
                color: white; /* Màu chữ */
                padding: 10px 32px; /* Kích thước nút */
                text-align: center; /* Căn giữa nội dung trong nút */
                text-decoration: none; /* Loại bỏ gạch chân */
                display: inline-block; /* Hiển thị như một khối */
                font-size: 16px; /* Kích thước chữ */
                border-radius: 8px; /* Bo tròn góc */
                transition-duration: 0.4s; /* Thời gian hiệu ứng hover */
                cursor: pointer; /* Biểu tượng con trỏ khi di chuột qua */
                margin-bottom: 20px;
            }

            /* CSS cho hover */
            .button:hover {
                background-color: #45a049; /* Màu nền khi hover */
            }

        </style></div>
       <div>
           <form action="{{url("admin/newUser")}}">
               <button class="button">Create New User</button>
           </form></div>
           <table  >
               <tr>
                   <th style="width: 100px">ID</th>
                   <th style="width: 300px">Name</th>
                   <th style="width: 500px">Email</th>
               </tr>
               @foreach($users as $item)
                   <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->name}}</td>
                       <td>{{$item->email}}</td>
                   </tr>
               @endforeach


               <!-- Thêm các hàng dữ liệu khác ở đây -->
           </table>
       <div style="margin-top: 20px">
           <nav aria-label="Page navigation">
               <ul class="pagination justify-content-center">
                   <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
                       <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                       </a>
                   </li>
                   @for ($i = 1; $i <= $users->lastPage(); $i++)
                       <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                           <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                       </li>
                   @endfor
                   <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                       <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                           <span class="sr-only">Next</span>
                       </a>
                   </li>
               </ul>
           </nav>
       </div>
   </div>
@endsection
