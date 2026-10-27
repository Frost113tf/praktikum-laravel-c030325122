# Proyek Akhir Praktikum Pemrograman Web
Mini Aplikasi Manajemen Data Akademik (Laravel 13)

## Identitas Mahasiswa
- **Nama:** Gusti Muhammad Akmal Kesuma
- **NIM:** C030325122
- **Kelas:** TI-3E Axioo
- **Program Studi:** Teknik Informatika - Jurusan Teknik Elektro, Politeknik Negeri Banjarmasin

## Deskripsi Proyek
Aplikasi web sederhana berbasis Laravel 13 untuk mengelola data mata kuliah dan keterhubungannya dengan dosen pengampu (relasi One-to-Many antara tabel `users` dan `matakuliahs`). Proyek ini mencakup implementasi migrasi foreign key, Eloquent ORM, form input, serta otomatisasi data dummy menggunakan factory dan seeder.

## Daftar Perintah Artisan yang Digunakan
1. `php artisan make:model Matakuliah -mc` : Membuat model, migration, dan controller mata kuliah.
2. `php artisan make:migration add_dosen_id_to_matakuliahs_table` : Menambahkan foreign key relasi dosen.
3. `php artisan make:factory MatakuliahFactory` : Membuat factory untuk data dummy mata kuliah.
4. `php artisan make:seeder MatakuliahSeeder` : Membuat seeder untuk mengisi 20 baris data otomatis.
5. `php artisan migrate:fresh --seed` : Mereset tabel dan menjalankan seluruh migrasi beserta data seeder.
6. `php artisan serve` : Menjalankan server aplikasi web lokal.

## Panduan Menjalankan Proyek
1. Clone atau ekstrak file proyek ini.
2. Buka terminal pada direktori proyek, lalu jalankan:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate