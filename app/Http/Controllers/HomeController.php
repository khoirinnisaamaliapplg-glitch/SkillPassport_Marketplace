<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product;
use App\Models\Kategori;

class HomeController extends Controller
{
    // landing page
    public function index()
    {
        $tokos = Toko::take(6)->get();
        $kategoris = Kategori::all();
        $produks = Product::with('gambars', 'kategori', 'toko')->get();
        return view('public.ladingpage', compact('tokos', 'kategoris', 'produks'));
    }

    // toko
    public function toko()
    {
        $toko = Toko::all(); 
        return view('public.toko', compact('toko'));
    }
    
    // produk
    public function produk()
    {
        
        $tokos = Toko::with(['produks.gambars'])->get();

        return view('public.produk', compact('tokos'));
    }

    // detail
    public function detail($id)
    {
        $produk = Product::with(['gambars', 'kategori', 'toko'])
            ->where('id_produk', $id)
            ->firstOrFail();

        return view('public.detail', compact('produk'));
    }

    
}
