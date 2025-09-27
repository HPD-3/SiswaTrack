<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Nilai::with(['siswa', 'guru']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('mata_pelajaran', 'like', "%{$search}%")
                ->orWhere('semester', 'like', "%{$search}%")
                ->orWhere('tahun_ajaran', 'like', "%{$search}%")
                ->orWhereHas('siswa', function($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%");
                });
        }

        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

        $nilai = $query->orderBy('created_at', 'desc')->paginate(10);
        $siswa = Siswa::where('is_active', true)->get();
        
        return view('nilai.index', compact('nilai', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::where('is_active', true)->get();
        $guru = User::where('role', 'teacher')->get();
        return view('nilai.create', compact('siswa', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
            'jenis_nilai' => 'required|in:tugas,uts,uas,praktik',
            'keterangan' => 'nullable|string',
            'guru_id' => 'nullable|exists:users,id',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jenis_nilai' => $request->jenis_nilai,
            'keterangan' => $request->keterangan,
            'guru_id' => $request->guru_id ?? auth()->id(),
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nilai = Nilai::with(['siswa', 'guru'])->findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswa = Siswa::where('is_active', true)->get();
        $guru = User::where('role', 'teacher')->get();
        return view('nilai.edit', compact('nilai', 'siswa', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nilai = Nilai::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
            'jenis_nilai' => 'required|in:tugas,uts,uas,praktik',
            'keterangan' => 'nullable|string',
            'guru_id' => 'nullable|exists:users,id',
        ]);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jenis_nilai' => $request->jenis_nilai,
            'keterangan' => $request->keterangan,
            'guru_id' => $request->guru_id ?? auth()->id(),
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus!');
    }
}
