<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GambarProduct;

class GambarProductController extends Controller
{
    // Hapus satu gambar produk
    public function destroy($id)
    {
        $gambar = GambarProduct::findOrFail($id);
        $path = public_path('uploads/produk/' . $gambar->nama_gambar);
        if(file_exists($path)){
            unlink($path);
        }

        $gambar->delete();

        return back()->with('success', 'Gambar berhasil dihapus!');
    }
}
