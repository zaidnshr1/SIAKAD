@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Dashboard Dosen</h1>
    <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <ul>
        <li><a href="{{ route('dosen.krs.index') }}">Lihat Pengajuan KRS</a></li>
    </ul>
</div>
