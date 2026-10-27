@extends('layouts.app')

@section('konten')
    <h2>Edit Artikel</h2>

    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul Artikel:</label>
            <input type="text" id="judul" name="judul" value="{{ $artikel->judul }}" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel:</label>
            <textarea id="isi" name="isi" rows="6" required>{{ $artikel->isi }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status Publikasi:</label>
            <select id="status" name="status" required>
                <option value="draft" {{ $artikel->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="terbit" {{ $artikel->status == 'terbit' ? 'selected' : '' }}>Terbit</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Perbarui Artikel</button>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection