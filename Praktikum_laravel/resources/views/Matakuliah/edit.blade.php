@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <h2 class="text-xl font-bold text-slate-800 mb-4">Edit Data Mata Kuliah</h2>

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
        @csrf
        @method('PUT') {{-- Wajib disertakan untuk method update/edit di Laravel --}}

        <div>
            <label class="block text-sm font-medium text-slate-700">Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Jumlah SKS</label>
            <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}" required min="1" max="6" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Semester</label>
            <input type="number" name="semester" value="{{ old('semester', $matakuliah->semester) }}" required min="1" max="8" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('matakuliah.index') }}" class="px-4 py-2 bg-gray-300 text-slate-700 rounded-md hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Perbarui Data</button>
        </div>
    </form>
</div>
@endsection