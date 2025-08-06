@include('layouts.navigation')
<h1>Daftar Mahasiswa</h1>
<a href="{{ route('admin.mahasiswa.create') }}">Tambah Mahasiswa</a>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    @foreach ($mahasiswas as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->email }}</td>
            <td>
                <a href="{{ route('admin.mahasiswa.show', $mhs) }}">Detail</a>
                <a href="{{ route('admin.mahasiswa.edit', $mhs) }}">Edit</a>
                <form action="{{ route('admin.mahasiswa.destroy', $mhs) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{ url('/admin/dashboard') }}">Kembali ke Dashboard</a>
