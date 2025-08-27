@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar KRS Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .card-header {
            background: #0d6efd;
            color: white;
            font-weight: bold;
            border-radius: 12px 12px 0 0;
        }
        .btn-rounded {
            border-radius: 25px;
            padding: 6px 14px;
        }
        .table th {
            background-color: #e9f1ff;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card card-custom">
        <div class="card-header">
            <i class="bi bi-journal-bookmark-fill"></i> Daftar KRS Saya
        </div>
        <div class="card-body">

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle-fill"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($krsList->isEmpty())
                <div class="text-center p-4 text-muted">
                    <i class="bi bi-info-circle"></i> Belum ada mata kuliah yang diambil.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>SKS</th>
                                <th>Dosen Pengampu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                <th>Alasan Penolakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($krsList as $krs)
                            <tr>
                                <td>{{ $krs->mataKuliah->kode }}</td>
                                <td>{{ $krs->mataKuliah->nama }}</td>
                                <td>{{ $krs->mataKuliah->sks }}</td>
                                <td>{{ $krs->mataKuliah->dosen_pengampu }}</td>
                                <td>
                                    @if($krs->status === 'pending')
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-hourglass-split"></i> Pending
                                        </span>
                                    @elseif($krs->status === 'disetujui')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Disetujui
                                        </span>
                                    @elseif($krs->status === 'ditolak')
                                        <span class="badge bg-danger">
                                            <i class="bi bi-x-circle"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($krs->status === 'pending')
                                        <form action="{{ route('mahasiswa.krs.hapus', $krs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-rounded">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted"><em>Tidak bisa dihapus</em></span>
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
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-3">
                <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-secondary btn-rounded">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
