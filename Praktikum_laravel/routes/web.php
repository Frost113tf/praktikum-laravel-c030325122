<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QueryBuilderDemoController;
use App\Http\Controllers\LaporanController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/halo', function () {
    return 'Halo, ini adalah route pertama saya!';
});

Route::get('/sapa', function () {
    return view('sapa', [
        'nama' => 'Gusti Muhammad Akmal Kesuma',
        'kontenHtml' => '<strong>Teks Tebal</strong>',
    ]);
});

Route::get('/profil', function () {
    return 'Ini adalah halaman Profil Saya';
});

Route::get('/kontak', function () {
    return 'Hubungi kami melalui email: admin@instansi.ac.id';
});

Route::get('/tentang', function () {
    return 'Halaman ini berisi informasi tentang aplikasi akademik.';
});

Route::get('/dosen/{nip}', function ($nip) {
    return "Halaman detail dosen dengan NIP: {$nip}";
})->where('nim', '[0-9]+')->name('dosen.show');

Route::get('/profil', function () {
    return view('profil')
        ->with('nama', 'Gusti Muhammad Akmal Kesuma')
        ->with('nim', 'C030325122')
        ->with('prodi', 'Teknik Informatika');
});

Route::get('/akademik/statistik', function () {
    return view('akademik.statistik');
});

Route::get('/praktikum5', function () {
    // Simulasi data mahasiswa dari database + serangan XSS
    $mahasiswa = [
        (object)[
            'nim' => 'C030325122',
            'nama' => 'Gusti Muhammad Akmal Kesuma',
            'prodi' => 'Teknik Informatika',
            'julukan' => 'Si Kancil'
        ],
        (object)[
            'nim' => '2024010002',
            'nama' => '<script>alert("XSS")</script>', // Simulasi Script XSS
            'prodi' => 'Teknik Rekayasa Komputer',
            'julukan' => null // Data null untuk diuji dengan ??
        ]
    ];

    $kontenHtml = '<strong>Teks Tebal dari Database</strong>';

    return view('praktikum5', compact('mahasiswa', 'kontenHtml'));
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    })->name('dashboard');

    Route::get('/profil', function () {
        return 'Profil Admin';
    })->name('profil');
});

Route::get('/praktikum5', function () {
    // Simulasi data mahasiswa dari database + serangan XSS
    $mahasiswa = [
        (object)[
            'nim' => 'C030325122',
            'nama' => 'Gusti Muhammad Akmal Kesuma',
            'prodi' => 'Teknik Informatika',
            'julukan' => 'Si Kancil'
        ],
        (object)[
            'nim' => '2024010002',
            'nama' => '<script>alert("XSS")</script>', // Simulasi Script XSS
            'prodi' => 'Teknik Rekayasa Komputer',
            'julukan' => null // Data null untuk diuji dengan ??
        ],
        (object)[
            'nim' => '2024010003',
            'nama' => 'Budi Santoso',
            'prodi' => 'Sistem Informasi',
            'julukan' => 'Si Pintar'
        ],
        (object)[
            'nim' => '2024010004',
            'nama' => 'Siti Aminah',
            'prodi' => 'Teknik Elektro',
            'julukan' => null // Data null untuk diuji dengan ??
        ],
        (object)[
            'nim' => '2024010005',
            'nama' => 'Ahmad Fauzi',
            'prodi' => 'Teknik Mesin',
            'julukan' => 'Si Kuat'
        ]
    ];

    $kontenHtml = '<strong>Teks Tebal dari Database</strong>';

    return view('praktikum5', compact('mahasiswa', 'kontenHtml'));
});

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::get('/demo/semua', [QueryBuilderDemoController::class, 'tampilkanSemua']);
Route::get('/demo/filter', [QueryBuilderDemoController::class, 'tampilkanFilter']);
Route::get('/demo/statistik', [QueryBuilderDemoController::class, 'statistikProdi']);
Route::get('/demo/tambah', [QueryBuilderDemoController::class, 'formTambah']);
Route::post('/demo/simpan', [QueryBuilderDemoController::class, 'simpan']);
Route::get('/statistik-prodi', [QueryBuilderDemoController::class, 'statistikProdi']);
Route::get('/mahasiswa-paginate', [MahasiswaController::class, 'indexPagination']);
Route::get('/laporan/statistik-prodi', [LaporanController::class, 'statistikProdi'])->name('laporan.statistik');
// Tambahkan route ini:
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('matakuliah', MatakuliahController::class);
