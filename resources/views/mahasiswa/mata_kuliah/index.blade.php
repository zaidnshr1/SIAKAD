@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
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
        .table th {
            background: #0d6efd;
            color: white;
            text-align: center;
            vertical-align: middle;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-ambil {
            border-radius: 20px;
            padding: 6px 16px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card card-custom">
        <div class="card-header bg-primary text-white text-center py-3">
            <h3 class="fw-bold mb-0">📘 Daftar Mata Kuliah</h3>
        </div>
        <div class="card-body">
            <!-- Notifikasi -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ❌ {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tabel Mata Kuliah -->
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>SKS</th>
                            <th>Dosen Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mataKuliahs as $mk)
                        <tr>
                            <td>{{ $mk->kode }}</td>
                            <td class="text-start">{{ $mk->nama }}</td>
                            <td><span class="badge bg-secondary">{{ $mk->sks }}</span></td>
                            <td>{{ $mk->dosen_pengampu }}</td>
                            <td>
                                <form method="POST" action="{{ route('mahasiswa.mata-kuliah.ambil', $mk->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary btn-ambil">
                                        <i class="bi bi-plus-circle me-1"></i> Ambil
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tombol kembali -->
            <div class="mt-3">
                <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
