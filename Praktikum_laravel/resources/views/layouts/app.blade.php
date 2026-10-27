<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'SIAKAD MINI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('mahasiswa.index') }}">SIAKAD MINI</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                <a class="nav-link" href="{{ route('matakuliah.index') }}">Mata Kuliah</a>
                <a class="nav-link" href="{{ route('laporan.statistik') }}">Statistik Prodi</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('pesan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('konten')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>