@extends('admin.template')

@section('title', '')

@section('content')

<style>
    
    .page-header {
        background: linear-gradient(135deg, #102863, #1b3a8a);
        padding: 25px;
        border-radius: 12px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        text-align: center;
    }

    .page-header h1 {
        font-size: 26px;
        margin-bottom: 5px;
        font-weight: 700;
    }

    
    .content-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.07);
        border: 1px solid #e8e8e8;
    }

    
    .top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .btn-primary-custom {
        background: #2cce75;
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        font-weight: 600;
        border: none;
        transition: .2s;
    }

    .btn-primary-custom:hover {
        background: #24b666;
    }

    .search-box {
        display: flex;
        gap: 10px;
        width: 100%;
        max-width: 350px;
    }

    .search-box input {
        border-radius: 8px;
    }


    .table-custom {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-custom thead {
        background: #0f2f63;
        color: white;
    }

    .table-custom th {
        padding: 14px;
        font-weight: 600;
        font-size: 14px;
        text-align: center;
        border-bottom: 2px solid #2cce75;
    }

    .table-custom td {
        padding: 12px;
        background: #fff;
        border-bottom: 1px solid #e6e6e6;
        vertical-align: middle;
        text-align: center;
    }

    .table-custom tbody tr:hover td {
        background: #f3ffef;
        transition: .2s;
    }

  
    .produk-img {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #2cce75;
        margin: 2px;
        transition: .2s;
    }

    .produk-img:hover {
        transform: scale(1.05);
    }

   
    @media (max-width: 768px) {
        .search-box {
            width: 100%;
        }

        .table-custom th,
        .table-custom td {
            font-size: 12px;
            padding: 8px;
        }
    }
</style>

<div class="page-header">
    <h1>Data Produk</h1>
    <p>Manajemen produk toko yang terdaftar</p>
</div>

<div class="content-card">

    <div class="top-actions">
        
        <form method="GET" action="{{ route('admin.produk') }}" class="search-box">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari produk..." value="{{ request('search') }}">
            <button class="btn-primary-custom">Cari</button>
        </form>

        
    </div>

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Toko</th>
                    <th>Kategori</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produks as $i => $p)
                <tr>
                    <td>{{ $i + 1 }}</td>

                    <td>
                        @if($p->gambars->isNotEmpty())
                            @foreach ($p->gambars as $g)
                                <img src="{{ asset('uploads/produk/' . $g->nama_gambar) }}"
                                     class="produk-img">
                            @endforeach
                        @else
                            <img src="https://via.placeholder.com/70" class="produk-img">
                        @endif
                    </td>

                    <td>{{ $p->nama_produk }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>{{ $p->toko->nama_toko ?? '-' }}</td>
                    <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-3">Tidak ada produk.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection
