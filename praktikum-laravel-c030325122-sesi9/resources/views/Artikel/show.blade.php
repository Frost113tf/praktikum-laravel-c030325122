@extends('layouts.app')

@section('konten')
    <article>
        <h2>{{ $artikel->judul }}</h2>
        <p><strong>Penulis:</strong> {{ $artikel->penulis->name ?? 'Anonim' }} | <strong>Status:</strong> {{ ucfirst($artikel->status) }}</p>
        <p><small><strong>Tanggal Dibuat:</strong> {{ $artikel->created_at->format('d M Y, H:i') }}</small></p>
        <hr>
        <div style="margin-top: 20px; font-size: 1.1em;">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
    </article>

    <div style="margin-top: 30px;">
        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning">Edit Artikel Ini</a>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
@endsection