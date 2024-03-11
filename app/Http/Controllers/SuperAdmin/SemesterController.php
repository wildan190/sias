<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SemesterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $semesters = Semester::when($search, function ($query, $search) {
            return $query->where('nama_semester', 'like', '%' . $search . '%')
                ->orWhere('deskripsi_semester', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('superadmin.semesters.index', compact('semesters', 'search'));
    }

    // Tambahkan method lain sesuai kebutuhan

    // Contoh method untuk menampilkan halaman create
    public function create()
    {
        return view('superadmin.semesters.create');
    }

    // Contoh method untuk menyimpan data dari form create
    public function store(Request $request)
    {
        $request->validate([
            'nama_semester' => 'required',
            'deskripsi_semester' => 'nullable',
        ]);

        Semester::create($request->all());

        Alert::success('Berhasil', 'Data berhasil disimpan!');

        return redirect()->route('superadmin.semesters.index')
            ->with('success', 'Semester created successfully');
    }

    // Contoh method untuk menampilkan halaman edit
    public function edit(Semester $semester)
    {
        return view('superadmin.semesters.edit', compact('semester'));
    }

    // Contoh method untuk menyimpan data dari form edit
    public function update(Request $request, $id)
    {
        // Validasi input fields
        $request->validate([
            'editNamaSemester' => 'required',
            'editDeskripsiSemester' => 'required',
        ]);

        // Update data semester
        $semester = Semester::findOrFail($id);
        $semester->update([
            'nama_semester' => $request->editNamaSemester,
            'deskripsi_semester' => $request->editDeskripsiSemester,
        ]);

        // Tampilkan SweetAlert
        alert()->success('Berhasil', 'Data semester berhasil diupdate!');

        // Redirect atau refresh halaman
        return redirect()->route('superadmin.semesters.index');
    }

    // Contoh method untuk menghapus data
    public function destroy(Semester $semester)
    {
        $semester->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus!');

        return redirect()->route('superadmin.semesters.index')
            ->with('success', 'Semester deleted successfully');
    }
}
