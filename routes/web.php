<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('public.ladingpage');
});
Route::get('/produk', function () {
    return view('public.produk');
});
Route::get('/detail', function () {
    return view('public.detail');
});
Route::get('/toko', function () {
    return view('public.toko');
});

// FORM LOGIN & REGISTER
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::get('/registrasi', [UserController::class, 'registerForm'])->name('register');

Route::post('/login', [UserController::class, 'login']);
Route::post('/registrasi', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// DASHBOARD ADMIN
Route::middleware(['admin'])->group(function () {

    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    // List user
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.User');

    // Tambah user (form create)
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.User-create');

    // Simpan user baru
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.User.store');

    // Edit user
    Route::get('/admin/user/{id_user}/edit', [UserController::class, 'edit'])->name('admin.User-edit');
    Route::put('/admin/user/{id_user}', [UserController::class, 'update'])->name('admin.User.update');

    // Hapus user
    Route::delete('/admin/user/{id_user}', [UserController::class, 'destroy'])->name('admin.User.destroy');

    // Halaman toko
    Route::get('/admin/toko', [TokoController::class, 'adminToko'])->name('admin.toko');

    // Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('kategori/{id_kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('kategori/{id_kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // Produk admin
    Route::get('/admin/produk', [ProductController::class, 'adminIndex'])->name('admin.produk');
});


// DASHBOARD Member
Route::middleware(['member'])->group(function () {
    Route::get('/member/dashboard', [UserController::class, 'memberDashboard'])->name('member.dashboard');
    Route::get('/member/profil', [UserController::class, 'memberProfile'])->name('member.profil');
    Route::get('/member/profil/edit', [UserController::class, 'memberProfileEdit'])->name('member.profil.edit');
    Route::post('/member/profil/update', [UserController::class, 'memberProfileUpdate'])->name('member.profil.update');
    Route::get('/member/toko', [TokoController::class, 'index'])->name('member.toko');
    Route::get('/member/toko/create', [TokoController::class, 'create'])->name('member.toko.create');
    Route::post('/member/toko', [TokoController::class, 'store'])->name('member.toko.store');
    Route::get('/member/toko/{id_toko}/edit', [TokoController::class, 'edit'])->name('member.toko.edit');
    Route::put('/member/toko/{id_toko}', [TokoController::class, 'update'])->name('member.toko.update');

// Daftar produk member
Route::get('/member/produk', [ProductController::class, 'index'])->name('member.produk');

// Form tambah produk
Route::get('/member/produk/create', [ProductController::class, 'create'])->name('member.produk.create');

// Simpan produk baru
Route::post('/member/produk', [ProductController::class, 'store'])->name('member.produk.store');

// Form edit produk
Route::get('/member/produk/{id}/edit', [ProductController::class, 'edit'])->name('member.produk.edit');

// Update produk
Route::put('/member/produk/{id}', [ProductController::class, 'update'])->name('member.produk.update');

// Hapus produk
Route::delete('/member/produk/{id}', [ProductController::class, 'destroy'])->name('member.produk.destroy');

});





