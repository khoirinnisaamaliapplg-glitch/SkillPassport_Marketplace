<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ============================
    //      REGISTER
    // ============================

    // Form register
    public function registerForm()
    {
        return view('auth.registrasi');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'nullable',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,member'
        ]);

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ============================
    //          LOGIN
    // ============================

    // Form login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {

            // Redirect sesuai role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('member.dashboard');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // ============================
    //          LOGOUT
    // ============================
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Form tambah user (ADMIN)
public function create()
{
    return view('admin.User-create');
}

// Simpan user baru (ADMIN)
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kontak' => 'nullable',
        'username' => 'required|unique:users,username',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,member'
    ]);

    User::create([
        'nama' => $request->nama,
        'kontak' => $request->kontak,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('admin.User')->with('success', 'User baru berhasil ditambahkan!');
}


    // ============================
    //      DASHBOARD
    // ============================

    public function adminDashboard()
    {
        
        // Hitung total dari database
        $totalUsers = User::count();
        $totalProduk = Product::count();
        $totalToko = Toko::count();

        return view('admin.dashboard', compact('totalUsers', 'totalProduk', 'totalToko'));
    
    }

    public function memberDashboard()
    {
         $userId = auth()->id();

    // Total produk milik user
    $totalProduk = \App\Models\Product::where('id_user', $userId)->count();

    // Total toko milik user
    $totalToko = \App\Models\Toko::where('id_user', $userId)->count();

    // Karena belum ada tabel transaksi → sementara isi 0
    $produkTerjual = 0;

    return view('member.dashboard', compact('totalProduk', 'totalToko', 'produkTerjual'));
    }

   // ============================
//       DATA USER ADMIN
// ============================
public function index()
{
    $users = User::all();  
    return view('admin.User', compact('users'));
}

public function edit($id_user) // ganti $id jadi $id_user
{
    $user = User::findOrFail($id_user);
    return view('admin.User-edit', compact('user'));
}

public function update(Request $request, $id_user) // ganti juga disini
{
    $request->validate([
        'nama' => 'required',
        'kontak' => 'nullable',
        'username' => 'required|unique:users,username,' . $id_user . ',id_user', // unique sesuai id_user
        'role' => 'required|in:admin,member',
        'password' => 'nullable|min:6'
    ]);

    $user = User::findOrFail($id_user);

    $user->nama = $request->nama;
    $user->kontak = $request->kontak;
    $user->username = $request->username;
    $user->role = $request->role;

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.User')->with('success', 'Data user berhasil diperbarui!');
}

public function destroy($id_user)
{
    $user = User::findOrFail($id_user);
    $user->delete();
    return redirect()->route('admin.User')->with('success', 'User berhasil dihapus!');
}

public function memberProfile()
{
    $user = auth()->user();
    return view('member.profil', compact('user'));
}

public function memberProfileEdit()
{
    $user = auth()->user();
    return view('member.profil-edit', compact('user'));
}

public function memberProfileUpdate(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'nama' => 'required|string|max:100',
        'username' => 'required|string|max:50',
        'kontak' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
    ]);

    // Update data saja (tanpa foto)
    $user->update([
        'nama' => $request->nama,
        'username' => $request->username,
        'kontak' => $request->kontak,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('member.profil')
        ->with('success', 'Profil berhasil diperbarui!');
}



}
