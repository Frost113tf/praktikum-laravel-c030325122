<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik - Data Mata Kuliah</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f8fafc; color: #333; }
        .container { max-width: 900px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; }
        .btn { display: inline-block; padding: 8px 16px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-bottom: 15px; }
        .btn:hover { background-color: #1d4ed8; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border: 1px solid #cbd5e1; text-align: left; }
        th { background-color: #f1f5f9; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8fafc; }
        .badge { background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Mata Kuliah & Dosen Pengampu</h1>
        <a href="{{ route('matakuliah.create') }}" class="btn">+ Tambah Mata Kuliah Baru</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Dosen Pengampu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $index => $mk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="badge">{{ $mk->kode_mk }}</span></td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }} SKS</td>
                        <td>Semester {{ $mk->semester }}</td>
                        <td>{{ $mk->dosen->name ?? 'Belum Ditentukan' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data mata kuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>