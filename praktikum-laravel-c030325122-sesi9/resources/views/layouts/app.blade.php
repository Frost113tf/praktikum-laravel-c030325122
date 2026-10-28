<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Artikel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        nav { margin-bottom: 20px; padding: 10px; background: #f4f4f4; border-radius: 5px; }
        nav a { margin-right: 15px; text-decoration: none; color: #333; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; cursor: pointer; border: none; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-warning { background: #f59e0b; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-secondary { background: #6b7280; color: white; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <!-- Navigasi Utama -->
    <nav>
        <a href="{{ route('artikel.index') }}">Daftar Artikel</a>
        <a href="{{ route('artikel.create') }}">+ Tambah Artikel</a>
    </nav>

    <nav>
    <a href="{{ route('artikel.index') }}">Kelola Artikel</a>
    <!-- Tautan navigasi lainnya -->
    </nav>

    <nav style="padding: 10px; background: #f3f4f6; margin-bottom: 20px;">
        <a href="{{ route('artikel.index') }}">Artikel</a>
    
        @auth
            <span style="margin-left: 20px;">Halo, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left: 10px;">
                @csrf
                <button type="submit" style="background: transparent; border: none; color: blue; cursor: pointer; text-decoration: underline;">Logout</button>
            </form>
        @else
            <span style="margin-left: 20px;">
                <a href="{{ route('login') }}">Login</a> | 
                <a href="{{ route('register') }}">Daftar</a>
            </span>
        @endauth
    </nav>

    <!-- Flash Message / Pesan Konfirmasi -->
    @if (session('pesan'))
        <div class="alert-success">
            {{ session('pesan') }}
        </div>
    @endif

    <!-- Konten Dinamis -->
    <div class="container">
        @yield('konten')
    </div>

</body>
</html>