<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ============================
    // REGISTER
    // ============================

    public function registerForm()
    {
        return view('auth.registrasi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'nullable',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,member',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filename = null;

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->hashName();
            $request->file('foto')->store('profil', 'public');
        }

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'foto' => $filename
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    // ============================
    // LOGIN
    // ============================

    public function loginForm()
    {
        return view('auth.login');
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // ============================
    // ADMIN - CREATE USER
    // ============================

    public function create()
    {
        return view('admin.User-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'nullable',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,member',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filename = null;

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->hashName();
            $request->file('foto')->store('profil', 'public');
        }

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'foto' => $filename,
        ]);

        return redirect()->route('admin.User')->with('success', 'User baru berhasil ditambahkan!');
    }

    // ============================
    // ADMIN - DATA USER
    // ============================

    public function index()
    {
        $users = User::all();
        return view('admin.User', compact('users'));
    }

    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('admin.User-edit', compact('user'));
    }

    public function update(Request $request, $id_user)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'nullable',
            'username' => 'required|unique:users,username,' . $id_user . ',id_user',
            'role' => 'required|in:admin,member',
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = User::findOrFail($id_user);

        $user->nama = $request->nama;
        $user->kontak = $request->kontak;
        $user->username = $request->username;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {

            if ($user->foto && file_exists(storage_path('app/public/profil/' . $user->foto))) {
                unlink(storage_path('app/public/profil/' . $user->foto));
            }

            $filename = $request->file('foto')->hashName();
            $request->file('foto')->store('profil', 'public');

            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('admin.User')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        if ($user->foto && file_exists(storage_path('app/public/profil/' . $user->foto))) {
            unlink(storage_path('app/public/profil/' . $user->foto));
        }

        $user->delete();

        return redirect()->route('admin.User')->with('success', 'User berhasil dihapus!');
    }

    // ============================
    // MEMBER PROFIL
    // ============================

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->kontak = $request->kontak;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto')) {

            if ($user->foto && file_exists(storage_path('app/public/profil/' . $user->foto))) {
                unlink(storage_path('app/public/profil/' . $user->foto));
            }

            $filename = $request->file('foto')->hashName();
            $request->file('foto')->store('profil', 'public');

            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('member.profil')->with('success', 'Profil berhasil diperbarui!');
    }

}
