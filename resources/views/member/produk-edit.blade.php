@extends('member.template')

@section('title', 'Edit Produk')

@section('content')

<style>
    .form-container {
        background: #fff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        max-width: 700px;
        margin: 20px auto;
    }
    .form-container h3 {
        color: #0f2f63;
        margin-bottom: 20px;
        font-weight: 700;
    }
    .form-control, select, textarea {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        margin-bottom: 15px;
    }
    .btn-submit {
        background: linear-gradient(90deg, #81ef59, #2cce75);
        padding: 10px 25px;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        color: #0f2f63;
        transition: 0.3s;
    }
    .btn-submit:hover {
        opacity: 0.85;
        transform: translateY(-2px);
    }
    .btn-back {
        background: #2cce75;
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        margin-left: 10px;
        transition: 0.3s;
    }
    .btn-back:hover { opacity: 0.85; transform: translateY(-2px); }

    .produk-img {
        border-radius: 12px;
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #2cce75;
        margin-right: 10px;
        margin-bottom: 5px;
    }

    .image-preview {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }
</style>

<div class="form-container">
    <h3>Edit Produk</h3>

    @if ($errors->any())
        <div style="color:red; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('member.produk.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required value="{{ old('nama_produk', $product->nama_produk) }}">

        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}" {{ (old('id_kategori', $product->id_kategori) == $kategori->id_kategori) ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>

        <label>Toko</label>
        <select name="id_toko" class="form-control" required>
            <option value="">-- Pilih Toko --</option>
            @foreach($tokos as $toko)
                <option value="{{ $toko->id_toko }}" {{ (old('id_toko', $product->id_toko) == $toko->id_toko) ? 'selected' : '' }}>{{ $toko->nama_toko }}</option>
            @endforeach
        </select>

        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required value="{{ old('harga', $product->harga) }}">

        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required value="{{ old('stok', $product->stok) }}">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $product->deskripsi) }}</textarea>

        <label>Gambar Produk Saat Ini</label>
        <div class="image-preview">
            @foreach($product->gambars as $gambar)
                <img src="{{ asset('storage/produk/' . $gambar->nama_gambar) }}" class="produk-img">
            @endforeach
        </div>

        <label>Ganti / Tambah Gambar (Bisa lebih dari 1)</label>
        <input type="file" name="gambar[]" class="form-control" multiple>

        <button type="submit" class="btn-submit">Update Produk</button>
        <a href="{{ route('member.produk') }}" class="btn-back">Kembali</a>
    </form>
</div>

@endsection
