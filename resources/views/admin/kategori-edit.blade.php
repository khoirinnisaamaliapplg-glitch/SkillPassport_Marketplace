@extends('admin.template')

@section('title', 'Edit Kategori')

@section('content')

<style>
    .card-form {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        border-left: 8px solid #2cce75;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card-form h3 {
        text-align: center;
        color: #102863;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: #0f2f63;
    }

    .form-control {
        border-radius: 50px;
        border: 1px solid #ccc;
        padding-left: 15px;
        transition: all 0.3s ease;
        height: 45px;
    }

    .form-control:focus {
        border-color: #2cce75;
        box-shadow: 0 0 6px rgba(44,206,117,0.4);
    }

    .btn-submit {
        background: #2cce75;
        color: #fff;
        font-weight: 600;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        cursor: pointer;
        transition: 0.3s;
        margin-right: 10px;
    }

    .btn-submit:hover {
        background: #25b864;
    }

    .btn-back {
        background: #102863;
        color: #fff;
        padding: 10px 25px;
        border-radius: 50px;
        border: none;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: #0f2f63;
        color: #fff;
        text-decoration: none;
    }

    .d-flex { display: flex; justify-content: center; gap: 10px; margin-top: 20px; }
</style>

<div class="card-form">
    <h3>Edit Kategori</h3>

    <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <a href="{{ route('admin.kategori') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>

@endsection
