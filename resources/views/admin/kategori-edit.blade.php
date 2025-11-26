@extends('admin.template')

@section('title', '')

@section('content')

<style>
    
    .card-form {
        max-width: 520px;
        margin: 45px auto;
        padding: 32px;
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e8e8e8;
        box-shadow:
            0 4px 8px rgba(0, 0, 0, 0.04),
            0 10px 25px rgba(0, 0, 0, 0.06);
        animation: fadeIn 0.45s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .card-form h3 {
        text-align: center;
        color: #102863;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 25px;
    }

    
    .form-label {
        font-weight: 600;
        color: #102863;
        font-size: 15px;
        margin-bottom: 6px;
    }

    
    .form-control {
        border-radius: 12px;
        border: 1px solid #cfcfcf;
        padding: 12px 14px;
        transition: 0.25s ease;
        font-size: 15px;
        height: 48px;
    }

    .form-control:focus {
        border-color: #2cce75;
        box-shadow: 0 0 6px rgba(44,206,117,0.35);
    }

    
    .btn-submit {
        background: #2cce75;
        border: none;
        color: white;
        padding: 12px 28px;
        font-weight: 600;
        border-radius: 12px;
        transition: 0.25s ease;
        font-size: 15px;
    }

    .btn-submit:hover {
        background: #25b864;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(44,206,117,0.35);
    }

    
    .btn-back {
        background: #102863;
        color: white;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: 0.25s ease;
        display: inline-block;
    }

    .btn-back:hover {
        background: #0d1f4c;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 38, 99, 0.35);
    }

    
    .action-row {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 25px;
    }
</style>

<div class="card-form">
    <h3>Edit Kategori</h3>

    <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                   value="{{ $kategori->nama_kategori }}" required>
        </div>

        <div class="action-row">
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <a href="{{ route('admin.kategori') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>

@endsection
