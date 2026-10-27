<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Belajar Blade</title>
</head>
<body>
    {{-- Ini komentar Blade, tidak akan tampil di HTML browser --}}
    
    <h1>Halo, {{ $nama }}!</h1>

    @php
        $tahunSekarang = date('Y');
    @endphp

    <p>Tahun sekarang: {{ $tahunSekarang }}</p>

    {{-- Menggunakan ?? untuk memberikan nilai default jika variabel julukan null/kosong --}}
    <p>Julukan: {{ $julukan ?? 'Belum ada julukan' }}</p>

    <hr>

    <h3>Perbandingan Escaping HTML:</h3>
    <p>Escaped (Aman): {{ $kontenHtml }}</p>
    <p>Tidak di-escape (Raw HTML): {!! $kontenHtml !!}</p>
</body>
</html>