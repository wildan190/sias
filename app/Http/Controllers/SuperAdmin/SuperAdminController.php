<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('superadmin.index', compact('users', 'search'));
    }
    /*
    public function index()
    {
        // Ambil semua pengguna untuk ditampilkan di halaman superadmin
        $users = User::paginate(10);

        // Tampilkan halaman superadmin dengan data pengguna
        return view('superadmin.index', compact('users'));
    }*/

    public function updateUserRoles(Request $request)
    {
        $request->validate([
            'roles.*' => 'required|in:superadmin,admin,user',
        ]);

        foreach ($request->roles as $userId => $role) {
            User::find($userId)->update(['role' => $role]);
        }

        Alert::success('Success', 'User roles updated successfully.');

        return redirect()->route('superadmin.index')->with('success', 'User roles updated successfully.');
    }
}
