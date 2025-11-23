<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua toko
        $tokos = Toko::take(6)->get();

        // Ambil kategori
        $kategoris = Kategori::all();

        // Ambil semua produk lengkap dengan gambar, kategori, toko
        $produks = Product::with('gambars', 'kategori', 'toko')->get();

        return view('public.ladingpage', compact('tokos', 'kategoris', 'produks'));
    }
    public function toko()
    {
        $toko = Toko::all(); // ambil semua toko
        return view('public.toko', compact('toko'));
    }
    public function produk()
    {
        // Ambil semua toko dengan produk + gambar
        $tokos = Toko::with(['produks.gambars'])->get();

        return view('public.produk', compact('tokos'));
    }
    public function detail($id)
    {
        $produk = Product::with(['gambars', 'kategori', 'toko'])
            ->where('id_produk', $id)
            ->firstOrFail();

        return view('public.detail', compact('produk'));
    }

    
}
