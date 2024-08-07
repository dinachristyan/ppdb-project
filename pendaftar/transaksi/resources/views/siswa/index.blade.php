@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Pendaftaran</title>
        <style>
            body {
                background: url('/img/bgn.jpg') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                min-height: 100vh; /* Ensures the body takes at least the full height of the viewport */
            }

            .content {
                flex: 1; /* Allows the content to grow and fill the space above the footer */
            }

            h1 {
                text-align: center;
                color: #333;
                margin-top: 50px;
                font-size: 35px;
            }

            .containerr {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

            .table-container {
                width: 80%;
                max-width: 1200px;
                padding: 20px;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border: 2px solid #e0e0e0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 12px;
                border: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #f4f4f4;
                font-weight: bold;
                color: #333;
            }

            tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tbody tr:hover {
                background-color: #e0e0e0;
            }

            footer {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 15px;
                border-top: 2px solid #e0e0e0;
            }

            footer p {
                margin: 0;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>Pengumuman Siswa</h1>
            <div class="containerr">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Jalur Masuk</th>
                                <th>Sekolah Pilihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendaftarans as $pendaftaran)
                            <tr>
                                <td>{{ $pendaftaran->id }}</td>
                                <td>{{ $pendaftaran->nama_lengkap }}</td>
                                <td>{{ $pendaftaran->alamat }}</td>
                                <td>{{ $pendaftaran->JalurMasuk->nama_jalur }}</td>
                                <td>{{ $pendaftaran->Sekolah->nama }}</td>
                                <td>{{ $pendaftaran->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection
