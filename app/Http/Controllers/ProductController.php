<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Toko;
use App\Models\GambarProduct;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
       $produks = Product::with(['gambars', 'toko'])
            ->where('id_user', auth()->id())
            ->get();

        return view('member.produk', compact('produks'));
    }

    // Form buat produk baru
    public function create()
    {
        $kategoris = Kategori::all();
        $tokos = Toko::all();   
        return view('member.produk-create', compact('kategoris','tokos'));
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'id_kategori' => 'required|integer',
            'id_toko' => 'required|integer',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // WAJIB: Tambahkan id_user
        $product = Product::create([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'id_user' => Auth::id(),      // ← FIX DI SINI
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now()
        ]);

        // Upload banyak gambar
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/produk'), $filename);

                GambarProduct::create([
                    'id_produk' => $product->id_produk,
                    'nama_gambar' => $filename
                ]);
            }
        }

        return redirect()->route('member.produk')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product = Product::with('gambars')->findOrFail($id);
        return view('member.produk-edit', compact('product'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'id_kategori' => 'required|integer',
            'id_toko' => 'required|integer',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'id_user' => Auth::id(),      // ← FIX SAMA SINI
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi
        ]);

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/produk'), $filename);

                GambarProduct::create([
                    'id_produk' => $product->id_produk,
                    'nama_gambar' => $filename
                ]);
            }
        }

        return redirect()->route('member.produk')
            ->with('success','Produk berhasil diperbarui!');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $product = Product::with('gambars')->findOrFail($id);

        foreach ($product->gambars as $gambar) {
            $path = public_path('uploads/produk/'.$gambar->nama_gambar);
            if (file_exists($path)) {
                unlink($path);
            }
            $gambar->delete();
        }

        $product->delete();

        return redirect()->route('member.produk')
            ->with('success','Produk berhasil dihapus!');
    }
     public function adminIndex(Request $request)
    {
        $query = Product::with(['gambars', 'kategori', 'toko']);

    // Filter kategori
    if ($request->kategori_id) {
        $query->where('id_kategori', $request->kategori_id);
    }

    // Search produk berdasarkan nama
    if ($request->search) {
        $query->where('nama_produk', 'like', '%'.$request->search.'%');
    }

    $produks = $query->get();
    $kategoris = Kategori::all();

    return view('admin.produk', compact('produks', 'kategoris'));
    }
}
