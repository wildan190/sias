<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\ProgramStudi;
use App\Models\Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $siswas = Siswa::with('kelas', 'prodi')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_siswa', 'LIKE', '%' . $search . '%')
                    ->orWhere('nisn', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);

        $semesters = Semester::all();

        return view('superadmin.siswas.index', compact('siswas', 'search', 'semesters'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $prodis = ProgramStudi::all();
        $semesters = Semester::all();
        return view('superadmin.siswas.create', compact('kelas', 'prodis', 'semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:siswas,username',
            'nisn' => 'required|unique:siswas,nisn',
            'nik_siswa' => 'required|unique:siswas,nik_siswa',
            'nama_siswa' => 'required',
            'tanggal_lahir_siswa' => 'required|date',
            'gender_siswa' => 'required|in:Laki-Laki,Perempuan',
            'agama_siswa' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghuchu',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_telepon_siswa' => 'nullable|numeric',
            'email_siswa' => 'required|email|unique:siswas,email_siswa',
            'kelas_id' => 'required|exists:kelas,id',
            'prodi_id' => 'required|exists:program_studis,id',
            'semester_id' => 'required|exists:semesters,id',
            'status' => 'required|in:aktif,lulus,drop out',
            'foto_siswa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'angkatan' => 'required',
            'tanggal_registrasi' => 'required|date',
            'siswa_transfer' => 'required|in:pindahan,bukan pindahan',
            'asal_transfer' => 'nullable',
            'nama_wali_siswa' => 'required',
            'pekerjaan_wali_siswa' => 'required',
            'pendapatan_wali_siswa' => 'required',
            'nomor_telepon_wali' => 'nullable|numeric',
            'email_wali' => 'nullable|email',
            'alamat_wali_siswa' => 'required',
            'kode_pos' => 'required',
        ]);

        $imageName = null;
        if ($request->hasFile('foto_siswa')) {
            $image = $request->file('foto_siswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $siswa = new Siswa($request->all());
        $siswa->foto_siswa = $imageName;
        $siswa->save();

        Alert::success('Success', 'Siswa added successfully!');

        return redirect()->route('superadmin.siswas.index');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $prodis = ProgramStudi::all();
        $semesters = Semester::all();
        return view('superadmin.siswas.edit', compact('siswa', 'kelas', 'prodis', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:siswas,username,' . $id,
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'nik_siswa' => 'required|unique:siswas,nik_siswa,' . $id,
            'nama_siswa' => 'required',
            'tanggal_lahir_siswa' => 'required|date',
            'gender_siswa' => 'required|in:Laki-Laki,Perempuan',
            'agama_siswa' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghuchu',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_telepon_siswa' => 'nullable|numeric',
            'email_siswa' => 'required|email|unique:siswas,email_siswa,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'prodi_id' => 'required|exists:program_studis,id',
            'semester_id' => 'required|exists:semesters,id',
            'status' => 'required|in:aktif,lulus,drop out',
            'foto_siswa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'angkatan' => 'required',
            'tanggal_registrasi' => 'required|date',
            'siswa_transfer' => 'nullable|in:pindahan,bukan pindahan',
            'asal_transfer' => 'nullable',
            'nama_wali_siswa' => 'required',
            'pekerjaan_wali_siswa' => 'required',
            'pendapatan_wali_siswa' => 'required',
            'nomor_telepon_wali' => 'nullable|numeric',
            'email_wali' => 'nullable|email',
            'alamat_wali_siswa' => 'required',
            'kode_pos' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        if ($request->hasFile('foto_siswa')) {
            $image = $request->file('foto_siswa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $siswa->foto_siswa = $imageName;
            $siswa->save();
        }

        Alert::success('Success', 'Siswa updated successfully!');

        return redirect()->route('superadmin.siswas.index');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('superadmin.siswas.show', compact('siswa'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        Alert::success('Success', 'Siswa deleted successfully!');

        return redirect()->route('superadmin.siswas.index');
    }

    public function exportPdf($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pdf = PDF::loadView('superadmin.siswas.export-pdf', compact('siswa'));

        //return $pdf->download('siswa_card.pdf');
        return $pdf->download('siswa_card.pdf'.$siswa->id.'.pdf');
    }
}
