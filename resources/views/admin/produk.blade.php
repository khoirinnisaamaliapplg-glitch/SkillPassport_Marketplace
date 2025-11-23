@extends('admin.template')

@section('title', 'Daftar Produk')

@section('content')

<style>
    .produk-container {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        margin-top: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    .produk-table thead {
        background: #102863;
        color: #fff;
    }
    .produk-table tbody tr:hover {
        background: rgba(44, 206, 117, 0.07);
        transition: 0.3s;
    }
    .produk-img {
        border-radius: 12px;
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #2cce75;
        margin-bottom: 3px;
    }
</style>

<h2 class="mb-4">Daftar Produk</h2>

<!-- Form Filter & Search -->

<div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('admin.produk') }}" class="d-flex gap-2">
        <select name="kategori_id" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-success">Filter</button>
    </form>
</div>

<div class="produk-container">
    <table class="table table-hover table-bordered produk-table align-middle">
        <thead>
            <tr class="text-center">
                <th style="width: 50px">No</th>
                <th style="width: 120px">Gambar</th>
                <th>Nama Produk</th>
                <th style="width: 150px">Harga</th>
                <th style="width: 100px">Stok</th>
                <th style="width: 180px">Toko</th>
                <th style="width: 150px">Kategori</th>
            </tr>
        </thead>


    <tbody class="text-center">
        @forelse($produks as $index => $produk)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($produk->gambars->isNotEmpty())
                    @foreach ($produk->gambars as $gambar)
                        <img src="{{ asset('uploads/produk/' . $gambar->nama_gambar) }}" 
                            alt="gambar produk"
                            class="produk-img">
                    @endforeach
                @else
                    <img src="https://via.placeholder.com/70" class="produk-img">
                @endif
            </td>
            <td>{{ $produk->nama_produk }}</td>
            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->toko->nama_toko ?? '-' }}</td>
            <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Tidak ada produk.</td>
        </tr>
        @endforelse
    </tbody>
</table>


</div>

@endsection
