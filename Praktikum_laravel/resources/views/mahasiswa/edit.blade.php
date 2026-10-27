@extends('layouts.app')

@section('judul', 'Edit Mahasiswa')

@section('konten')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                <div class="mb-4 pb-3 border-bottom">
                    <h3 class="fw-bold text-dark mb-1">Edit Data Mahasiswa</h3>
                    <p class="text-muted mb-0 small">Perbarui informasi data akademik mahasiswa.</p>
                </div>

                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NIM:</label>
                        <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap:</label>
                        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Program Studi:</label>
                        <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Semester:</label>
                        <input type="number" name="semester" class="form-control" value="{{ $mahasiswa->semester }}" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection