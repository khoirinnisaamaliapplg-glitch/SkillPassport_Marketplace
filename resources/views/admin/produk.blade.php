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

<div class="produk-container">
    <table class="table table-hover table-bordered produk-table align-middle">
        <thead>
            <tr class="text-center">
                <th style="width: 50px">No</th>
                <th style="width: 100px">Gambar</th>
                <th>Nama Produk</th>
                <th style="width: 150px">Harga</th>
                <th style="width: 100px">Stok</th>
                <th style="width: 180px">Toko</th>
            </tr>
        </thead>

        <tbody class="text-center">
            @foreach($produks as $index => $produk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($produk->gambars->isNotEmpty())
                        @foreach($produk->gambars as $gambar)
                            <img src="{{ asset('storage/produk/' . $gambar->nama_gambar) }}" class="produk-img">
                        @endforeach
                    @else
                        <img src="https://via.placeholder.com/70" class="produk-img">
                    @endif
                </td>
                <td>{{ $produk->nama_produk }}</td>
                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->toko->nama_toko ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
