@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Daftar Mata Kuliah</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

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
                <form method="POST" action="{{ route('mahasiswa.mata-kuliah.ambil', $mk->id) }}">
                    @csrf
                    <button type="submit">Ambil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('mahasiswa.dashboard') }}" style="display:block; margin-top:20px;">Kembali ke Dashboard</a>
</div>
