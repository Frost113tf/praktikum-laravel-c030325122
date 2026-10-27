<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Statistik Prodi</title>
</head>
<body>
    <h2>Rekap Jumlah Mahasiswa per Prodi</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Program Studi</th>
                <th>Jumlah Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekap as $row)
                <tr>
                    <td>{{ $row->prodi }}</td>
                    <td>{{ $row->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>