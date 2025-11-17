@extends('member.template')

@section('title', 'Daftar Produk')

@section('content')

<style>
    /* HEADER */
    .produk-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 10px;
        background: linear-gradient(90deg, #102863, #15408a);
        border-radius: 12px;
        color: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .page-title {
        font-weight: 700;
        font-size: 28px;
        margin: 0;
    }

    /* BUTTON TAMBAH */
    .btn-tambah {
        background: linear-gradient(90deg, #81ef59, #2cce75);
        padding: 11px 25px;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        color: #08305a;
        font-size: 15px;
        transition: 0.3s ease;
    }
    .btn-tambah:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 14px rgba(0,0,0,0.2);
    }

    /* CARD TABLE */
    .produk-container {
        background: #ffffff;
        border-radius: 18px;
        padding: 25px;
        margin-top: 25px;
        box-shadow: 0 6px 22px rgba(0,0,0,0.12);
        border-left: 10px solid #2cce75;
    }

    /* TABLE */
    .produk-table thead {
        background: #102863;
        color: white;
        font-size: 15px;
    }
    .produk-table tbody tr {
        transition: 0.25s;
    }
    .produk-table tbody tr:hover {
        background: rgba(44, 206, 117, 0.08);
        transform: scale(1.01);
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    /* IMAGE */
    .produk-img {
        border-radius: 10px;
        width: 75px;
        height: 75px;
        object-fit: cover;
        border: 3px solid #2cce75;
        transition: 0.25s;
    }
    .produk-img:hover {
        transform: scale(1.1);
        border-color: #81ef59;
    }

    /* BUTTON ACTION */
    .btn-action {
        padding: 7px 14px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        border: none;
        transition: 0.25s;
    }
    .btn-edit {
        background: linear-gradient(90deg, #2cce75, #1fae62);
        color: white;
    }
    .btn-edit:hover {
        box-shadow: 0 3px 12px rgba(31,174,98,0.5);
    }
    .btn-hapus {
        background: linear-gradient(90deg, #ff4d4d, #e60000);
        color: white;
    }
    .btn-hapus:hover {
        box-shadow: 0 3px 12px rgba(230,0,0,0.5);
    }
</style>

<div class="produk-header">
    <h2 class="page-title">Daftar Produk</h2>
    <a href="{{ route('member.produk.create') }}" class="btn-tambah">
        <i class="fa fa-plus me-2"></i>Tambah Produk
    </a>
</div>

<div class="produk-container">
    <table class="table table-hover table-bordered produk-table align-middle">
        <thead>
            <tr class="text-center">
                <th style="width: 60px">No</th>
                <th style="width: 100px">Gambar</th>
                <th>Nama Produk</th>
                <th style="width: 150px">Harga</th>
                <th style="width: 100px">Stok</th>
                <th style="width: 180px">Toko</th>
                <th style="width: 150px">Aksi</th>
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
            <td>Rp {{ number_format($produk->harga,0,',','.') }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->toko->nama_toko ?? '-' }}</td>

            <td>
                <a href="{{ route('member.produk.edit', $produk->id_produk) }}" 
                   class="btn-action btn-edit me-1">Edit</a>

                <form action="{{ route('member.produk.destroy', $produk->id_produk) }}" 
                      method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-hapus"
                        onclick="return confirm('Yakin ingin hapus produk ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>

@endsection
