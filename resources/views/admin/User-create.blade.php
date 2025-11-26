@extends('admin.template')

@section('title', '')

@section('content')

<style>
    
    .header-custom {
        background: linear-gradient(135deg, #0f2f63, #254a87);
        padding: 22px;
        border-radius: 14px;
        color: white;
        margin-bottom: 28px;
        text-align: center;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        letter-spacing: .5px;
    }

    
    .form-container {
        background: #ffffff;
        padding: 35px 30px;
        border-radius: 18px;

        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        border: 1px solid #e8e8e8;

        max-width: 650px;
        margin: auto;
    }

    
    label {
        font-weight: 600;
        margin-top: 15px;
        display: block;
        color: #102863;
        font-size: 15px;
    }

    
    input, select {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;

        border: 1px solid #cfd3da;
        background: #fafbff;

        margin-top: 6px;
        font-size: 15px;
        transition: .25s;
    }

    input:focus, select:focus {
        border-color: #2c77ff;
        box-shadow: 0 0 0 3px rgba(44,119,255,0.18);
        outline: none;
        background: #ffffff;
    }

   
    .btn-submit {
        background: linear-gradient(135deg, #2cce75, #1fa85b);
        border: none;
        padding: 14px 25px;
        color: white;

        border-radius: 12px;
        cursor: pointer;
        font-weight: 700;
        width: 100%;
        margin-top: 28px;

        font-size: 16px;
        transition: 0.25s ease;
        letter-spacing: .5px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #29b869, #178e4d);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.12);
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
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="member">Member</option>
        </select>

        <button class="btn-submit">Simpan User</button>
    </form>
</div>

@endsection
