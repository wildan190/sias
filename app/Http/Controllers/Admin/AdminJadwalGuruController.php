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
        try {
            $user = Auth::user();
            if (!$user) {
                throw new \Exception("User not authenticated.");
            }

            $username = $user->username;
            $jadwalGurus = JadwalGuru::whereHas('guru', function ($query) use ($username) {
                $query->where('username', $username);
            })->get();

            foreach ($jadwalGurus as $jadwalGuru) {
                $jadwalGuru->hari = Carbon::parse($jadwalGuru->hari)->translatedFormat('l');
            }

            return view('admin.jadwal_gurus.index', compact('jadwalGurus'));
        } catch (\Exception $e) {
            // Handle exceptions here, e.g., log them or redirect to an error page.
            return response()->view('errors.500', [], 500);
        }
    }
}
