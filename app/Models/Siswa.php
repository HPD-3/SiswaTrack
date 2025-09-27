<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        "nisn",
        "nama_lengkap",
        "tempat_lahir",
        "tanggal_lahir",
        "alamat",
        "jurusan_id",
        "kelas_id",
        "angkatan",
        "no_hp",
        "added_by",
        "teacher_id",
        "user_id",
        "is_active"
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
