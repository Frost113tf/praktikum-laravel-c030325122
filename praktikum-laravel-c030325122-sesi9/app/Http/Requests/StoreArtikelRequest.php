<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreArtikelRequest;

class StoreArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function store(StoreArtikelRequest $request)
    {
    Artikel::create($request->validated() + ['user_id' => auth()->id()]);
    return redirect()->route('artikel.index')->with('pesan', 'Artikel berhasil ditambahkan');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|min:5|max:255',
            'isi' => 'required|min:20',             // Kolom isi wajib diisi dan minimal 20 karakter
            'status' => 'required|in:draft,terbit',
        ];
    }
}
