@extends('layouts.app')

@section('judul', 'Daftar Mata Kuliah')

@section('konten')
<div class="card shadow-sm border-0 rounded-4 p-4 mb-4 bg-white">
    <!-- Header Bagian Atas & Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold text-dark mb-1">Daftar Mata Kuliah</h2>
            <p class="text-muted mb-0 small">Kelola kurikulum, bobot SKS, dan daftar mata kuliah aktif.</p>
        </div>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> + Tambah Mata Kuliah
        </a>
    </div>

    <!-- Informasi Total Data -->
    <div class="mb-3">
        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-normal">
            Total Mata Kuliah: <strong class="text-dark">{{ isset($matakuliahs) ? (method_exists($matakuliahs, 'total') ? $matakuliahs->total() : count($matakuliahs)) : 0 }}</strong>
        </span>
    </div>

    <!-- Tabel Data Mata Kuliah -->
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase fs-7 text-secondary">
                <tr>
                    <th class="py-3 ps-3 rounded-start" style="width: 8%;">No</th>
                    <th class="py-3" style="width: 20%;">Kode MK</th>
                    <th class="py-3" style="width: 32%;">Nama Mata Kuliah</th>
                    <th class="py-3 text-center" style="width: 12%;">SKS</th>
                    <th class="py-3 text-center" style="width: 15%;">Kategori SKS</th>
                    <th class="py-3 text-center rounded-end" style="width: 13%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $index => $mk)
                    <tr>
                        <th class="ps-3 text-muted fw-normal">
                            {{ method_exists($matakuliahs, 'firstItem') ? $matakuliahs->firstItem() + $index : $index + 1 }}
                        </th>
                        <td><span class="font-monospace fw-semibold text-dark">{{ $mk->kode_mk ?? $mk->kode ?? '-' }}</span></td>
                        <td class="fw-bold text-dark">{{ $mk->nama_mk ?? $mk->nama ?? '-' }}</td>
                        <td class="text-center"><span class="badge bg-secondary-subtle text-secondary px-3 py-1 fs-6">{{ $mk->sks }}</span></td>
                        <td class="text-center">
                            @if($mk->sks >= 3)
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 rounded-pill">SKS Besar</span>
                            @else
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1 rounded-pill">SKS Standar</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <!-- Tombol Detail -->
                                <a href="{{ route('matakuliah.show', $mk->id) }}" class="btn btn-sm btn-outline-info px-2 py-1" title="Detail">
                                    Detail
                                </a>
                                <!-- Tombol Edit -->
                                <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1 text-dark" title="Edit">
                                    Edit
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');" class="d-inline">
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
                        <td colspan="6" class="text-center py-5 text-muted fst-italic">
                            Belum ada data mata kuliah yang tersimpan di database.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Bagian Pagination (Jika menggunakan paginate) -->
    @if (isset($matakuliahs) && method_exists($matakuliahs, 'links'))
        <div class="mt-4 d-flex justify-content-end">
            {{ $matakuliahs->links() }}
        </div>
    @endif
</div>
@endsection