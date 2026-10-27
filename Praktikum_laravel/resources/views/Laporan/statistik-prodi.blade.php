@extends('layouts.app')

@section('judul', 'Statistik Program Studi')

@section('konten')
<div class="card p-4 shadow-sm">
    <h3 class="mb-3">Laporan Statistik Jumlah Mahasiswa per Program Studi</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Program Studi</th>
                <th>Jumlah Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rekap as $item)
            <tr>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->jumlah }} Orang</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">Belum ada data rekap.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection