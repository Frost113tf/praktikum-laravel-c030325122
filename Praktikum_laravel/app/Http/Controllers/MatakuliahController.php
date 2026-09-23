<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Http\Request;

class MatakuliahController
{
    // Menampilkan daftar mata kuliah beserta nama dosen pengampu
    public function index()
    {
        $matakuliahs = Matakuliah::with('dosen')->get();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    // Menampilkan form tambah mata kuliah
    public function create()
    {
        $dosens = User::all();
        return view('matakuliah.create', compact('dosens'));
    }

    // Menyimpan data menggunakan method create() Eloquent
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk'   => 'required|unique:matakuliahs,kode_mk',
            'nama_mk'   => 'required|string|max:255',
            'sks'       => 'required|integer',
            'semester'  => 'required|integer',
            'dosen_id'  => 'required|exists:users,id',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('matakuliah.index');
    }
}