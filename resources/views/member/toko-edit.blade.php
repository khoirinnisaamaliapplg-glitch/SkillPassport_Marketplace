@extends('member.template')

@section('title', 'Edit Toko')

@section('content')

<style>
    .edit-card {
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

    .form-label { font-weight: bold; color: #0f2f63; }

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

    .btn-submit:hover { background: #25b864; }

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
        color: #fff;
        text-decoration: none;
    }

    .img-preview { max-width: 150px; margin-bottom: 10px; }
</style>

<div class="edit-card">
    <h3 class="mb-4 text-center" style="color:#102863; font-weight:bold;">Edit Toko</h3>

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
                <div>
                    <img src="{{ asset('uploads/toko/' . $toko->gambar) }}" alt="Gambar Toko" class="img-preview">
                </div>
            @endif
            <input type="file" name="gambar" class="form-control">
            <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('member.toko') }}" class="btn-back">Kembali</a>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </div>
    </form>
</div>

@endsection
