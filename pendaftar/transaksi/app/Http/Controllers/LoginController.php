<?php

namespace App\Http\Controllers;

// Mengimpor kelas Request dan Auth dari Laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

// Mendefinisikan kelas LoginController yang mengextends Controller
class LoginController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function login()
    {
        // Memeriksa apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman home
            return redirect('home');
        } else {
            // Jika belum login, tampilkan halaman login
            return view('login');
        }
    }

    // Fungsi untuk memproses aksi login
    public function actionlogin(Request $request)
    {
        // Mengambil input email dan password dari request
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        // Mencoba untuk login dengan data yang diberikan
        if (Auth::Attempt($data)) {
            // Jika login berhasil, arahkan ke halaman home
            return redirect('home');
        } else {
            // Jika login gagal, buat pesan error dan arahkan kembali ke halaman login
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    // Fungsi untuk memproses aksi logout
    public function actionlogout()
    {
        // Logout pengguna
        Auth::logout();
        // Arahkan ke halaman login setelah logout
        return redirect('/');
    }
}
