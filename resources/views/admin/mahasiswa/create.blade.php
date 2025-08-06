@include('layouts.navigation')
<h1>Tambah Mahasiswa</h1>
<form method="POST" action="{{ route('admin.mahasiswa.store') }}">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim" required><br>
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('admin.mahasiswa.index') }}">Kembali ke Daftar</a>
