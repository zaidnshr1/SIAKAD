@include('layouts.navigation')

<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

        {{-- Header biru --}}
        <div class="px-4 py-3 text-white" style="background-color:#0d6efd;">
            <h3 class="mb-0 fw-bold">📘 Daftar KRS Mahasiswa</h3>
        </div>

        <div class="card-body p-4">

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="text-white text-center" style="background-color:#0d6efd;">
                        <tr>
                            <th class="fs-5">Mahasiswa</th>
                            <th class="fs-5">NIM</th>
                            <th class="fs-5">Mata Kuliah</th>
                            <th class="fs-5">SKS</th>
                            <th class="fs-5">Status</th>
                            <th class="fs-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($krsList as $krs)
                        <tr class="text-center">
                            <td>{{ $krs->mahasiswa->nama }}</td>
                            <td>{{ $krs->mahasiswa->nim }}</td>
                            <td>{{ $krs->mataKuliah->nama }}</td>
                            <td>{{ $krs->mataKuliah->sks }}</td>
                            <td>{{ ucfirst($krs->status) }}</td>
                            <td>
                                @if($krs->status === 'pending')
                                    <form method="POST" action="{{ route('dosen.krs.approve', $krs->id) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                    </form>

                                    <form method="POST" action="{{ route('dosen.krs.reject', $krs->id) }}" class="d-inline">
                                        @csrf
                                        <input type="text" name="alasan_penolakan" placeholder="Alasan tolak" required class="form-control form-control-sm d-inline-block w-auto">
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                @else
                                    <em>{{ ucfirst($krs->status) }}</em>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tombol kembali --}}
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary rounded-pill">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</div>
