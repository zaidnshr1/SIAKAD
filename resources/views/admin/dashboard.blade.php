@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <!-- Data Utama -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
        <div style="border: 1px solid #ddd; padding: 20px; flex: 1;">
            <h3>Total Mahasiswa</h3>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalMahasiswa }}</p>
        </div>
        <div style="border: 1px solid #ddd; padding: 20px; flex: 1;">
            <h3>Total Mata Kuliah</h3>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalMataKuliah }}</p>
        </div>
    </div>

    <!-- Statistik KRS -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
        <div style="border: 1px solid #ddd; padding: 20px; flex: 1;">
            <h3>KRS Pending</h3>
            <p style="font-size: 24px; font-weight: bold; color: orange;">{{ $krsPending }}</p>
        </div>
        <div style="border: 1px solid #ddd; padding: 20px; flex: 1;">
            <h3>KRS Disetujui</h3>
            <p style="font-size: 24px; font-weight: bold; color: green;">{{ $krsDisetujui }}</p>
        </div>
        <div style="border: 1px solid #ddd; padding: 20px; flex: 1;">
            <h3>KRS Ditolak</h3>
            <p style="font-size: 24px; font-weight: bold; color: red;">{{ $krsDitolak }}</p>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('admin.mata-kuliah.index') }}">Manajemen Mata Kuliah</a> |
        <a href="{{ route('admin.mahasiswa.index') }}">Manajemen Mahasiswa</a>
    </div>
</div>
