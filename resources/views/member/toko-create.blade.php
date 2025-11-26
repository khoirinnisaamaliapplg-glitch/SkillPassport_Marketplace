@extends('member.template')

@section('title', 'Buat Toko')

@section('content')

<style>
    /* CARD UTAMA */
    .create-card {
        background: #fff;
        border-radius: 20px;
        padding: 35px 30px;
        max-width: 650px;
        margin: 50px auto;
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        border-top: 6px solid #2cce75;
        transition: all 0.3s ease;
    }
    .create-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }

    /* HEADER */
    .create-card h3 {
        text-align: center;
        font-weight: 700;
        color: #102863;
        margin-bottom: 30px;
        font-size: 26px;
        letter-spacing: 0.5px;
    }

    /* FORM INPUT */
    .form-label {
        font-weight: 600;
        color: #0f2f63;
        margin-bottom: 6px;
    }
    .form-control {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-size: 15px;
        transition: all 0.3s ease;
        height: 45px;
    }
    .form-control:focus {
        border-color: #2cce75;
        box-shadow: 0 0 10px rgba(44,206,117,0.3);
    }
    textarea.form-control {
        border-radius: 12px;
        height: auto;
        padding-top: 10px;
    }

    /* TOMBOL */
    .btn-submit, .btn-back {
        min-width: 140px;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        color: #fff;
        transition: all 0.3s ease;
        text-align: center;
    }
    .btn-submit {
        background: linear-gradient(135deg, #2cce75, #25b864);
        box-shadow: 0 4px 12px rgba(44,206,117,0.3);
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(44,206,117,0.5);
    }
    .btn-back {
        background: #102863;
    }
    .btn-back:hover {
        background: #0f2f63;
        transform: translateY(-2px);
    }

    /* FLEX BUTTON RESPONSIVE */
    .d-flex {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    /* RESPONSIVE */
    @media(max-width:768px){
        .create-card { padding: 25px 20px; margin-top: 30px; }
    }
    @media(max-width:576px){
        .d-flex { flex-direction: column; }
        .btn-submit, .btn-back { width: 100%; }
        .create-card h3 { font-size: 22px; }
        .form-control { font-size: 14px; height: 42px; }
    }
</style>

<div class="create-card">
    <h3>Buat Toko Baru</h3>

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

        <div class="d-flex mt-4">
            <a href="{{ route('member.toko') }}" class="btn-back">Kembali</a>
            <button type="submit" class="btn-submit">Buat Toko</button>
        </div>
    </form>
</div>

@endsection
