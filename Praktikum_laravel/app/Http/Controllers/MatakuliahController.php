<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController 
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('pesan', 'Mata kuliah berhasil ditambahkan');
    }

    public function show(Matakuliah $matakuliah)
    {
        $matakuliah->load('nilai.mahasiswa');
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('pesan', 'Mata kuliah berhasil diperbarui');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('pesan', 'Mata kuliah berhasil dihapus');
    }
}