<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
    ];

    // Relasi ke tabel users (Dosen Pengampu)
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}