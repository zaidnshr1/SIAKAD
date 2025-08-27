@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
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
        .form-control {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card card-custom">
        <div class="card-header">
            <i class="bi bi-pencil-square"></i> Edit Mahasiswa
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.mahasiswa.update', $mahasiswa) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" value="{{ $mahasiswa->nim }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $mahasiswa->email }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password (kosongkan jika tidak ingin ganti)</label>
                    <input type="password" name="password" class="form-control" placeholder="Isi hanya jika ingin mengganti password">
                </div>

                <button type="submit" class="btn btn-primary btn-rounded">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-outline-secondary btn-rounded ms-2">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
