<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Absensi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@siswatrack.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Teacher User
        User::create([
            'name' => 'Guru',
            'email' => 'guru@siswatrack.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // Create Student User
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@siswatrack.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        // Create Jurusan
        $jurusan1 = Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
            'kode_jurusan' => 'TI',
            'deskripsi' => 'Jurusan yang mempelajari teknologi informasi dan komputer',
            'is_active' => true,
        ]);

        $jurusan2 = Jurusan::create([
            'nama_jurusan' => 'Teknik Mesin',
            'kode_jurusan' => 'TM',
            'deskripsi' => 'Jurusan yang mempelajari mesin dan peralatan teknik',
            'is_active' => true,
        ]);

        $jurusan3 = Jurusan::create([
            'nama_jurusan' => 'Teknik Elektro',
            'kode_jurusan' => 'TE',
            'deskripsi' => 'Jurusan yang mempelajari kelistrikan dan elektronika',
            'is_active' => true,
        ]);

        // Create Kelas
        $kelas1 = Kelas::create([
            'nama_kelas' => 'X TI 1',
            'tingkat' => 'X',
            'jurusan_id' => $jurusan1->id,
            'wali_kelas_id' => 2, // Guru
            'deskripsi' => 'Kelas X Teknik Informatika 1',
            'is_active' => true,
        ]);

        $kelas2 = Kelas::create([
            'nama_kelas' => 'XI TI 1',
            'tingkat' => 'XI',
            'jurusan_id' => $jurusan1->id,
            'wali_kelas_id' => 2, // Guru
            'deskripsi' => 'Kelas XI Teknik Informatika 1',
            'is_active' => true,
        ]);

        // Create Siswa
        Siswa::create([
            'nisn' => '1234567890',
            'nama_lengkap' => 'Ahmad Rizki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2005-01-15',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            'jurusan_id' => $jurusan1->id,
            'kelas_id' => $kelas1->id,
            'angkatan' => '2023',
            'no_hp' => '081234567890',
            'added_by' => 1, // Admin
            'teacher_id' => 2, // Guru
            'user_id' => 3, // Student user
            'is_active' => true,
        ]);

        Siswa::create([
            'nisn' => '1234567891',
            'nama_lengkap' => 'Siti Nurhaliza',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2005-03-20',
            'alamat' => 'Jl. Sudirman No. 456, Bandung',
            'jurusan_id' => $jurusan1->id,
            'kelas_id' => $kelas1->id,
            'angkatan' => '2023',
            'no_hp' => '081234567891',
            'added_by' => 1, // Admin
            'teacher_id' => 2, // Guru
            'is_active' => true,
        ]);

        Siswa::create([
            'nisn' => '1234567892',
            'nama_lengkap' => 'Budi Santoso',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2004-07-10',
            'alamat' => 'Jl. Diponegoro No. 789, Surabaya',
            'jurusan_id' => $jurusan1->id,
            'kelas_id' => $kelas2->id,
            'angkatan' => '2022',
            'no_hp' => '081234567892',
            'added_by' => 1, // Admin
            'teacher_id' => 2, // Guru
            'is_active' => true,
        ]);

        // Create some sample Nilai
        Nilai::create([
            'siswa_id' => 1,
            'mata_pelajaran' => 'Matematika',
            'nilai' => 85.5,
            'semester' => '1',
            'tahun_ajaran' => '2023/2024',
            'jenis_nilai' => 'uts',
            'keterangan' => 'Nilai UTS Matematika',
            'guru_id' => 2,
        ]);

        Nilai::create([
            'siswa_id' => 1,
            'mata_pelajaran' => 'Bahasa Indonesia',
            'nilai' => 90.0,
            'semester' => '1',
            'tahun_ajaran' => '2023/2024',
            'jenis_nilai' => 'tugas',
            'keterangan' => 'Nilai Tugas Bahasa Indonesia',
            'guru_id' => 2,
        ]);

        // Create some sample Absensi
        Absensi::create([
            'siswa_id' => 1,
            'tanggal' => today(),
            'status' => 'hadir',
            'keterangan' => 'Hadir tepat waktu',
            'guru_id' => 2,
        ]);

        Absensi::create([
            'siswa_id' => 2,
            'tanggal' => today(),
            'status' => 'hadir',
            'keterangan' => 'Hadir tepat waktu',
            'guru_id' => 2,
        ]);
    }
}
