<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    // Tampilkan toko member
    public function index()
    {
        $toko = Auth::user()->toko;
        return view('member.toko', compact('toko'));
    }

    // Form buat toko baru
    public function create()
    {
        return view('member.toko-create');
    }

    // Simpan toko baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko'     => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'alamat'        => 'nullable|string',
            'kontak_toko'   => 'nullable|string|max:13',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Cek agar 1 user hanya punya 1 toko
        if (Auth::user()->toko) {
            return redirect()->route('member.toko')
                ->with('error', 'Anda sudah memiliki toko!');
        }

        // Upload foto jika ada
        $fileName = null;
       if ($request->hasFile('gambar')) {
        $fileName = time() . '_' . $request->gambar->getClientOriginalName();
        // Simpan file ke disk 'public/toko'
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

    // Form edit toko
    public function edit($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        if ($toko->id_user !== Auth::id()) {
            abort(403);
        }

        return view('member.toko-edit', compact('toko'));
    }

    // Update toko
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

    // Hapus foto lama
    if ($toko->gambar && Storage::disk('public')->exists('toko/' . $toko->gambar)) {
        Storage::disk('public')->delete('toko/' . $toko->gambar);
    }

    $fileName = time() . '_' . $request->gambar->getClientOriginalName();

    // Simpan file di disk 'public'
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

    // Admin - lihat semua toko
    public function adminToko()
    {
        $tokos = Toko::with('user')->get();
        return view('admin.toko', compact('tokos'));
    }
}
