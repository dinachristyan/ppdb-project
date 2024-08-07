@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran PPDB</title>
    <style>
        body {
            background: url('/img/bgn.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .name {
            margin-top: 35px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 45px;
        }

        .containerr {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .containers {
            width: 45%;
            max-width: 900px;
            margin: 3px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 2px solid #e0e0e0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input[type="text"], input[type="date"], input[type="email"], input[type="number"], textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            padding: 12px 24px;
            background-color: red;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
        }

        .error + input, .error + textarea, .error + select {
            border-color: #dc3545;
        }
    </style>    
</head>
<body>
    <h1 class="name">Form Pendaftaran PPDB</h1>
    <div class="containerr">
        <div class="containers">
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pendaftaran.store') }}" method="POST">
                @csrf
                
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                @error('nama_lengkap')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required>
                @error('tempat_lahir')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                @error('tanggal_lahir')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="agama">Agama:</label>
                <input type="text" id="agama" name="agama" required>
                @error('agama')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" required>
                @error('nomor_telepon')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
        </div>

        <div class="containers">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" id="nama_ayah" name="nama_ayah" required>
                @error('nama_ayah')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                @error('pekerjaan_ayah')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" id="nama_ibu" name="nama_ibu" required>
                @error('nama_ibu')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                @error('pekerjaan_ibu')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nama_wali">Nama Wali:</label>
                <input type="text" id="nama_wali" name="nama_wali">
                @error('nama_wali')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="pekerjaan_wali">Pekerjaan Wali:</label>
                <input type="text" id="pekerjaan_wali" name="pekerjaan_wali">
                @error('pekerjaan_wali')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nama_sekolah_asal">Nama Sekolah Asal:</label>
                <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal" required>
                @error('nama_sekolah_asal')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="alamat_sekolah_asal">Alamat Sekolah Asal:</label>
                <textarea id="alamat_sekolah_asal" name="alamat_sekolah_asal" required></textarea>
                @error('alamat_sekolah_asal')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" required>
                @error('nisn')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="tahun_lulus">Tahun Lulus:</label>
                <input type="number" id="tahun_lulus" name="tahun_lulus" required>
                @error('tahun_lulus')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="nilai_rata_rata">Nilai Rata-rata:</label>
                <input type="number" id="nilai_rata_rata" name="nilai_rata_rata" step="0.01" required>
                @error('nilai_rata_rata')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="jalur_masuk_id">Jalur Masuk:</label>
                <select id="jalur_masuk_id" name="jalur_masuk_id" required>
                    @foreach ($jalurMasuk as $jalur)
                        <option value="{{ $jalur->id }}">{{ $jalur->nama_jalur }}</option>
                    @endforeach
                </select>
                @error('jalur_masuk_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="sekolah_pilihan">Sekolah Pilihan:</label>
                <select id="sekolah_pilihan" name="sekolah_pilihan" required>
                    @foreach ($sekolah as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
                @error('sekolah_pilihan')
                    <div class="error">{{ $message }}</div>
                @enderror


                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

@endsection
