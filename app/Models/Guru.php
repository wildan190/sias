<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'username',
        'nik_guru',
        'name',
        'tanggal_lahir_guru',
        'email_guru',
        'nomor_telepon_guru',
        'alamat_guru',
        'nip_guru',
        'gender',
        'agama_guru',
        'spesialis',
        'foto_guru',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'ketua_prodi', 'name');
    }
}
