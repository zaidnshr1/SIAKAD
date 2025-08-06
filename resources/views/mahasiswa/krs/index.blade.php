@include('layouts.navigation')

<div class="container" style="margin:30px;">
    <h1>Daftar KRS Saya</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    @if($krsList->isEmpty())
        <p>Belum ada mata kuliah yang diambil.</p>
    @else
        <table border="1" cellpadding="8" style="margin-top:20px;">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Dosen Pengampu</th>
                <th>Status</th>
                <th>Aksi</th>
                <th>Alasan Penolakan</th>
            </tr>
            @foreach($krsList as $krs)
            <tr>
                <td>{{ $krs->mataKuliah->kode }}</td>
                <td>{{ $krs->mataKuliah->nama }}</td>
                <td>{{ $krs->mataKuliah->sks }}</td>
                <td>{{ $krs->mataKuliah->dosen_pengampu }}</td>
                <td>
                    @if($krs->status === 'pending')
                        <span style="color:orange;">Pending</span>
                    @elseif($krs->status === 'disetujui')
                        <span style="color:green;">Disetujui</span>
                    @elseif($krs->status === 'ditolak')
                        <span style="color:red;">Ditolak</span>
                    @endif
                </td>
                <td>
                    @if($krs->status === 'pending')
                        <form action="{{ route('mahasiswa.krs.hapus', $krs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    @else
                        <em>Tidak bisa dihapus</em>
                    @endif
                </td>
                <td>
                    @if($krs->status === 'ditolak')
                        {{ $krs->alasan_penolakan ?? '-' }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    <a href="{{ route('mahasiswa.dashboard') }}" style="display:block; margin-top:20px;">Kembali ke Dashboard</a>
</div>
