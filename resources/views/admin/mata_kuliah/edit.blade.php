@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
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
            padding: 8px 18px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card card-custom">
        <div class="card-header">
            ✏️ Edit Mata Kuliah
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.mata-kuliah.update', $mata_kuliah) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $mata_kuliah->kode }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mata_kuliah->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label fw-semibold">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" value="{{ $mata_kuliah->sks }}" required>
                </div>
                <div class="mb-3">
                    <label for="dosen_pengampu" class="form-label fw-semibold">Dosen Pengampu</label>
                    <input type="text" class="form-control" id="dosen_pengampu" name="dosen_pengampu" value="{{ $mata_kuliah->dosen_pengampu }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.mata-kuliah.index') }}" class="btn btn-outline-secondary btn-rounded">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-rounded">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
