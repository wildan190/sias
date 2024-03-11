<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $gurus = Guru::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('superadmin.gurus.index', compact('gurus', 'search'));
    }

    public function create()
    {
        return view('superadmin.gurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'nullable|string|max:255|unique:gurus',
            'nik_guru' => 'required|string|max:255|unique:gurus',
            'name' => 'required|string|max:255',
            'tanggal_lahir_guru' => 'required|date',
            'email_guru' => 'required|email|unique:gurus',
            'nomor_telepon_guru' => 'required|string|max:20',
            'alamat_guru' => 'required|string',
            'nip_guru' => 'required|string|max:255|unique:gurus',
            'gender' => 'required|string|in:Laki-Laki,Perempuan',
            'agama_guru' => 'required|string|max:255',
            'spesialis' => 'nullable|string|max:255',
            'foto_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses menyimpan file foto
        if ($request->hasFile('foto_guru')) {
            $foto = $request->file('foto_guru');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_guru', $nama_foto);
        } else {
            $nama_foto = null; // Atau berikan nilai default jika tidak ada file yang diunggah
        }

        // Proses menyimpan data
        Guru::create(array_merge($request->all(), ['foto_guru' => $nama_foto]));

        Alert::success('Success', 'Guru created successfully!');

        return redirect()->route('superadmin.gurus.index');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('superadmin.gurus.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:gurus,username,' . $id,
            'nik_guru' => 'required|string|max:255|unique:gurus,nik_guru,' . $id,
            'name' => 'required|string|max:255',
            'tanggal_lahir_guru' => 'required|date',
            'email_guru' => 'required|email|unique:gurus,email_guru,' . $id,
            'nomor_telepon_guru' => 'required|string|max:20',
            'alamat_guru' => 'required|string',
            'nip_guru' => 'required|string|max:255|unique:gurus,nip_guru,' . $id,
            'gender' => 'required|string|in:Laki-Laki,Perempuan',
            'agama_guru' => 'required|string|max:255',
            'spesialis' => 'nullable|string|max:255',
            'foto_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data guru
        $guru = Guru::findOrFail($id);

        // Proses menyimpan file foto
        if ($request->hasFile('foto_guru')) {
            // Hapus foto lama jika ada
            if ($guru->foto_guru) {
                Storage::delete('public/foto_guru/' . $guru->foto_guru);
            }

            $foto = $request->file('foto_guru');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_guru', $nama_foto);

            // Update atribut 'foto_guru'
            $guru->foto_guru = $nama_foto;
        }

        // Update data guru
        $guru->update($request->except('foto_guru'));

        Alert::success('Success', 'Guru updated successfully!');

        return redirect()->route('superadmin.gurus.index');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('superadmin.gurus.show', compact('guru'));
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        Alert::success('Success', 'Guru deleted successfully!');

        return redirect()->route('superadmin.gurus.index');
    }
}
