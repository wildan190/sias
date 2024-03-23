<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalGuru;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SiswaJadwalController extends Controller
{
    public function index()
    {
        // Ambil id kelas siswa yang terautentikasi
        $kelas_id = Auth::user()->siswa->kelas_id;

        // Cari jadwal pelajaran siswa berdasarkan id kelas
        $jadwalPelajaran = JadwalGuru::where('kelas_id', $kelas_id)->get();

        foreach ($jadwalPelajaran as $jadwal_guru) {
            $jadwal_guru->hari = Carbon::parse($jadwal_guru->hari)->translatedFormat('l');
        }

        return view('user.jadwal.index', compact('jadwalPelajaran'));
    }
}
