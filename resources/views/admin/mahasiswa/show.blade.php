@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Detail Mahasiswa</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>NIM</th>
            <td>{{ $mahasiswa->nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $mahasiswa->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $mahasiswa->email }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $mahasiswa->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diperbarui</th>
            <td>{{ $mahasiswa->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('admin.mahasiswa.index') }}">Kembali ke Daftar Mahasiswa</a>
    </div>
</div>
