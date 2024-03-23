<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\JadwalGuru;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalGuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', ''); // Inisialisasi variabel $search

        $query = JadwalGuru::query();

        // Lakukan filter berdasarkan pencarian jika ada
        if ($search) {
            $query->where('mata_pelajaran_id', 'like', '%' . $search . '%')
                ->orWhereHas('guru', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('kelas', function ($query) use ($search) {
                    $query->where('nama_kelas', 'like', '%' . $search . '%');
                })
                ->orWhere('hari', 'like', '%' . $search . '%')
                ->orWhere('waktu', 'like', '%' . $search . '%');
        }

        // Ambil data jadwal guru dengan pagination
        $jadwal_gurus = $query->paginate(10);

        foreach ($jadwal_gurus as $jadwal_guru) {
            $jadwal_guru->hari = Carbon::parse($jadwal_guru->hari)->translatedFormat('l');
        }

        // Render view index.blade.php dan kirimkan data jadwal_gurus dan search ke view
        return view('superadmin.jadwal_gurus.index', compact('jadwal_gurus', 'search'));
    }

    public function create()
    {
        $mapels = Mapel::all();
        $gurus = Guru::all();
        $kelas = Kelas::all();
        return view('superadmin.jadwal_gurus.create', compact('mapels', 'gurus', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_pelajaran_id' => 'required|exists:mapels,id',
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);

        JadwalGuru::create($request->all());

        Alert::success('Success', 'Teachers Created Updated successfully!');

        return redirect()->route('superadmin.jadwal_gurus.index');
    }

    public function edit($id)
    {
        $jadwalGuru = JadwalGuru::findOrFail($id);
        $mapels = Mapel::all();
        $gurus = Guru::all();
        $kelas = Kelas::all();
        return view('superadmin.jadwal_gurus.edit', compact('jadwalGuru', 'mapels', 'gurus', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_pelajaran_id' => 'required|exists:mapels,id',
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);

        $jadwalGuru = JadwalGuru::findOrFail($id);
        $jadwalGuru->update($request->all());

        Alert::success('Success', 'Teachers Schedule Updated successfully!');

        return redirect()->route('superadmin.jadwal_gurus.index');
    }

    public function show($id)
    {
        $jadwalGuru = JadwalGuru::findOrFail($id);
        return view('superadmin.jadwal_gurus.show', compact('jadwalGuru'));
    }


    public function destroy($id)
    {
        $jadwalGuru = JadwalGuru::findOrFail($id);
        $jadwalGuru->delete();

        Alert::success('Success', 'Teachers Deleted Updated successfully!');

        return redirect()->route('superadmin.jadwal_gurus.index');
    }
}
