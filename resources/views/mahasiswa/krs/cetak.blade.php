<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>KRS {{ $mahasiswa->nim }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 6px; text-align: left; }
        h1, h3 { text-align: center; }
    </style>
</head>
<body>
    <h1>SISTEM INFORMASI AKADEMIK</h1>
    <h3>Kartu Rencana Studi (KRS)</h3>

    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Dosen Pengampu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krsList as $krs)
            <tr>
                <td>{{ $krs->mataKuliah->kode }}</td>
                <td>{{ $krs->mataKuliah->nama }}</td>
                <td>{{ $krs->mataKuliah->sks }}</td>
                <td>{{ $krs->mataKuliah->dosen_pengampu }}</td>
                <td>{{ ucfirst($krs->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 50px;">Tanda Tangan Dosen Wali: ________________________</p>
</body>
</html>
