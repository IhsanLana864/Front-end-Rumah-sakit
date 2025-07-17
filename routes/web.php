<?php

use Illuminate\Support\Facades\Route;

// ==============================
// 🔰 Beranda
// ==============================
Route::view('/', 'index')->name('beranda');

// ==============================
// 📂 Layanan & Fasilitas
// ==============================
Route::prefix('layanan-fasilitas')->name('layanan.')->group(function () {
    Route::view('/layanan', 'layanan-fasilitas.layanan')->name('layanan'); // /layanan
    Route::view('/fasilitas', 'layanan-fasilitas.fasilitas')->name('fasilitas'); // /layanan/fasilitas
});

// ==============================
// 📂 Profil RS
// ==============================
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/tentang-kami', 'profil.tentang-kami')->name('tentang-kami'); // /profil/tentang-kami
    Route::view('/manajemen', 'profil.manajemen')->name('manajemen');         // /profil/manajemen
    Route::view('/dokter', 'profil.dokter')->name('dokter');                 // /profil/dokter
});

// ==============================
// 📄 Halaman Tunggal
// ==============================
Route::view('/kegiatan', 'kegiatan')->name('kegiatan');
Route::view('/artikel', 'artikel')->name('artikel');
Route::view('/e-survey', 'esurvey')->name('esurvey');
Route::view('/kontak', 'kontak')->name('kontak');
