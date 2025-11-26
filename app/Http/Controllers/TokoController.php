<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
   //Data Toko
    public function index()
    {
        $toko = Auth::user()->toko;
        return view('member.toko', compact('toko'));
    }

    //Form Tambah Toko
    public function create()
    {
        return view('member.toko-create');
    }

   //Proses Tambah Toko
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko'     => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'alamat'        => 'nullable|string',
            'kontak_toko'   => 'nullable|string|max:13',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

       
        if (Auth::user()->toko) {
            return redirect()->route('member.toko')
                ->with('error', 'Anda sudah memiliki toko!');
        }

        
        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('toko', $fileName, 'public');
        }

        Auth::user()->toko()->create([
            'nama_toko'   => $request->nama_toko,
            'deskripsi'   => $request->deskripsi,
            'alamat'      => $request->alamat,
            'kontak_toko' => $request->kontak_toko,
            'gambar'      => $fileName,
        ]);

        return redirect()->route('member.toko')->with('success', 'Toko berhasil dibuat!');
    }

    //Form Edit Toko
    public function edit($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        if ($toko->id_user !== Auth::id()) {
            abort(403);
        }

        return view('member.toko-edit', compact('toko'));
    }

    //Proses Edit Toko
    public function update(Request $request, $id_toko)
    {
        $request->validate([
            'nama_toko'     => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'alamat'        => 'nullable|string',
            'kontak_toko'   => 'nullable|string|max:13',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $toko = Toko::findOrFail($id_toko);

        if ($toko->id_user !== Auth::id()) {
            abort(403);
        }

        if ($request->hasFile('gambar')) {

   
        if ($toko->gambar && Storage::disk('public')->exists('toko/' . $toko->gambar)) {
            Storage::disk('public')->delete('toko/' . $toko->gambar);
        }

         $fileName = time() . '_' . $request->gambar->getClientOriginalName();

    
        $request->gambar->storeAs('toko', $fileName, 'public');

        $toko->gambar = $fileName;
        }

        $toko->update($request->only(
            'nama_toko',
            'deskripsi',
            'alamat',
            'kontak_toko'
        ));

        return redirect()->route('member.toko')->with('success', 'Toko berhasil diperbarui!');
    }

    //Toko di halaman Admin
    public function adminToko()
    {
        $tokos = Toko::with('user')->get();
        return view('admin.toko', compact('tokos'));
    }
}
