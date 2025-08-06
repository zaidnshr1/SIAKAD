<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\KRS;

class KRSController extends Controller
{
    // Menampilkan daftar semua KRS mahasiswa
    public function index()
    {
        $krsList = KRS::with(['mahasiswa', 'mataKuliah'])->get();
        return view('dosen.krs.index', compact('krsList'));
    }

    // Setujui KRS
    public function approve($id)
    {
        $krs = KRS::findOrFail($id);
        $krs->status = 'disetujui';
        $krs->save();

        return redirect()->back()->with('success', 'KRS disetujui.');
    }

    // Tolak KRS
    public function reject($id)
    {
        $krs = KRS::findOrFail($id);

        request()->validate([
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        $krs->status = 'ditolak';
        $krs->alasan_penolakan = request('alasan_penolakan');
        $krs->save();

        return redirect()->back()->with('success', 'KRS ditolak dengan alasan.');
    }
}
