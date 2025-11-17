@extends('member.template')

@section('title', 'Tambah Produk')

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
    .form-control, select {
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
</style>

<div class="form-container">
    <h3>Tambah Produk Baru</h3>

    @if ($errors->any())
        <div style="color:red; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('member.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Produk --}}
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required value="{{ old('nama_produk') }}">

        {{-- Kategori --}}
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}" 
                    {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        {{-- Toko otomatis (hidden) --}}
        <input type="hidden" name="id_toko" value="{{ auth()->user()->toko->id_toko }}">

        {{-- Harga --}}
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required value="{{ old('harga') }}">

        {{-- Stok --}}
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required value="{{ old('stok') }}">

        {{-- Deskripsi --}}
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>

        {{-- Gambar --}}
        <label>Gambar Produk (bisa lebih dari 1)</label>
        <input type="file" name="gambar[]" class="form-control" multiple>

        <button type="submit" class="btn-submit">Simpan Produk</button>
        <a href="{{ route('member.produk') }}" class="btn-back">Kembali</a>
    </form>
</div>

@endsection
