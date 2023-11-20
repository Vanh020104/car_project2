@extends("admin.layouts.admin_app")
@section("content")
    <style>
        .form-container {
            width: 500px;
            height: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background-color: blue;
            border: none;
            color: white;
            padding: 4px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    </head>
    <body>

    <div class="form-container" style="margin-top: auto;margin-bottom: auto">
        <form style="padding-left: 30px;padding-right: 30px" action="{{url("admin/newUser")}}" method="post">
            @csrf
            <div><h2 style="text-align: center;color: #1a1af8;font-size: 25px;margin-top: 20px;margin-bottom: 20px" class="text-xl font-bold text-black dark:text-white">

                    Create New User
                </h2></div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div style="text-align: right">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>
    </div>

@endsection
