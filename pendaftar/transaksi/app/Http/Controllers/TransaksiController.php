<?php

// Menentukan namespace dari file ini. Namespace adalah cara untuk mengatur kode agar lebih terstruktur.
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel. Class ini digunakan untuk menangani request HTTP yang masuk.
use Illuminate\Http\Request;

// Mengimpor model Transaksi yang akan digunakan untuk berinteraksi dengan tabel 'transaksis' di database.
use App\Models\Transaksi;

// Mendefinisikan class TransaksiController yang merupakan turunan dari class Controller.
class TransaksiController extends Controller
{
    // Mendefinisikan method index. Method ini akan dipanggil saat ada request ke endpoint yang terkait.
    public function index()
    {
        // Mengambil semua data dari tabel 'transaksis' menggunakan model Transaksi.
        $transaksis = Transaksi::all();

        // Mengembalikan view 'transaksi.index' dan mengirimkan data $transaksis ke view tersebut.
        return view('transaksi.index', compact('transaksis'));
    }
}
