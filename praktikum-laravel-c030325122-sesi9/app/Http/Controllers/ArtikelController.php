<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateArtikelRequest;
use App\Http\Requests\StoreArtikelRequest;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:5|max:255',
            'isi' => 'required|min:20',
            'status' => 'required|in:draft,terbit',
        ]);
        Artikel::create([
            'user_id' => auth()->id(),
            'judul' => $validated['judul'],
            'slug' => \Illuminate\Support\Str::slug($validated['judul']),
            'isi' => $validated['isi'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil ditambahkan');
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        if ($artikel->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki hak akses untuk mengubah artikel ini.');
        }

        return view('artikel.edit', compact('artikel'));
    }

    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        if ($artikel->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki hak akses untuk memperbarui artikel ini.');
        }
        $artikel->update([
            'judul' => $request->judul,
            'slug' => \Illuminate\Support\Str::slug($request->judul),
            'isi' => $request->isi,
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil diperbarui');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki hak akses untuk menghapus artikel ini.');
        }
        $artikel->delete();

        return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil dihapus');
    }
}