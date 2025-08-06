@include('layouts.navigation')
<div class="container" style="margin:30px;">
    <h1>Edit Mata Kuliah</h1>
    <form method="POST" action="{{ route('admin.mata-kuliah.update', $mata_kuliah) }}">
        @csrf
        @method('PUT')
        <label>Kode:</label><br>
        <input type="text" name="kode" value="{{ $mata_kuliah->kode }}" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $mata_kuliah->nama }}" required><br>
        <label>SKS:</label><br>
        <input type="number" name="sks" value="{{ $mata_kuliah->sks }}" required><br>
        <label>Dosen Pengampu:</label><br>
        <input type="text" name="dosen_pengampu" value="{{ $mata_kuliah->dosen_pengampu }}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('admin.mata-kuliah.index') }}" style="display:block; margin-top:20px;">Kembali ke Daftar</a>
</div>
