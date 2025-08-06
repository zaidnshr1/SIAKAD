@include('layouts.navigation')
<div class="container" style="margin:30px;">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('admin.mata-kuliah.create') }}">Tambah Mata Kuliah</a>
    <table border="1" cellpadding="8" style="margin-top:20px;">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Dosen Pengampu</th>
            <th>Aksi</th>
        </tr>
        @foreach($mataKuliahs as $mk)
        <tr>
            <td>{{ $mk->kode }}</td>
            <td>{{ $mk->nama }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->dosen_pengampu }}</td>
            <td>
                <a href="{{ route('admin.mata-kuliah.show', $mk) }}">Detail</a>
                <a href="{{ route('admin.mata-kuliah.edit', $mk) }}">Edit</a>
                <form method="POST" action="{{ route('admin.mata-kuliah.destroy', $mk) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('admin.dashboard') }}" style="display:block; margin-top:20px;">Kembali ke Dashboard</a>
</div>
