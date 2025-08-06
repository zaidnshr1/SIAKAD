@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Dashboard Mahasiswa</h1>
    <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <ul>
        <li><a href="#">Lihat Daftar Mata Kuliah</a></li>
        <li><a href="#">Ajukan KRS</a></li>
        <li><a href="#">Lihat Jadwal Kuliah</a></li>
        <li><a href="#">Cetak KRS</a></li>
    </ul>
</div>
