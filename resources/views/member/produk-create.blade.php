@extends('member.template')

@section('title', 'Tambah Produk')

@section('content')

<style>
    .form-container {
        background: #fff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        max-width: 750px;
        margin: 20px auto;
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-container h3 {
        color: #0f2f63;
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 26px;
        text-align: center;
    }

    label {
        font-weight: 600;
        color: #0f2f63;
        margin-bottom: 6px;
        display: block;
    }

    .form-control, select, textarea {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 12px;
        width: 100%;
        margin-bottom: 18px;
        font-size: 15px;
    }

    textarea {
        min-height: 110px;
        resize: vertical;
    }

    .btn-submit {
        background: linear-gradient(90deg, #81ef59, #2cce75);
        padding: 12px 25px;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        color: #0f2f63;
        transition: 0.3s;
        width: 100%;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .btn-submit:hover {
        opacity: .85;
        transform: translateY(-2px);
    }

    .btn-back {
        display: inline-block;
        background: #102863;
        color: white;
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: bold;
        text-align: center;
        width: 100%;
        font-size: 16px;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #0d2152;
        transform: translateY(-2px);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
            margin: 10px;
        }
        .form-container h3 {
            font-size: 22px;
        }
        .btn-submit,
        .btn-back {
            font-size: 15px;
        }
    }
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

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control"
            required value="{{ old('nama_produk') }}">

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

        <input type="hidden" name="id_toko" value="{{ auth()->user()->toko->id_toko }}">

        <label>Harga</label>
        <input type="number" name="harga" class="form-control"
            required value="{{ old('harga') }}">

        <label>Stok</label>
        <input type="number" name="stok" class="form-control"
            required value="{{ old('stok') }}">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>

        <label>Gambar Produk (bisa lebih dari 1)</label>
        <input type="file" name="gambar[]" class="form-control" multiple>

        <button type="submit" class="btn-submit">Simpan Produk</button>
        <a href="{{ route('member.produk') }}" class="btn-back">Kembali</a>
    </form>

</div>

@endsection
