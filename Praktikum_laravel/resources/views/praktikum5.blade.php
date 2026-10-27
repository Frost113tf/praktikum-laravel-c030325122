<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 5 - Belajar Blade</title>
</head>
<body>
    <h1>Latihan Sintaks Blade Templating</h1>

    <!-- 1. Penanganan Nilai Null dengan ?? -->
    <h2>Daftar Mahasiswa & Penanganan Null</h2>
    <ul>
        @foreach ($mahasiswa as $mhs)
            <li>
                <strong>NIM:</strong> {{ $mhs->nim }} | 
                <strong>Nama:</strong> {{ $mhs->nama }} | 
                <strong>Julukan:</strong> {{ $mhs->julukan ?? 'Belum Ada Julukan' }}
            </li>
        @endforeach
    </ul>

    <hr>

    <!-- 2. Uji Keamanan XSS (Cross-Site Scripting) -->
    <h2>Uji Keamanan XSS (Cross-Site Scripting)</h2>

    <p><strong>1. Menggunakan Kurung Kurawa Ganda (Di-escape / Aman):</strong></p>
    <p>Teks HTML: {{ $kontenHtml }}</p>
    <p>Input Script: {{ $mahasiswa[1]->nama }}</p>

    <br>

    <p><strong>2. Menggunakan Unescaped (Tanpa Escape / Berbahaya):</strong></p>
    <p>Teks HTML: {!! $kontenHtml !!}</p>
    <p>Input Script: {!! $mahasiswa[1]->nama !!}</p>

</body>
</html>