<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sekolah;
use App\Models\JalurMasuk;


class Siswas extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'id',
        'nama_lengkap',
        'alamat',
        'jalur_masuk_id',
        'sekolah_pilihan',
        'status',
    ];

    public function JalurMasuk()
    {
        return $this->belongsTo(JalurMasuk::class, 'jalur_masuk_id');
    }

    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_pilihan');
    }
}
