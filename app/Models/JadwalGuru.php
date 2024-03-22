<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_pelajaran_id',
        'guru_id',
        'kelas_id',
        'hari',
        'waktu'
    ];

    // Relasi dengan model Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mata_pelajaran_id');
    }

    // Relasi dengan model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Relasi dengan model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
