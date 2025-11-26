@extends('member.template')

@section('title', '')

@section('content')

<style>
    /* CARD UTAMA */
    .edit-card {
        background: #fff;
        border-radius: 20px;
        padding: 35px 30px;
        max-width: 650px;
        margin: 50px auto;
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        border-top: 6px solid #2cce75;
        transition: all 0.3s ease;
    }
    .edit-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }

    /* HEADER */
    .edit-card h3 {
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

    /* PREVIEW GAMBAR */
    .img-preview {
        max-width: 160px;
        max-height: 160px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #2cce75;
        margin-bottom: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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

    /* ALERT NOTIF */
    .alert-box {
        padding: 12px 18px;
        border-radius: 12px;
        margin-bottom: 15px;
        font-size: 15px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fadeSlide 0.5s ease;
    }
    .success-alert { background: #2cce75; color: #fff; border-left: 6px solid #1e9e5a; }
    .error-alert { background: #d93030; color: #fff; border-left: 6px solid #a32323; }
    .alert-icon { font-size: 18px; }

    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* RESPONSIVE */
    @media(max-width:768px){
        .edit-card { padding: 25px 20px; margin-top: 30px; }
        .img-preview { max-width: 120px; max-height: 120px; }
    }
    @media(max-width:576px){
        .d-flex { flex-direction: column; }
        .btn-submit, .btn-back { width: 100%; }
        .edit-card h3 { font-size: 22px; }
        .form-control { font-size: 14px; height: 42px; }
    }
</style>

<div class="edit-card">
    <h3>Edit Toko</h3>

    @if(session('success'))
    <div class="alert-box success-alert">
        <span class="alert-icon">✔</span>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert-box error-alert">
        <span class="alert-icon">⚠</span>
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('member.toko.update', $toko->id_toko) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Toko</label>
            <input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $toko->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2">{{ $toko->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak_toko" value="{{ $toko->kontak_toko }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Toko</label>
            @if($toko->gambar)
                <img src="{{ asset('storage/toko/' . $toko->gambar) }}" class="img-preview">
            @endif
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="d-flex mt-4">
            <a href="{{ route('member.toko') }}" class="btn-back">Kembali</a>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </div>
    </form>
</div>

@endsection
