<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\KRS;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalMataKuliah = MataKuliah::count();

        $krsPending = KRS::where('status', 'pending')->count();
        $krsDisetujui = KRS::where('status', 'disetujui')->count();
        $krsDitolak = KRS::where('status', 'ditolak')->count();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalMataKuliah',
            'krsPending',
            'krsDisetujui',
            'krsDitolak'
        ));
    }
}
