@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Daftar KRS Mahasiswa</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" style="margin-top:20px;">
        <tr>
            <th>Mahasiswa</th>
            <th>NIM</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($krsList as $krs)
        <tr>
            <td>{{ $krs->mahasiswa->nama }}</td>
            <td>{{ $krs->mahasiswa->nim }}</td>
            <td>{{ $krs->mataKuliah->nama }}</td>
            <td>{{ $krs->mataKuliah->sks }}</td>
            <td>{{ ucfirst($krs->status) }}</td>
            <td>
                @if($krs->status === 'pending')
                    <form method="POST" action="{{ route('dosen.krs.approve', $krs->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit">Setujui</button>
                    </form>

                    <form method="POST" action="{{ route('dosen.krs.reject', $krs->id) }}" style="display:inline;">
                        @csrf
                        <input type="text" name="alasan_penolakan" placeholder="Alasan tolak" required>
                        <button type="submit">Tolak</button>
                    </form>
                @else
                    <em>{{ ucfirst($krs->status) }}</em>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
