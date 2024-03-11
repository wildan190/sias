<?php

// app/Models/Kelas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas',
        'prodi_id',
        'wali_kelas_id',
    ];

    // Relasi dengan ProgramStudi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    // Relasi dengan Guru (Wali Kelas)
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
}
