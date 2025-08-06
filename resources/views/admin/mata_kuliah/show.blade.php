@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h2>Detail Mata Kuliah</h2>
    <p><strong>Kode:</strong> {{ $mata_kuliah->kode }}</p>
    <p><strong>Nama:</strong> {{ $mata_kuliah->nama }}</p>
    <p><strong>SKS:</strong> {{ $mata_kuliah->sks }}</p>
    <p><strong>Dosen Pengampu:</strong> {{ $mata_kuliah->dosen_pengampu }}</p>

    <a href="{{ route('admin.mata-kuliah.index') }}">Kembali</a>
</div>
