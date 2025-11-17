<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    // Tampilkan toko member
    public function index()
    {
        $toko = Auth::user()->toko; // ambil via relasi
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
            'nama_toko' => 'required|string|max:100',
            'deskripsi'   => 'nullable|string',
            'alamat' => 'nullable|string',
            'kontak_toko' => 'nullable|string|max:13',
        ]);

        // Pastikan satu user hanya boleh punya satu toko
        if (Auth::user()->toko) {
            return redirect()->route('member.toko')
                ->with('error', 'Anda sudah memiliki toko!');
        }

        Auth::user()->toko()->create([
            'nama_toko' => $request->nama_toko,
            'deskripsi'   => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak_toko' => $request->kontak_toko,
        ]);

        return redirect()->route('member.toko')->with('success', 'Toko berhasil dibuat!');
    }

    // Form edit toko
    public function edit($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        // Pastikan hanya pemilik toko yang bisa edit
        if ($toko->id_user !== Auth::id()) {
            abort(403);
        }

        return view('member.toko-edit', compact('toko'));
    }

    // Update toko
   public function update(Request $request, $id_toko)
{
    $request->validate([
        'nama_toko' => 'required|string|max:100',
        'deskripsi' => 'nullable|string',
        'alamat' => 'nullable|string',
        'kontak_toko' => 'nullable|string|max:13',
    ]);

    $toko = Toko::findOrFail($id_toko);

    if ($toko->id_user !== Auth::id()) {
        abort(403);
    }

    $toko->update($request->only('nama_toko', 'deskripsi', 'alamat', 'kontak_toko'));

    return redirect()->route('member.toko')->with('success', 'Toko berhasil diperbarui!');
}
    public function adminToko()
    {
        // ambil semua toko dengan data user
        $tokos = Toko::with('user')->get();
        return view('admin.toko', compact('tokos'));
    }

}
