@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>PPDB SMPN</title>
    <style>
        body {
            background: url('/img/bgn.jpg') no-repeat center center fixed;
            background-size: cover;
        }
       .hero {
            border-radius: 10px;    
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
            box-sizing: border-box;
        }
       .hero-content {
            background: linear-gradient(to right, #000000);
            border-radius: 15px;
            padding: 40px;
            width: 45%;
            max-width: 550px;
            text-align: center;
            margin-right: 0px;
        }
       .btn-custom {
            margin: 5px;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 1rem;
        }

       .hero-image {
            width: 1300px;
            border-radius: 30px;
        }
        .btn-primary {
        background-color: #007bff;
        }

    </style>
</head>
<body>
    <div class="hero">
        <img src="/img/ppdb.png" alt="PPDB SMPN" class="hero-image">
    </div>
</body>
</html>
@endsection