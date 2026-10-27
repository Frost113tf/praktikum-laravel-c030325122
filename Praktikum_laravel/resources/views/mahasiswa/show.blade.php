@extends('layouts.app')

@section('judul', 'Detail Mahasiswa')

@section('konten')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Kartu Detail Mahasiswa -->
            <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">Detail Mahasiswa</h3>
                        <p class="text-muted mb-0 small">Informasi lengkap profil dan akademik mahasiswa.</p>
                    </div>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                        &laquo; Kembali ke Daftar
                    </a>
                </div>

                <!-- Informasi Biodata -->
                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <span class="d-block text-muted small text-uppercase fw-semibold mb-1">NIM</span>
                                <span class="fs-6 font-monospace fw-bold text-dark">{{ $mahasiswa->nim }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Semester</span>
                                <span class="fs-6 fw-bold text-dark">Semester {{ $mahasiswa->semester }}</span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="p-3 border rounded-3 bg-light">
                                <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Nama Lengkap</span>
                                <span class="fs-5 fw-bold text-primary">{{ $mahasiswa->nama }}</span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="p-3 border rounded-3 bg-light">
                                <span class="d-block text-muted small text-uppercase fw-semibold mb-1">Program Studi</span>
                                <span class="fs-6 fw-semibold text-dark">{{ $mahasiswa->prodi }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Relasi Nilai Mata Kuliah (Eloquent HasMany) -->
                <div>
                    <h5 class="fw-bold text-dark mb-3">Daftar Nilai Mata Kuliah <span class="text-muted small fw-normal">(Relasi Eloquent)</span></h5>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle mb-0">
                            <thead class="table-dark text-uppercase fs-7">
                                <tr>
                                    <th class="py-2 text-center" style="width: 10%;">No</th>
                                    <th class="py-2">Kode MK</th>
                                    <th class="py-2">Nama Mata Kuliah</th>
                                    <th class="py-2 text-center" style="width: 20%;">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mahasiswa->nilai as $index => $n)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td><span class="font-monospace">{{ $n->matakuliah->kode_mk ?? '-' }}</span></td>
                                        <td class="fw-semibold">{{ $n->matakuliah->nama_mk ?? 'Mata Kuliah Tidak Ditemukan' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success px-3 py-1 fs-6">{{ $n->nilai }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted fst-italic">
                                            Belum ada nilai mata kuliah yang tercatat untuk mahasiswa ini.
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