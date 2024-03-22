<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalGuru;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminJadwalGuruController extends Controller
{
    public function index()
    {
        // Ambil username guru yang sedang terautentikasi
        $username = Auth::user()->username;

        // Cari jadwal guru berdasarkan username
        $jadwalGurus = JadwalGuru::whereHas('guru', function ($query) use ($username) {
            $query->where('username', $username);
        })->get();

        // Memformat tanggal menjadi nama hari menggunakan Carbon
        foreach ($jadwalGurus as $jadwal_guru) {
            $jadwal_guru->hari = Carbon::parse($jadwal_guru->hari)->translatedFormat('l');
        }

        return view('admin.jadwal_gurus.index', compact('jadwalGurus'));
    }
}
