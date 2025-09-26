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
        "tanggal_lahir", // perbaiki typo
        "alamat",
        "jurusan",
        "angkatan",
        "no_hp",
        "added_by",
        "is_active"
    ];
}
