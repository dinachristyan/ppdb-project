<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pendaftaran extends Model
{
    public function jalurMasuk()
    {
        return $this->belongsTo(JalurMasuk::class, 'jalur_masuk_id');
    }

    // Define the relationship with Sekolah
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_pilihan');
    }
    
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'id',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nomor_telepon',
        'email',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'nama_sekolah_asal',
        'alamat_sekolah_asal',
        'nisn',
        'tahun_lulus',
        'nilai_rata_rata',
        'jalur_masuk_id',
        'sekolah_pilihan',
    ];
    public $timestamps =  false;
}
