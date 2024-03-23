<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalGuru;
use Carbon\Carbon;

class SiswaJadwalController extends Controller
{
    public function index($kelas_id)
    {
        // Cari jadwal guru berdasarkan id kelas
        $jadwalGurus = JadwalGuru::where('kelas_id', $kelas_id)->get();

        // Memformat tanggal menjadi nama hari menggunakan Carbon
        foreach ($jadwalGurus as $jadwal_guru) {
            $jadwal_guru->hari = Carbon::parse($jadwal_guru->hari)->translatedFormat('l');
        }

        return view('user.jadwal.index', compact('jadwalGurus'));
    }
}
