<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Kelas::with(['waliKelas', 'prodi']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kelas', 'like', '%' . $search . '%')
                    ->orWhereHas('prodi', function ($prodi) use ($search) {
                        $prodi->where('nama_prodi', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('waliKelas', function ($waliKelas) use ($search) {
                        $waliKelas->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $kelas = $query->paginate(15);
        $gurus = Guru::all();
        $prodis = ProgramStudi::all();

        return view('superadmin.kelas.index', compact('kelas', 'search', 'gurus', 'prodis'));
    }


    public function create()
    {
        $gurus = Guru::all();
        $prodis = ProgramStudi::all();
        return view('superadmin.kelas.create', compact('gurus', 'prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'prodi_id' => 'required|exists:program_studis,id',
            'wali_kelas_id' => 'required|exists:gurus,id',
        ]);

        Kelas::create($request->all());

        Alert::success('Success', 'Kelas added successfully!');

        return redirect()->route('superadmin.kelas.index');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $gurus = Guru::all();
        $prodis = ProgramStudi::all();
        return view('superadmin.kelas.edit', compact('kelas', 'gurus', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'prodi_id' => 'required|exists:program_studis,id',
            'wali_kelas_id' => 'required|exists:gurus,id',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        Alert::success('Success', 'Kelas updated successfully!');

        return redirect()->route('superadmin.kelas.index');
    }

    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('superadmin.kelas.show', compact('kelas'));
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        Alert::success('Success', 'Kelas deleted successfully!');

        return redirect()->route('superadmin.kelas.index');
    }
}
