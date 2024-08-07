<?php

namespace App\Http\Controllers;

// Mengimpor kelas Request, Hash, User, Session, dan Str dari Laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Str;

// Mendefinisikan kelas RegisterController yang mengextends Controller
class RegisterController extends Controller
{
    // Fungsi untuk menampilkan halaman register
    public function register()
    {
        // Menampilkan halaman register
        return view('register');
    }

    // Fungsi untuk memproses aksi register
    public function actionregister(Request $request)
    {
        // Membuat pengguna baru dengan data yang diberikan
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Meng-hash password sebelum disimpan
            'verify_key' => Str::random(40), // Menghasilkan kunci verifikasi acak
            'active' => 1 // Menetapkan akun pengguna sebagai aktif
        ]);

        // Membuat pesan sukses di sesi
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        
        // Mengarahkan pengguna kembali ke halaman register
        return redirect('register');
    }
}
