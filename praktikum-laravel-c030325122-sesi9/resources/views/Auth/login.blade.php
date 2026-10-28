
@extends('layouts.app')

@section('konten')
<div style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    <h2 style="text-align: center;">Login</h2>

    @if ($errors->any())
        <div style="color:red; margin-bottom: 10px; text-align: center;">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" style="width: 100%; padding: 8px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <input type="password" name="password" placeholder="Password" style="width: 100%; padding: 8px;" required>
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #2563eb; color: white; border: none; border-radius: 4px;">Login</button>
    </form>

    <p style="text-align: center; margin-top: 15px;">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
</div>
@endsection