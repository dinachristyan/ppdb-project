<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        body {
            background: linear-gradient(135deg, #C62828, #B71C1C);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #fff;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            color: #333;
        }
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #C62828;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: #C62828;
            border-color: #C62828;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background: #B71C1C;
            border-color: #B71C1C;
        }
        .form-control {
            border-radius: 25px;
            border-color: #C62828;
        }
        .alert-success {
            margin-top: 15px;
            border-radius: 25px;
            background: green; /* Red background for alert */
            color: #fff; /* White text for alert */
        }
        .text-center a {
            color: #C62828;
            font-weight: bold;
        }
        .text-center a:hover {
            color: #B71C1C;
        }
    </style>
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER USER</h2>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="/">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>
