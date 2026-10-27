<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'nilai_matakuliahs'; // Sesuaikan dengan nama tabel di database kamu
    protected $fillable = ['mahasiswa_id', 'matakuliah_id', 'nilai'];

    // Relasi BelongsTo ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Relasi BelongsTo ke Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}