@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah - Admin</title>
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
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-action {
            border-radius: 20px;
            padding: 5px 12px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card card-custom">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold">📘 Daftar Mata Kuliah</h3>
            <a href="{{ route('admin.mata-kuliah.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Mata Kuliah
            </a>
        </div>
        <div class="card-body">
            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
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
                                <a href="{{ route('admin.mata-kuliah.show', $mk) }}" class="btn btn-sm btn-info btn-action text-white">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('admin.mata-kuliah.edit', $mk) }}" class="btn btn-sm btn-warning btn-action text-white">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.mata-kuliah.destroy', $mk) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i> Hapus
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
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
