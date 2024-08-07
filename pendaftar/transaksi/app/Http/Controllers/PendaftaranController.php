<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\JalurMasuk;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function create()
    {
        $jalurMasuk = JalurMasuk::get();
        $sekolah = Sekolah::get();
        
        return view('pendaftaran.create', ['jalurMasuk' => $jalurMasuk, 'sekolah' => $sekolah]);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'nama_sekolah_asal' => 'required|string|max:255',
            'alamat_sekolah_asal' => 'required|string',
            'nisn' => 'required|string|max:20',
            'tahun_lulus' => 'required|integer',
            'nilai_rata_rata' => 'required|numeric',
            'jalur_masuk_id' => 'required',
            'sekolah_pilihan' => 'required',
        ]);

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil dilakukan.');
    }
}
