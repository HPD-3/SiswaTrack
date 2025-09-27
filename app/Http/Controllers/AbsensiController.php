<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Absensi::with(['siswa', 'guru']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('status', 'like', "%{$search}%")
                ->orWhereHas('siswa', function($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%");
                });
        }

        if ($request->filled('siswa_id')) {
            $query->where('siswa_id', $request->siswa_id);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $absensi = $query->orderBy('tanggal', 'desc')->paginate(10);
        $siswa = Siswa::where('is_active', true)->get();
        
        return view('absensi.index', compact('absensi', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::where('is_active', true)->get();
        $guru = User::where('role', 'teacher')->get();
        return view('absensi.create', compact('siswa', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'keterangan' => 'nullable|string',
            'guru_id' => 'nullable|exists:users,id',
        ]);

        // Check if attendance already exists for this student on this date
        $existingAbsensi = Absensi::where('siswa_id', $request->siswa_id)
            ->whereDate('tanggal', $request->tanggal)
            ->first();

        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Absensi untuk siswa ini pada tanggal tersebut sudah ada!');
        }

        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'guru_id' => $request->guru_id ?? auth()->id(),
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absensi = Absensi::with(['siswa', 'guru'])->findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswa = Siswa::where('is_active', true)->get();
        $guru = User::where('role', 'teacher')->get();
        return view('absensi.edit', compact('absensi', 'siswa', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'keterangan' => 'nullable|string',
            'guru_id' => 'nullable|exists:users,id',
        ]);

        // Check if attendance already exists for this student on this date (excluding current record)
        $existingAbsensi = Absensi::where('siswa_id', $request->siswa_id)
            ->whereDate('tanggal', $request->tanggal)
            ->where('id', '!=', $id)
            ->first();

        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Absensi untuk siswa ini pada tanggal tersebut sudah ada!');
        }

        $absensi->update([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'guru_id' => $request->guru_id ?? auth()->id(),
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }
}
