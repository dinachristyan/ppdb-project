<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan class Transaksi yang merupakan turunan dari class Model
class Transaksi extends Model
{
    // Menggunakan trait HasFactory untuk mengaktifkan fitur factory pada model ini
    use HasFactory;

    // Mendefinisikan nama tabel yang akan dihubungkan dengan model ini
    protected $table = 'transaksis';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'siswa_id',
        'jalur_masuk_id',
        'sekolah_id',
        'tanggal_pendaftaran',
        'status',
    ];
}
