@extends('admin.template')

@section('title', 'Edit User')

@section('content')

<style>
    .edit-card {
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: auto;
        border-left: 10px solid #2cce75;
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-label {
        font-weight: bold;
        color: #0f2f63;
    }

    .btn-save {
        background: #2cce75;
        color: white;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
    }

    .btn-save:hover {
        background: #25b864;
    }

    .btn-back {
        background: #102863;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
    }
</style>

<div class="edit-card">

    <h3 class="mb-4 text-center" style="color:#102863; font-weight:bold;">
        Edit User
    </h3>

    <form action="{{ route('admin.User.update', $user->id_user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $user->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" value="{{ $user->kontak }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>
    

        <div class="mb-3">
            <label class="form-label">Password (kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password baru (opsional)">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.User') }}">
                <button type="button" class="btn-back">Kembali</button>
            </a>
            <button type="submit" class="btn-save">Simpan Perubahan</button>
        </div>
    </form>

</div>

@endsection
