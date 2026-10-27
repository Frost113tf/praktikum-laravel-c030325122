@extends('layouts.app')

@section('konten')
    <h2>Daftar Artikel</h2>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary" style="display: inline-block; margin-bottom: 15px;">+ Tambah Artikel Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artikel as $index => $item)
                <tr>
                    <td>{{ $artikel->firstItem() + $index }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        <span style="text-transform: capitalize; font-weight: bold; color: {{ $item->status == 'terbit' ? 'green' : 'orange' }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>{{ $item->penulis->name ?? 'Anonim' }}</td>
                    <td>
                        <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Form Tombol Hapus -->
                        <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada artikel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 15px;">
        {{ $artikel->links() }}
    </div>
@endsection