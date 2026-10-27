<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate/kosongkan tabel sebelum diisi ulang (opsional)
        Mahasiswa::truncate();

        $dataMahasiswa = [
            ['nim' => 'C030325122', 'nama' => 'Gusti Muhammad Akmal Kesuma', 'prodi' => 'Teknik Informatika', 'semester' => 3],
            ['nim' => 'C030325002', 'nama' => 'Siti Nurhaliza', 'prodi' => 'Sistem Informasi Kota Cerdas', 'semester' => 1],
            ['nim' => 'C030325003', 'nama' => 'Muhammad Bintang Ramadhan', 'prodi' => 'Teknik Informatika', 'semester' => 2],
            ['nim' => 'C030325004', 'nama' => 'Anisa Rahmawati', 'prodi' => 'Teknik Komputer', 'semester' => 2],
            ['nim' => 'C030325005', 'nama' => 'Dwi Cahyo Nugroho', 'prodi' => 'Teknologi Informasi', 'semester' => 3],
            ['nim' => 'C030325006', 'nama' => 'Putri Indah Sari', 'prodi' => 'Sistem Informasi Kota Cerdas', 'semester' => 4],
            ['nim' => 'C030325007', 'nama' => 'Fajar Maulana', 'prodi' => 'Teknik Informatika', 'semester' => 4],
            ['nim' => 'C030325008', 'nama' => 'Nabila Putri Utami', 'prodi' => 'Teknik Komputer', 'semester' => 5],
            ['nim' => 'C030325009', 'nama' => 'Rian Hidayat', 'prodi' => 'Teknologi Informasi', 'semester' => 5],
            ['nim' => 'C030325010', 'nama' => 'Dewi Lestari', 'prodi' => 'Sistem Informasi Kota Cerdas', 'semester' => 6],
            ['nim' => 'C030325011', 'nama' => 'Bagus Kurniawan', 'prodi' => 'Teknik Informatika', 'semester' => 6],
            ['nim' => 'C030325012', 'nama' => 'Maya Anggraini', 'prodi' => 'Teknik Komputer', 'semester' => 7],
            ['nim' => 'C030325013', 'nama' => 'Aditya Permana', 'prodi' => 'Teknologi Informasi', 'semester' => 7],
            ['nim' => 'C030325014', 'nama' => 'Fitri Handayani', 'prodi' => 'Sistem Informasi Kota Cerdas', 'semester' => 8],
            ['nim' => 'C030325015', 'nama' => 'Gilang Purnama', 'prodi' => 'Teknik Informatika', 'semester' => 8],
        ];

        foreach ($dataMahasiswa as $mhs) {
            Mahasiswa::create($mhs);
        }
    }
}