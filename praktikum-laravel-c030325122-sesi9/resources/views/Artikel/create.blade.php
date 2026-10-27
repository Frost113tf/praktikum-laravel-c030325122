@extends('layouts.app')

@section('konten')
    <h2>Tambah Artikel Baru</h2>

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="judul">Judul Artikel:</label>
            <input type="text" id="judul" name="judul" placeholder="Masukkan judul artikel" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel:</label>
            <textarea id="isi" name="isi" rows="6" placeholder="Tulis isi artikel di sini..." required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status Publikasi:</label>
            <select id="status" name="status" required>
                <option value="draft">Draft</option>
                <option value="terbit">Terbit</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection