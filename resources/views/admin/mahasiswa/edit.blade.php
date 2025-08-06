@include('layouts.navigation')
<h1>Edit Mahasiswa</h1>
<form method="POST" action="{{ route('admin.mahasiswa.update', $mahasiswa) }}">
    @csrf
    @method('PUT')
    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ $mahasiswa->nim }}" required><br>
    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ $mahasiswa->nama }}" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $mahasiswa->email }}" required><br>
    <label>Password (isi jika ingin ganti):</label><br>
    <input type="password" name="password"><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('admin.mahasiswa.index') }}">Kembali ke Daftar</a>
