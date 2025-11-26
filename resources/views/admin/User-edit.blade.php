@extends('admin.template')

@section('title', 'Edit User')

@section('content')

<style>
    .edit-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        max-width: 600px;
        margin: auto;
        border-left: 8px solid #2cce75;
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-label {
        font-weight: 600;
        color: #0f2f63;
        margin-bottom: 6px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 10px 14px;
        border: 1px solid #d6dbe3;
        transition: all 0.25s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2cce75;
        box-shadow: 0 0 0 4px rgba(44,206,117,0.2);
    }

    .btn-save {
        background: #2cce75;
        color: white;
        font-weight: 600;
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        transition: 0.25s ease;
    }

    .btn-save:hover {
        background: #26b86a;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(44,206,117,0.3);
    }

    .btn-back {
        background: #102863;
        color: white;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 10px;
        border: none;
        transition: 0.25s ease;
    }

    .btn-back:hover {
        background: #0c1f4d;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(16,40,99,0.3);
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 25px;
    }

    h3.title-header {
        font-weight: 700;
        color: #102863;
        text-align: center;
        margin-bottom: 25px;
        font-size: 26px;
    }
</style>

<div class="edit-card">

    <h3 class="title-header">Edit User</h3>

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

        <div class="action-buttons">
            <a href="{{ route('admin.User') }}">
                <button type="button" class="btn-back">Kembali</button>
            </a>

            <button type="submit" class="btn-save">Simpan Perubahan</button>
        </div>
    </form>

</div>

@endsection
