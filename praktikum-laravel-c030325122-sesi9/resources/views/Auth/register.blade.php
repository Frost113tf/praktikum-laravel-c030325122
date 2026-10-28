@extends('layouts.app')

@section('konten')
    <div style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h2 style="text-align: center;">Registrasi Akun Baru</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <!-- Input Nama -->
            <div style="margin-bottom: 15px;">
                <label for="name">Nama Lengkap</label><br>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama" style="width: 100%; padding: 8px;" required>
                @error('name')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Input Email -->
            <div style="margin-bottom: 15px;">
                <label for="email">Alamat Email</label><br>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email" style="width: 100%; padding: 8px;" required>
                @error('email')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Input Password -->
            <div style="margin-bottom: 15px;">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Minimal 8 karakter" style="width: 100%; padding: 8px;" required>
                @error('password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Input Konfirmasi Password -->
            <div style="margin-bottom: 20px;">
                <label for="password_confirmation">Konfirmasi Password</label><br>
                {{-- Atribut name HARUS "password_confirmation" agar terbaca oleh rule 'confirmed' di Controller --}}
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang password" style="width: 100%; padding: 8px;" required>
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Daftar
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 15px;">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </p>
    </div>
@endsection