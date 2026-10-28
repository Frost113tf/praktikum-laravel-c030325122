# Proyek Akhir Praktikum Pemrograman Web - Laravel 13

## Identitas Mahasiswa
* **Nama**: Gusti Muhammad Akmal Kesuma
* **NIM**: C030325122
* **Mata Kuliah**: DesainWeb

## Deskripsi Aplikasi
Aplikasi ini adalah sistem manajemen artikel (CRUD) sederhana yang dibangun menggunakan Laravel 13. Aplikasi ini dilengkapi dengan sistem autentikasi, relasi basis data (Artikel, User, dan Kategori), otorisasi kepemilikan data pengguna, serta validasi form menggunakan *Form Request*.

## Akun Contoh (Testing)
Anda dapat menggunakan akun berikut untuk menguji coba fitur autentikasi dan pembuatan artikel:
* **Email**: gustimuhammadakmalkusuma@gmail.com
* **Password**: 12345678
*(Catatan untuk pengajar: jika akun ini tidak tersedia, silakan lakukan Registrasi akun baru melalui halaman aplikasi).*

## Daftar Route Aplikasi
Berikut adalah ringkasan route utama aplikasi ini:
| Method    | URI                 | Name           | Action | Middleware |
|-----------|---------------------|----------------|--------|------------|
| GET|HEAD  | /                   |                | view   | web        |
| GET|HEAD  | /login              | login          | AuthController@formLogin | web |
| POST      | /login              | login.post     | AuthController@login | web |
| GET|HEAD  | /register           | register       | AuthController@formRegister | web |
| POST      | /register           |                | AuthController@register | web |
| POST      | /logout             | logout         | AuthController@logout | web |
| GET|HEAD  | /artikel            | artikel.index  | ArtikelController@index | web |
| GET|HEAD  | /artikel/create     | artikel.create | ArtikelController@create | web, auth |
| POST      | /artikel            | artikel.store  | ArtikelController@store | web, auth |
| GET|HEAD  | /artikel/{artikel}  | artikel.show   | ArtikelController@show | web |
| GET|HEAD  | /artikel/{artikel}/edit | artikel.edit | ArtikelController@edit | web, auth |
| PUT|PATCH | /artikel/{artikel}  | artikel.update | ArtikelController@update | web, auth |
| DELETE    | /artikel/{artikel}  | artikel.destroy| ArtikelController@destroy | web, auth |

## Cara Menjalankan Project
1. Pastikan Anda telah menginstal PHP, Composer, dan MySQL/MariaDB.
2. Ekstrak *file* .zip proyek ini, lalu buka terminal di direktori proyek.
3. Jalankan perintah `composer install` untuk mengunduh dependensi (vendor).
4. Salin berkas `.env.example` menjadi `.env`, lalu atur konfigurasi `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai dengan server basis data Anda.
5. Jalankan `php artisan key:generate`.
6. Jalankan migrasi basis data dengan perintah `php artisan migrate`.
7. Jalankan server pengembangan lokal dengan `php artisan serve`.
8. Buka browser dan akses `http://127.0.0.1:8000`.