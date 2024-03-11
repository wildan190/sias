<?php

// app/Models/ProgramStudi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'prodi_id',
        'nama_prodi',
        'ketua_prodi',
    ];

    // Relasi dengan model Guru
    public function ketuaProdi()
    {
        return $this->belongsTo(Guru::class, 'ketua_prodi');
    }
}
