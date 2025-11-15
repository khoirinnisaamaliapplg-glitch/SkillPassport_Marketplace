<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/registrasi', function () {
    return view('auth.registrasi');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/user', function () {
    return view('admin.User');
});
Route::get('/admin/toko', function () {
    return view('admin.toko');
});

Route::get('/member/dashboard', function () {
    return view('member.dashboard');
});

Route::get('/member/produk', function () {
    return view('member.produk');
});

Route::get('/member/profil', function () {
    return view('member.profil');
});