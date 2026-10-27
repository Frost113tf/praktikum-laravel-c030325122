<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Statistik Akademik</title>
</head>
<body>
    <h1>Halaman Statistik Akademik</h1>
    <p>Ini adalah tampilan dari view bersarang (resources/views/akademik/statistik.blade.php).</p>
    <table border="1" cellpadding="8">
    <tr>
        <th>Program Studi</th>
        <th>Jumlah Mahasiswa</th>
    </tr>
    @foreach ($rekap as $item)
    <tr>
        <td>{{ $item->prodi }}</td>
        <td>{{ $item->jumlah }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>