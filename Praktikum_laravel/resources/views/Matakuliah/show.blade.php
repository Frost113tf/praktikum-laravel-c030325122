@extends('layouts.app')

@section('judul', 'Detail Mata Kuliah')

@section('konten')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- Kartu Detail Mata Kuliah -->
            <div class="card shadow-sm border-0 rounded-4 p-4 bg-white mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">Detail Mata Kuliah</h3>
                        <p class="text-muted mb-0 small">Informasi kurikulum, bobot SKS, dan daftar mahasiswa peserta.</p>
                    </div>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                        &laquo; Kembali ke Daftar
                    </a>
                </div>

                <!-- Informasi Mata Kuliah -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Kode Mata Kuliah</span>
                            <span class="fs-6 font-monospace fw-bold text-dark">{{ $matakuliah->kode_mk ?? $matakuliah->kode ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Bobot SKS</span>
                            <span class="fs-6 fw-bold text-dark">{{ $matakuliah->sks }} SKS</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="p-3 border rounded-3 bg-light">
                            <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Nama Mata Kuliah</span>
                            <span class="fs-5 fw-bold text-primary">{{ $matakuliah->nama_mk ?? $matakuliah->nama ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Daftar Mahasiswa yang Mengambil Mata Kuliah Ini (Relasi Eloquent HasMany) -->
                <div>
                    <h5 class="fw-bold text-dark mb-3">Daftar Mahasiswa yang Mengambil Mata Kuliah Ini <span class="text-muted small fw-normal">(Relasi Eloquent)</span></h5>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle mb-0">
                            <thead class="table-dark text-uppercase fs-7">
                                <tr>
                                    <th class="py-2 text-center" style="width: 10%;">No</th>
                                    <th class="py-2" style="width: 25%;">NIM</th>
                                    <th class="py-2" style="width: 45%;">Nama Mahasiswa</th>
                                    <th class="py-2 text-center" style="width: 20%;">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($matakuliah->nilai as $index => $n)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td><span class="font-monospace fw-semibold text-dark">{{ $n->mahasiswa->nim ?? '-' }}</span></td>
                                        <td class="fw-bold text-dark">{{ $n->mahasiswa->nama ?? 'Mahasiswa Tidak Ditemukan' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success px-3 py-1 fs-6">{{ $n->nilai }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted fst-italic">
                                            Belum ada mahasiswa yang mengambil mata kuliah ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection