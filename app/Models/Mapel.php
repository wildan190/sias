<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'mapel_id',
        'nama_mapel',
        'prodi',
        'kategori',
        'guru_pengampu',
    ];

    // Relationship with ProgramStudi model
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi');
    }

    // Relationship with Guru model
    public function guruPengampu()
    {
        return $this->belongsTo(Guru::class, 'guru_pengampu');
    }
}