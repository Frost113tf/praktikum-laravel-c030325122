<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Impor Facade DB

class QueryBuilderDemoController 
{
    // Menampilkan semua data mahasiswa
    public function tampilkanSemua()
    {
        $data = DB::table('mahasiswas')->get();
        return view('demo.query-builder', compact('data'));
    }

    // Menampilkan data mahasiswa dengan filter kondisional
    public function tampilkanFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('semester', '>', 3)
            ->orderBy('nama')
            ->get();

        return view('demo.query-builder', compact('data'));
    }

    // Rekapitulasi statistik jumlah mahasiswa per program studi
    public function statistikProdi()
    {
        $rekap = DB::table('mahasiswas')
            ->select('prodi', DB::raw('count(*) as jumlah'))
            ->groupBy('prodi')
            ->get();

        return view('demo.statistik-prodi', compact('rekap'));
    }

    // Menampilkan form tambah data mahasiswa
    public function formTambah()
    {
        return view('demo.form-tambah');
    }

    // Proses INSERT data mahasiswa baru
    public function simpan(Request $request)
    {
        DB::table('mahasiswas')->insert([
            'nim'      => $request->nim,
            'nama'     => $request->nama,
            'prodi'    => $request->prodi,
            'semester' => $request->semester,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/demo/semua')->with('pesan', 'Data berhasil ditambahkan!');
    }
}