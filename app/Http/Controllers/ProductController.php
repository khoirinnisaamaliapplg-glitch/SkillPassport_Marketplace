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
    //Form Produk member
    public function index()
    {
       $produks = Product::with(['gambars', 'toko'])
            ->where('id_user', auth()->id())
            ->get();

        return view('member.produk', compact('produks'));
    }

    //Form Tambah Produk
    public function create()
    {
        $kategoris = Kategori::all();
        $tokos = Toko::all();   
        return view('member.produk-create', compact('kategoris','tokos'));
    }

    //Proses Tambah
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

        
        $product = Product::create([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'id_user' => Auth::id(),     
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now()
        ]);

       
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

        return redirect()->route('member.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

   //From Edit
   public function edit($id)
    {
        $product = Product::with('gambars')->findOrFail($id);
        $kategoris = Kategori::all();
        $tokos = Toko::all();

        return view('member.produk-edit', compact('product', 'kategoris', 'tokos'));
    }

    //Proses Edit
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

        $product = Product::with('gambars')->findOrFail($id);

        
        $product->update([
            'id_kategori' => $request->id_kategori,
            'id_toko' => $request->id_toko,
            'id_user' => Auth::id(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi
        ]);

        
        if ($request->hasFile('gambar')) {
            foreach ($product->gambars as $gambar) {
                $path = public_path('uploads/produk/' . $gambar->nama_gambar);
                if (file_exists($path)) unlink($path);
                $gambar->delete();
            }

            
            foreach ($request->file('gambar') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/produk'), $filename);

                GambarProduct::create([
                    'id_produk' => $product->id_produk,
                    'nama_gambar' => $filename
                ]);
            }
        }

        return redirect()->route('member.produk')->with('success', 'Produk berhasil diperbarui!');
    }

    //Proses Hapus
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

        return redirect()->route('member.produk')->with('success','Produk berhasil dihapus!');
    }

    //Form Produk Admin
   public function adminIndex(Request $request)
    {
        $query = Product::with(['gambars', 'kategori', 'toko']);
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id); 
        }

        if ($request->search) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $produks = $query->get();
        $kategoris = Kategori::all();

        return view('admin.produk', compact('produks', 'kategoris'));
    }

}
