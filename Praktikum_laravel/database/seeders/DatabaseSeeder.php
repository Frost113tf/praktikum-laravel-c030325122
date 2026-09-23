<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat minimal 5 user dosen terlebih dahulu
        User::factory()->count(5)->create();

        // Panggil seeder mata kuliah
        $this->call([
            MatakuliahSeeder::class,
        ]);
    }
}