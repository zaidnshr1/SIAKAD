<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('layouts.navigation')

    <div class="d-flex" style="min-height:100vh;">
        <!-- Sidebar -->
        <div class="bg-primary text-white p-3" style="width:250px;">
            <h3 class="fw-bold">SIAKAD</h3>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a href="{{ route('dosen.krs.index') }}" class="nav-link text-white">📑 Lihat Pengajuan KRS</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">✅ Validasi KRS</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">📊 Laporan</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <h1 class="fw-bold">Dashboard Dosen</h1>
            <p>Selamat datang, <b>{{ Auth::user()->name }}</b> ({{ Auth::user()->role }})</p>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Lihat Pengajuan KRS</h5>
                            <p class="card-text">Cek daftar pengajuan KRS mahasiswa Anda.</p>
                            <a href="{{ route('dosen.krs.index') }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Validasi KRS</h5>
                            <p class="card-text">Setujui atau tolak pengajuan KRS mahasiswa.</p>
                            <a href="#" class="btn btn-success">Validasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Laporan</h5>
                            <p class="card-text">Download laporan KRS mahasiswa.</p>
                            <a href="#" class="btn btn-info">Download</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
