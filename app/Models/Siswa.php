<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'nisn',
        'nik_siswa',
        'nama_siswa',
        'tanggal_lahir_siswa',
        'gender_siswa',
        'agama_siswa',
        'golongan_darah',
        'kewarganegaraan',
        'hobi',
        'nomor_telepon_siswa',
        'email_siswa',
        'kelas_id',
        'prodi_id',
        'semester_id',
        'status',
        'foto_siswa',
        'sekolah_asal',
        'angkatan',
        'tanggal_registrasi',
        'siswa_transfer',
        'asal_transfer',
        'nama_wali_siswa',
        'pekerjaan_wali_siswa',
        'pendapatan_wali_siswa',
        'nomor_telepon_wali',
        'email_wali',
        'alamat_wali_siswa',
        'kode_pos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
}
