@include('layouts.navigation')
<div class="container" style="margin:30px;">
    <h1>Tambah Mata Kuliah</h1>
    <form method="POST" action="{{ route('admin.mata-kuliah.store') }}">
        @csrf
        <label>Kode:</label><br>
        <input type="text" name="kode" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>SKS:</label><br>
        <input type="number" name="sks" required><br>
        <label>Dosen Pengampu:</label><br>
        <input type="text" name="dosen_pengampu"><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('admin.mata-kuliah.index') }}" style="display:block; margin-top:20px;">Kembali ke Daftar</a>
</div>
