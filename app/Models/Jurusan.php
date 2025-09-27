<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'kode_jurusan',
        'deskripsi',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
