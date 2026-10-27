@extends('layouts.app')

@section('judul', 'Daftar Mahasiswa')

@section('konten')
<div class="card shadow-sm border-0 rounded-4 p-4 mb-4 bg-white">
    <!-- Header Bagian Atas & Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold text-dark mb-1">Daftar Mahasiswa</h2>
            <p class="text-muted mb-0 small">Kelola data dan informasi akademik mahasiswa secara terpusat.</p>
        </div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> + Tambah Mahasiswa
        </a>
    </div>

    <!-- Informasi Total Data -->
    <div class="mb-3">
        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-normal">
            Total Mahasiswa: <strong class="text-dark">{{ method_exists($mahasiswas, 'total') ? $mahasiswas->total() : count($mahasiswas) }}</strong>
        </span>
    </div>

    <!-- Tabel Data Mahasiswa -->
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase fs-7 text-secondary">
                <tr>
                    <th class="py-3 ps-3 rounded-start">No</th>
                    <th class="py-3">NIM</th>
                    <th class="py-3">Nama Mahasiswa</th>
                    <th class="py-3">Program Studi</th>
                    <th class="py-3 text-center">Semester</th>
                    <th class="py-3 text-center">Status Akademik</th>
                    <th class="py-3 text-center rounded-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $index => $mhs)
                    <tr>
                        <th class="ps-3 text-muted fw-normal">
                            {{ method_exists($mahasiswas, 'firstItem') ? $mahasiswas->firstItem() + $index : $index + 1 }}
                        </th>
                        <td><span class="font-monospace fw-semibold text-dark">{{ $mhs->nim }}</span></td>
                        <td class="fw-bold text-dark">{{ $mhs->nama }}</td>
                        <td><span class="text-secondary">{{ $mhs->prodi }}</span></td>
                        <td class="text-center"><span class="badge bg-secondary-subtle text-secondary px-2 py-1">{{ $mhs->semester }}</span></td>
                        <td class="text-center">
                            @if($mhs->semester <= 2)
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1 rounded-pill">Mahasiswa Baru</span>
                            @else
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill">Mahasiswa Aktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <!-- Tombol Detail -->
                                <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-outline-info px-2 py-1" title="Detail">
                                    Detail
                                </a>
                                <!-- Tombol Edit -->
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1 text-dark" title="Edit">
                                    Edit
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Hapus">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted fst-italic">
                            Belum ada data mahasiswa yang tersimpan di database.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Bagian Pagination (Jika menggunakan paginate) -->
    @if (method_exists($mahasiswas, 'links'))
        <div class="mt-4 d-flex justify-content-end">
            {{ $mahasiswas->links() }}
        </div>
    @endif
</div>
@endsection