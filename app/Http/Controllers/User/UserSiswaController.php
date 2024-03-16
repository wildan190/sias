<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class UserSiswaController extends Controller
{
    public function index()
    {
        $username = auth()->user()->username;
        $siswa = Siswa::where('username', $username)->firstOrFail();

        return view('user.siswas.index', compact('siswa'));
    }
}
