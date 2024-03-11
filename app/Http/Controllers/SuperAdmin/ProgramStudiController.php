<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramStudi;
use App\Models\Guru;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ProgramStudiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $programStudis = ProgramStudi::when($search, function ($query, $search) {
            return $query->where('prodi_id', 'like', '%' . $search . '%')
                ->orWhere('nama_prodi', 'like', '%' . $search . '%')
                ->orWhereHas('ketuaProdi', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', '%' . $search . '%');
                });
        })->paginate(10);

        return view('superadmin.program_studis.index', compact('programStudis', 'search'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('superadmin.program_studis.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required|unique:program_studis,prodi_id',
            'nama_prodi' => 'required',
            'ketua_prodi' => 'required|exists:gurus,id',
        ]);

        ProgramStudi::create($request->all());

        Alert::success('Success', 'Program Studi created successfully!');

        return redirect()->route('superadmin.program_studis.index');
    }

    public function edit($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        $gurus = Guru::all();
        return view('superadmin.program_studis.edit', compact('programStudi', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required|unique:program_studis,prodi_id,' . $id,
            'nama_prodi' => 'required',
            'ketua_prodi' => 'required|exists:gurus,id',
        ]);

        $programStudi = ProgramStudi::findOrFail($id);
        $programStudi->update($request->all());

        Alert::success('Success', 'Program Studi updated successfully!');

        return redirect()->route('superadmin.program_studis.index');
    }

    public function show($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        return view('superadmin.program_studis.show', compact('programStudi'));
    }

    public function destroy($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        $programStudi->delete();

        Alert::success('Success', 'Program Studi deleted successfully!');

        return redirect()->route('superadmin.program_studis.index');
    }
}
