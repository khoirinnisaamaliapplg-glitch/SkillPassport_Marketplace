@extends('member.template')

@section('title', 'Daftar Produk')

@section('content')

<style>
    .produk-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 5px;
    }

    .page-title {
        font-weight: 700;
        color: #0f2f63;
        font-size: 28px;
    }

    .btn-tambah {
        background: linear-gradient(90deg, #81ef59, #2cce75);
        padding: 10px 22px;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        color: #0f2f63;
        font-size: 15px;
        transition: 0.3s;
    }

    .btn-tambah:hover {
        opacity: .85;
        transform: translateY(-2px);
    }

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
    }

    .btn-action {
        padding: 7px 14px;
        border-radius: 8px;
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
        background-color: #e60000;
    }

</style>

<div class="produk-header">
    <h2 class="page-title">Daftar Produk</h2>
    <button class="btn-tambah"><i class="fa fa-plus me-2"></i>Tambah Produk</button>
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
            <tr>
                <td>1</td>
                <td>
                    <img src="https://via.placeholder.com/70" class="produk-img">
                </td>
                <td class="fw-semibold">Keripik Pedas</td>
                <td>Rp 15.000</td>
                <td>20</td>
                <td>Toko Mawar</td>
                <td>
                    <button class="btn-action btn-edit me-2">Edit</button>
                    <button class="btn-action btn-hapus">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>
                    <img src="https://via.placeholder.com/70" class="produk-img">
                </td>
                <td class="fw-semibold">Kue Kering Coklat</td>
                <td>Rp 25.000</td>
                <td>15</td>
                <td>Toko Selaras</td>
                <td>
                    <button class="btn-action btn-edit me-2">Edit</button>
                    <button class="btn-action btn-hapus">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>
                    <img src="https://via.placeholder.com/70" class="produk-img">
                </td>
                <td class="fw-semibold">Bolu Pandan</td>
                <td>Rp 30.000</td>
                <td>8</td>
                <td>Toko Sari Rasa</td>
                <td>
                    <button class="btn-action btn-edit me-2">Edit</button>
                    <button class="btn-action btn-hapus">Hapus</button>
                </td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
