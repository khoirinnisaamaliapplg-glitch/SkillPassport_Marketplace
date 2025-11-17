@extends('admin.template')

@section('title', 'Tambah User')

@section('content')

<style>
    .header-custom {
        background: #102863;
        padding: 20px;
        border-radius: 10px;
        color: white;
        margin-bottom: 25px;
        text-align: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.2);
    }

    .form-container {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        border-left: 10px solid #2cce75;
        max-width: 600px;
        margin: auto;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-top: 5px;
    }

    .btn-submit {
        background: #2cce75;
        border: none;
        padding: 12px 25px;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        width: 100%;
        margin-top: 20px;
    }
</style>

<div class="header-custom">
    <h2>Tambah User Baru</h2>
</div>

<div class="form-container">
    <form action="{{ route('admin.User.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama User</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required>

        <label>Kontak</label>
        <input type="text" name="kontak" value="{{ old('kontak') }}">

        <label>Username</label>
        <input type="text" name="username" value="{{ old('username') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select>
        <button class="btn-submit">Simpan User</button>

    </form>
</div>

@endsection
