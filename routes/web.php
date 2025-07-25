<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ManajerialController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InstalasiController;
use App\Http\Controllers\SubInstalasiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InternalController;
use App\Http\Controllers\TentangKamiController;

// ==============================
// 🔰 Beranda
// ==============================
Route::get('/', [PageController::class, 'beranda'])->name('beranda');

// ==============================
// 📂 Layanan & Fasilitas
// ==============================
Route::prefix('layanan-fasilitas')->name('layanan.')->group(function () {
    Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan'); // /layanan
    Route::get('/fasilitas', [PageController::class, 'fasilitas'])->name('fasilitas'); // /layanan/fasilitas
});

// ==============================
// 📂 Profil RS
// ==============================
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/tentang-kami', [PageController::class, 'profile'])->name('tentang-kami');
    Route::get('/manajemen', [PageController::class, 'manajerial'])->name('manajemen');
    Route::get('/dokter', [PageController::class, 'dokter'])->name('dokter');                 
});

// ==============================
// 📄 Halaman Tunggal
// ==============================
Route::get('/kegiatan', [PageController::class, 'kegiatan'])->name('kegiatan');
Route::get('/artikel', [PageController::class, 'berita'])->name('artikel');
Route::get('/detail-berita/{berita}', [PageController::class, 'detailBerita'])->name('detail-berita');
Route::get('/e-survey', [PageController::class, 'esurvey'])->name('esurvey');
Route::post('/submit-survey', [SurveyController::class, 'submit'])->name('submit.survey');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
// Rute untuk halaman detail berita
// ==============================
// 📄 Admin Overall
// ==============================

// Rute untuk mengelola profil pengguna yang sedang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [AdminController::class, 'editMyProfile'])->name('profile.edit');
    Route::patch('/profile', [AdminController::class, 'updateMyProfile'])->name('profile.update');
    // Route::resource('admin/akun', AdminController::class)->except(['show', 'edit', 'update']); // Cek apakah ada konflik dengan route di atas
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Panel Admin (dikelompokkan dan dilindungi middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Rute yang bisa diakses oleh Admin & Super Admin
    Route::middleware('is_admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('dokter', DokterController::class);
        Route::resource('manajerial', ManajerialController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('kegiatan', KegiatanController::class);
        Route::resource('facilitie', FacilitieController::class);
        Route::resource('partner', PartnerController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('survey', SurveyController::class);
        Route::resource('company', CompanyController::class);
        Route::resource('sosmed', SosmedController::class);
        Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);
        Route::resource('instalasi', InstalasiController::class);
        Route::resource('sub-instalasi', SubInstalasiController::class);
        Route::resource('internal', InternalController::class);
        Route::resource('tentang-kami', TentangKamiController::class);
    });

    // Rute yang HANYA bisa diakses oleh Super Admin
    Route::middleware('super_admin')->group(function () {
        Route::resource('akun', SuperAdminController::class);
    });
});

// Memuat rute untuk otentikasi (login, register, dll.)
require __DIR__ . '/auth.php';
