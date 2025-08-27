@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #0d6efd, #0a58ca);
            color: white;
        }
        .sidebar h3 {
            font-weight: bold;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 8px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            padding-left: 25px;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s ease-in-out;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3 shadow">
        <h3 class="text-center mb-4">🎓 SIAKAD</h3>
        <a href="{{ route('mahasiswa.mata-kuliah.index') }}"><i class="bi bi-book me-2"></i> Mata Kuliah</a>
        <a href="{{ route('mahasiswa.krs.index') }}"><i class="bi bi-journal-text me-2"></i> KRS Saya</a>
        <a href="{{ route('mahasiswa.krs.cetak') }}" target="_blank"><i class="bi bi-printer me-2"></i> Cetak KRS</a>
        <hr class="border-light">
        <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </div>

    <!-- Konten -->
    <div class="content">
        <h2 class="fw-bold mb-4">Dashboard Mahasiswa</h2>

        <div class="alert alert-info shadow-sm">
            Selamat datang, <b>{{ Auth::user()->name }}</b> 
            <span class="badge bg-primary">{{ Auth::user()->role }}</span>
        </div>

        <!-- Card Menu -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom shadow-sm text-center p-4">
                    <i class="bi bi-book display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Mata Kuliah</h5>
                    <p>Lihat dan ambil mata kuliah sesuai semester.</p>
                    <a href="{{ route('mahasiswa.mata-kuliah.index') }}" class="btn btn-primary">Akses</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom shadow-sm text-center p-4">
                    <i class="bi bi-journal-text display-4 text-success mb-3"></i>
                    <h5 class="fw-bold">KRS Saya</h5>
                    <p>Cek daftar mata kuliah yang sudah Anda ambil.</p>
                    <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-success">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom shadow-sm text-center p-4">
                    <i class="bi bi-printer display-4 text-danger mb-3"></i>
                    <h5 class="fw-bold">Cetak KRS</h5>
                    <p>Download atau cetak Kartu Rencana Studi Anda.</p>
                    <a href="{{ route('mahasiswa.krs.cetak') }}" target="_blank" class="btn btn-danger">Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
