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
        $kelasId = Auth::user()->siswa->kelas_id;
        $jadwalPelajaran = $this->getJadwalPelajaran($kelasId);

        foreach ($jadwalPelajaran as $jadwalGuru) {
            $jadwalGuru->hari = $this->formatHari($jadwalGuru->hari);
        }

        return view('user.jadwal.index', compact('jadwalPelajaran'));
    }

    private function getJadwalPelajaran($kelasId)
    {
        return JadwalGuru::where('kelas_id', $kelasId)->get();
    }

    private function formatHari($hari)
    {
        return Carbon::parse($hari)->translatedFormat('l');
    }
}
