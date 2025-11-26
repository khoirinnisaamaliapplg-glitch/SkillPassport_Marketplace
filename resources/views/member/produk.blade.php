@extends('member.template')

@section('title', '')

@section('content')

<style>
    .header-custom {
        background: linear-gradient(90deg, #0f2f63, #102863);
        padding: 22px;
        border-radius: 12px;
        color: white;
        margin-bottom: 28px;
        text-align: center;
        font-weight: 700;
        letter-spacing: .5px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }


    .table-container {
        background: #ffffff;
        padding: 22px;
        border-radius: 15px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        
    }


    .btn-add {
        background: linear-gradient(90deg, #2cce75, #81ef59);
        color: #0f2f63;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        cursor: pointer;
        transition: 0.25s;
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        opacity: .9;
    }


    .table-responsive-custom {
        width: 100%;
        overflow-x: auto;
        border-radius: 12px;
    }

    .table-custom {
        width: 100%;
        min-width: 900px;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-custom thead th {
        background: #0f2f63;
        color: white;
        padding: 14px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .table-custom tbody tr {
        background: #ffffff;
        transition: 0.25s;
    }

    .table-custom tbody tr:hover {
        background: rgba(44, 206, 117, 0.12);
    }

    .table-custom td {
        padding: 14px;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
        color: #333;
    }

   
    .produk-img {
        border-radius: 10px;
        width: 65px;
        height: 65px;
        object-fit: cover;
        border: 2px solid #2cce75;
        margin: 2px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.12);
    }

  
    .btn-action {
        padding: 7px 14px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        border: none;
        transition: 0.25s;
    }

    .btn-edit {
        background-color: #2cce75;
        color: white;
    }

    .btn-edit:hover {
        background-color: #1fae62;
    }

    .btn-hapus {
        background-color: #ff4d4d;
        color: #fff;
    }

    .btn-hapus:hover {
        background-color: #c90000;
    }
    .alert-box {
        padding: 12px 18px;
        border-radius: 10px;
        margin-bottom: 15px;
        font-size: 15px;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fadeSlide 0.5s ease;
    }

    .success-alert {
        background: #2cce75;
        color: white;
        border-left: 8px solid #1e9e5a;
    }

    .error-alert {
        background: #d93030;
        color: white;
        border-left: 8px solid #a32323;
    }

    .alert-icon {
        font-size: 20px;
    }

    @media (max-width: 768px) {
        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .table-custom td, 
        .table-custom th {
            font-size: 12px;
            padding: 10px;
        }

        .produk-img {
            width: 55px;
            height: 55px;
        }
    }
</style>

<div class="header-custom">
    <h2>Daftar Produk</h2>
</div>
@if (session('success'))
    <div class="alert-box success-alert">
        <span class="alert-icon">✔</span>
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div class="alert-box error-alert">
        <span class="alert-icon">⚠</span>
        {{ session('error') }}
    </div>
@endif

<div class="table-container">

    <a href="{{ route('member.produk.create') }}" class="btn-add">
        <i class="fa fa-plus"></i> Tambah Produk
    </a>

    <div class="table-responsive-custom">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Toko</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($produks as $i => $produk)
                <tr>
                    <td>{{ $i + 1 }}</td>

                    <td>
                        @if($produk->gambars->isNotEmpty())
                            @foreach ($produk->gambars as $g)
                                <img src="{{ asset('uploads/produk/' . $g->nama_gambar) }}" class="produk-img">
                            @endforeach
                        @else
                            <img src="https://via.placeholder.com/70" class="produk-img">
                        @endif
                    </td>

                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>{{ $produk->toko->nama_toko ?? '-' }}</td>

                    <td>
                        <a href="{{ route('member.produk.edit', $produk->id_produk) }}"
                           class="btn-action btn-edit me-2">Edit</a>

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

</div>

@endsection
