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
    // Form Register
    public function registerForm()
    {
        return view('auth.registrasi');
    }

    // Proses Login
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

   

    // Form Login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {

           
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('member.dashboard');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //Form Tambah User
    public function create()
    {
        return view('admin.User-create');
    }

    //Proses Tambah User
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


    //Form Admin Dashboard
    public function adminDashboard()
    {
        
        $totalUsers = User::count();
        $totalProduk = Product::count();
        $totalToko = Toko::count();

        return view('admin.dashboard', compact('totalUsers', 'totalProduk', 'totalToko'));
    
    }
    //Form Member Dashboard
    public function memberDashboard()
    {
        $userId = auth()->id();
        $totalProduk = \App\Models\Product::where('id_user', $userId)->count();
        $totalToko = \App\Models\Toko::where('id_user', $userId)->count();
        $produkTerjual = 0;

        return view('member.dashboard', compact('totalProduk', 'totalToko', 'produkTerjual'));
    }

    //Menampilkan Data User
    public function index()
    {
        $users = User::all();  
        return view('admin.User', compact('users'));
    }

    // Form Edit User
    public function edit($id_user) 
    {
        $user = User::findOrFail($id_user);
        return view('admin.User-edit', compact('user'));
    }

    //Proses Edit User
    public function update(Request $request, $id_user) 
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'nullable',
            'username' => 'required|unique:users,username,' . $id_user . ',id_user', 
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

    //Hapus User
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();
        return redirect()->route('admin.User')->with('success', 'User berhasil dihapus!');
    }

    //Form Profil
    public function memberProfile()
    {
        $user = auth()->user();
        return view('member.profil', compact('user'));
    }
 
    //Form Profil Edit
    public function memberProfileEdit()
    {
        $user = auth()->user();
        return view('member.profil-edit', compact('user'));
    }

    //Proses Profil Edit
    public function memberProfileUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'kontak' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

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
