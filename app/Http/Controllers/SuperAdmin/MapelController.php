<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $mapels = Mapel::with('guruPengampu', 'programStudi')
            ->when($search, function ($query, $search) {
                return $query->where('nama_mapel', 'like', '%' . $search . '%')
                    ->orWhere('mapel_id', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('superadmin.mapels.index', compact('mapels', 'search'));
    }

    public function create()
    {
        $gurus = Guru::all();
        $program_studis = ProgramStudi::all();
        return view('superadmin.mapels.create', compact('gurus', 'program_studis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|unique:mapels',
            'nama_mapel' => 'required',
            'kategori' => 'required|in:produktif,umum',
            'prodi' => 'required|exists:program_studis,id',
            'guru_pengampu' => 'required|exists:gurus,id',
        ]);

        Mapel::create($request->all());

        Alert::success('Success', 'Mapel added successfully!');

        return redirect()->route('superadmin.mapels.index');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $gurus = Guru::all();
        $program_studis = ProgramStudi::all();
        return view('superadmin.mapels.edit', compact('mapel', 'gurus', 'program_studis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel_id' => 'nullable|unique:mapels,mapel_id,' . $id,
            'nama_mapel' => 'required',
            'kategori' => 'required|in:produktif,umum',
            'prodi' => 'required|exists:program_studis,id',
            'guru_pengampu' => 'required|exists:gurus,id',
        ]);

        $mapel = Mapel::findOrFail($id);

        $mapel->update($request->all());

        Alert::success('Success', 'Mapel updated successfully!');

        return redirect()->route('superadmin.mapels.index');
    }

    public function show($id)
    {
        $mapel = Mapel::findOrFail($id);

        return view('superadmin.mapels.show', compact('mapel'));
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        Alert::success('Success', 'Mapel deleted successfully!');

        return redirect()->route('superadmin.mapels.index');
    }
}
