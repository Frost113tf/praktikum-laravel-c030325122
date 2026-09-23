<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    protected $model = Matakuliah::class;

    public function definition(): array
    {
        return [
            // Dosen diambil acak dari user yang ada atau dibuat otomatis jika belum ada
            'dosen_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'kode_mk' => fake()->unique()->bothify('MK-###??'),
            'nama_mk' => fake()->randomElement([
                'Pemrograman Web',
                'Struktur Data',
                'Basis Data',
                'Jaringan Komputer',
                'Kecerdasan Buatan',
                'Sistem Operasi',
                'Rekayasa Perangkat Lunak',
                'Keamanan Jaringan',
                'Algoritma Pemrograman',
                'Desain UI/UX'
            ]) . ' ' . fake()->numerify('##'),
            'sks' => fake()->numberBetween(1, 4),
            'semester' => fake()->numberBetween(1, 8),
        ];
    }
}