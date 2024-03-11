<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;

class AdminGuruController extends Controller
{
    public function index()
    {
        $username = auth()->user()->username;
        $guru = Guru::where('username', $username)->firstOrFail();

        return view('admin.gurus.index', compact('guru'));
    }
}
