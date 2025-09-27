<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Nilai;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Basic statistics
        $totalSiswa = Siswa::count();
        $siswaAktif = Siswa::where('is_active', true)->count();
        $siswaTidakAktif = Siswa::where('is_active', false)->count();
        $totalKelas = Kelas::count();
        $totalJurusan = Jurusan::count();
        
        // Role-based data filtering
        if ($user->isTeacher()) {
            $totalSiswa = Siswa::where('teacher_id', $user->id)->count();
            $siswaAktif = Siswa::where('teacher_id', $user->id)->where('is_active', true)->count();
            $siswaTidakAktif = Siswa::where('teacher_id', $user->id)->where('is_active', false)->count();
        } elseif ($user->isStudent()) {
            $totalSiswa = 1; // Only their own data
            $siswaAktif = 1;
            $siswaTidakAktif = 0;
        }
        
        // Charts data
        $siswaPerJurusan = Jurusan::withCount('siswa')->get();
        $siswaPerAngkatan = Siswa::select('angkatan', DB::raw('count(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan', 'desc')
            ->get();
            
        // Monthly new student registrations (last 12 months)
        $registrasiBulanan = Siswa::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        
        // Recent activities
        $siswaTerbaru = Siswa::with(['jurusan', 'kelas'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $nilaiTerbaru = Nilai::with(['siswa'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $absensiHariIni = Absensi::with(['siswa'])
            ->whereDate('tanggal', today())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Role-based filtering for recent activities
        if ($user->isTeacher()) {
            $siswaTerbaru = Siswa::with(['jurusan', 'kelas'])
                ->where('teacher_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                
            $nilaiTerbaru = Nilai::with(['siswa'])
                ->whereHas('siswa', function($q) use ($user) {
                    $q->where('teacher_id', $user->id);
                })
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                
            $absensiHariIni = Absensi::with(['siswa'])
                ->whereHas('siswa', function($q) use ($user) {
                    $q->where('teacher_id', $user->id);
                })
                ->whereDate('tanggal', today())
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } elseif ($user->isStudent()) {
            $siswaData = Siswa::where('user_id', $user->id)->first();
            if ($siswaData) {
                $siswaTerbaru = collect([$siswaData]);
                $nilaiTerbaru = Nilai::where('siswa_id', $siswaData->id)
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
                $absensiHariIni = Absensi::where('siswa_id', $siswaData->id)
                    ->whereDate('tanggal', today())
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            } else {
                $siswaTerbaru = collect();
                $nilaiTerbaru = collect();
                $absensiHariIni = collect();
            }
        }
        
        return view('dashboard', compact(
            'totalSiswa',
            'siswaAktif', 
            'siswaTidakAktif',
            'totalKelas',
            'totalJurusan',
            'siswaPerJurusan',
            'siswaPerAngkatan',
            'registrasiBulanan',
            'siswaTerbaru',
            'nilaiTerbaru',
            'absensiHariIni'
        ));
    }
}
