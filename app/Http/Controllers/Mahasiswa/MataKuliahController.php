<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\KRS;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('mahasiswa.mata_kuliah.index', compact('mataKuliahs'));
    }

    public function ambil($id)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Hitung total SKS yang sudah diambil
        $totalSks = KRS::with('mataKuliah')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get()
            ->sum(function ($krs) {
                return $krs->mataKuliah->sks;
            });

        // Ambil mata kuliah yang akan dipilih
        $mataKuliah = MataKuliah::findOrFail($id);

        // Cek batas maksimal SKS
        $maxSks = 24;
        if ($totalSks + $mataKuliah->sks > $maxSks) {
            return redirect()->back()->with('error', "Pengambilan gagal! Total SKS melebihi batas {$maxSks} SKS.");
        }

        // Cek jika sudah pernah ambil mata kuliah ini
        if (KRS::where('mahasiswa_id', $mahasiswa->id)->where('mata_kuliah_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah diambil.');
        }

        // Simpan ke tabel KRS
        KRS::create([
            'mahasiswa_id' => $mahasiswa->id,
            'mata_kuliah_id' => $id
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil diambil.');
    }
    
    public function krs()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $krsList = KRS::with('mataKuliah')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get();

        return view('mahasiswa.krs.index', compact('krsList'));
    }

    public function hapusKrs($id)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $krs = KRS::where('mahasiswa_id', $mahasiswa->id)->where('id', $id)->first();

        if (!$krs) {
            return redirect()->back()->with('error', 'Data KRS tidak ditemukan.');
        }

        $krs->delete();

        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus dari KRS.');
    }

    public function cetakKRS()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $krsList = KRS::with('mataKuliah')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get();

        $pdf = Pdf::loadView('mahasiswa.krs.cetak', compact('mahasiswa', 'krsList'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('KRS_'.$mahasiswa->nim.'.pdf');
    }
}
