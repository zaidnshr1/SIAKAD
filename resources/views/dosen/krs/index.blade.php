@include('layouts.navigation')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar KRS Mahasiswa</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color:#f4f7fb; font-family:'Segoe UI', sans-serif; }
        .card-custom{ border:none; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.08); }
        .table thead th{ background:#0d6efd; color:#fff; text-align:center; vertical-align:middle; }
        .table td{ vertical-align:middle; }
        .btn-pill{ border-radius:20px; padding:6px 16px; }
    </style>
</head>
<body>

<div class="container my-5">
  <div class="card card-custom overflow-hidden">

    {{-- Header biru --}}
    <div class="card-header bg-primary text-white text-center py-3">
      <h3 class="fw-bold mb-0">📘 Daftar KRS Mahasiswa</h3>
    </div>

    <div class="card-body p-4">

      {{-- Notifikasi --}}
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

      {{-- Tabel --}}
      <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
          <thead>
            <tr>
              <th>Mahasiswa</th>
              <th>NIM</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($krsList as $krs)
              <tr>
                <td class="text-start">{{ $krs->mahasiswa->nama }}</td>
                <td>{{ $krs->mahasiswa->nim }}</td>
                <td class="text-start">{{ $krs->mataKuliah->nama }}</td>
                <td><span class="badge bg-secondary">{{ $krs->mataKuliah->sks }}</span></td>
                <td>
                  @php
                    $statusColor = match($krs->status){
                      'approved' => 'success','rejected' => 'danger','pending' => 'warning', default => 'secondary'
                    };
                  @endphp
                  <span class="badge bg-{{ $statusColor }}">{{ ucfirst($krs->status) }}</span>
                </td>
                <td>
                  @if($krs->status === 'pending')
                    <form method="POST" action="{{ route('dosen.krs.approve', $krs->id) }}" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-success btn-sm btn-pill me-1">
                        <i class="bi bi-check-circle me-1"></i> Setujui
                      </button>
                    </form>

                    <form method="POST" action="{{ route('dosen.krs.reject', $krs->id) }}" class="d-inline-flex align-items-center gap-2">
                      @csrf
                      <input type="text" name="alasan_penolakan" class="form-control form-control-sm w-auto" placeholder="Alasan tolak" required>
                      <button type="submit" class="btn btn-danger btn-sm btn-pill">
                        <i class="bi bi-x-circle me-1"></i> Tolak
                      </button>
                    </form>
                  @else
                    <em class="text-muted">{{ ucfirst($krs->status) }}</em>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Tombol kembali --}}
      <div class="mt-3">
        <a href="{{ route('dosen.dashboard') }}" class="btn btn-outline-primary btn-pill">
          <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
      </div>

    </div>
  </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
