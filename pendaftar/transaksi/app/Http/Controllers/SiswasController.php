<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswas;


class SiswasController extends Controller
{
    public function index()
    {
        // Fetch pendaftaran data with related jalurMasuk and sekolah data
        $pendaftarans = Siswas::with(['JalurMasuk', 'Sekolah'])->get();
        
        return view('siswa.index')->with(['pendaftarans' => $pendaftarans]);
    }
    
}
