@extends('member.template')

@section('title', 'Buat Toko')

@section('content')

<style>
    .create-card {
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: 40px auto;
        border-left: 10px solid #2cce75;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-label {
        font-weight: bold;
        color: #0f2f63;
    }

    .form-control {
        border-radius: 50px;
        border: 1px solid #ccc;
        padding-left: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #2cce75;
        box-shadow: 0 0 6px rgba(44, 206, 117, 0.4);
    }

    .btn-submit {
        background: #2cce75;
        color: #fff;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: #25b864;
    }

    .btn-back {
        background: #102863;
        color: #fff;
        padding: 10px 20px;
        border-radius: 50px;
        border: none;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #0f2f63;
        text-decoration: none;
        color: #fff;
    }
</style>

<div class="create-card">
    <h3 class="mb-4 text-center" style="color:#102863; font-weight:bold;">
        Buat Toko Baru
    </h3>

    <form action="{{ route('member.toko.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Toko</label>
            <input type="text" name="nama_toko" class="form-control" placeholder="Masukkan nama toko" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi toko" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat toko" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak_toko" class="form-control" placeholder="Masukkan nomor kontak toko">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Toko (opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('member.toko') }}" class="btn-back">Kembali</a>
            <button type="submit" class="btn-submit">Buat Toko</button>
        </div>
    </form>
</div>

@endsection
