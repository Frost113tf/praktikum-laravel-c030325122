@extends('layouts.app')

@section('konten')
    <h1>Tambah Artikel Baru</h1>

    {{-- Menampilkan daftar seluruh pesan error validasi (opsional) --}}
    @if ($errors->any())
        <div style="background:#fee2e2; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul style="margin: 0; color: #b91c1c;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf

        <!-- Input Judul Artikel -->
        <div style="margin-bottom: 10px;">
            <label for="judul">Judul Artikel</label><br>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" placeholder="Judul Artikel" style="width: 100%; padding: 8px;">
            @error('judul')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- Input Isi Artikel -->
        <div style="margin-bottom: 10px;">
            <label for="isi">Isi Artikel</label><br>
            <textarea name="isi" id="isi" rows="5" placeholder="Isi Artikel" style="width: 100%; padding: 8px;">{{ old('isi') }}</textarea>
            @error('isi')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- Pilihan Status Artikel -->
        <div style="margin-bottom: 10px;">
            <label for="status">Status Publikasi</label><br>
            <select name="status" id="status" style="width: 100%; padding: 8px;">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="terbit" {{ old('status') == 'terbit' ? 'selected' : '' }}>Terbit</option>
            </select>
            @error('status')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" style="padding: 10px 15px; background: #2563eb; color: white; border: none; border-radius: 4px;">Simpan Artikel</button>
    </form>
@endsection