@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Dashboard Mahasiswa</h1>
    <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <ul>
        <li><a href="{{ route('mahasiswa.mata-kuliah.index') }}">Lihat & Ambil Mata Kuliah</a></li>
        <li><a href="{{ route('mahasiswa.krs.index') }}">Lihat KRS Saya</a></li>
        <a href="{{ route('mahasiswa.krs.cetak') }}" target="_blank" style="margin-bottom: 10px; display:inline-block;">Cetak KRS (PDF)</a>
    </ul>
</div>
