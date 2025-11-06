<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

