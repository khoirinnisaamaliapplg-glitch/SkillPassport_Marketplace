<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::where('id_user', Auth::id())->get();

        return view('member.produk.index', compact('products'));
    }

   
    public function create()
    {
        return view('member.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->harga       = $request->harga;
        $product->stok        = $request->stok;
        $product->deskripsi   = $request->deskripsi;
        $product->id_user     = Auth::id();

       
        if ($request->hasFile('foto')) {

            // nama file unik
            $fileName = $request->file('foto')->hashName();

            // simpan ke storage/app/public/produk
            $request->file('foto')->store('produk', 'public');

            $product->foto = $fileName;
        }

        $product->save();

        return redirect()->route('member.produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

  
    public function edit($id)
    {
        $product = Product::where('id_user', Auth::id())->findOrFail($id);

        return view('member.produk.edit', compact('product'));
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::where('id_user', Auth::id())->findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->nama_produk = $request->nama_produk;
        $product->harga       = $request->harga;
        $product->stok        = $request->stok;
        $product->deskripsi   = $request->deskripsi;

        
        if ($request->hasFile('foto')) {

            // hapus foto lama dari storage
            if ($product->foto && Storage::disk('public')->exists('produk/' . $product->foto)) {
                Storage::disk('public')->delete('produk/' . $product->foto);
            }

            // simpan foto baru
            $fileName = $request->file('foto')->hashName();
            $request->file('foto')->store('produk', 'public');

            $product->foto = $fileName;
        }

        $product->save();

        return redirect()->route('member.produk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $product = Product::where('id_user', Auth::id())->findOrFail($id);

        // hapus foto dari storage
        if ($product->foto && Storage::disk('public')->exists('produk/' . $product->foto)) {
            Storage::disk('public')->delete('produk/' . $product->foto);
        }

        $product->delete();

        return redirect()->route('member.produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
