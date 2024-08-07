<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - APLIKASI PPDB</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 400px;
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
        .alert-danger {
            margin-top: 15px;
            border-radius: 25px;
            background: #F44336; /* Red background for alert */
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
    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center"><b>PPDB</b><br>Harap Login Dahulu!</h2>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="register">Register</a> sekarang!</p>
            </form>
        </div>
    </div>
</body>
</html>
