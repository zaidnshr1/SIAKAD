@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-stat {
            border: none;
            border-radius: 12px;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .card-stat:hover {
            transform: translateY(-5px);
        }
        .card-stat h3 {
            font-size: 1.1rem;
        }
        .card-stat p {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .btn-manage {
            border-radius: 25px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">📊 Dashboard Admin</h2>
        <p class="text-muted">Selamat datang, <b>{{ Auth::user()->name }}</b> 
            <span class="badge bg-primary">{{ Auth::user()->role }}</span>
        </p>
    </div>

    <!-- Statistik Utama -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-stat bg-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Total Mahasiswa</h3>
                        <p>{{ $totalMahasiswa }}</p>
                    </div>
                    <i class="bi bi-people display-5"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-stat bg-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Total Mata Kuliah</h3>
                        <p>{{ $totalMataKuliah }}</p>
                    </div>
                    <i class="bi bi-book display-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik KRS -->
    <div class="row g-4 mt-2">
        <div class="col-md-4">
            <div class="card-stat bg-warning text-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>KRS Pending</h3>
                        <p>{{ $krsPending }}</p>
                    </div>
                    <i class="bi bi-hourglass-split display-5"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-stat bg-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>KRS Disetujui</h3>
                        <p>{{ $krsDisetujui }}</p>
                    </div>
                    <i class="bi bi-check-circle display-5"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-stat bg-danger">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>KRS Ditolak</h3>
                        <p>{{ $krsDitolak }}</p>
                    </div>
                    <i class="bi bi-x-circle display-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Manajemen -->
    <div class="text-center mt-5">
        <a href="{{ route('admin.mata-kuliah.index') }}" class="btn btn-primary btn-manage me-2">
            <i class="bi bi-journal-bookmark"></i> Manajemen Mata Kuliah
        </a>
        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-success btn-manage">
            <i class="bi bi-person-lines-fill"></i> Manajemen Mahasiswa
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
