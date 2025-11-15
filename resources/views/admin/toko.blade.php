@extends('admin.template')

@section('title', 'Data Toko')

@section('content')

<style>
    .header-custom {
        background: #102863;
        padding: 20px;
        border-radius: 10px;
        color: white;
        margin-bottom: 25px;
        text-align: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.2);
    }

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        border-left: 10px solid #2cce75;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    thead {
        background: #0f2f63;
        color: white;
    }

    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    tbody tr:hover {
        background: #81ef59;
        transition: 0.2s;
    }

    .btn-add {
        background: #2cce75;
        border: none;
        padding: 10px 20px;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-edit {
        background: #102863;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .btn-delete {
        background: #d93030;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

</style>

<div class="header-custom">
    <h1>Data Toko</h1>
</div>

<div class="table-container">

    <button class="btn-add">+ Tambah Toko</button>

    <table>
        <thead>
            <tr>
                <th>ID Toko</th>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>ID User</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Toko Sumber Rejeki</td>
                <td>Menjual sembako dan kebutuhan harian.</td>
                <td>toko1.jpg</td>
                <td>08123456789</td>
                <td>Jl. Melati No. 12</td>
                <td>5</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Toko Maju Jaya</td>
                <td>Toko alat tulis, buku, dan perlengkapan sekolah.</td>
                <td>toko2.jpg</td>
                <td>082233445566</td>
                <td>Jl. Anggrek No. 45</td>
                <td>8</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Fresh Mart</td>
                <td>Sayur dan buah segar setiap hari.</td>
                <td>freshmart.png</td>
                <td>08777123456</td>
                <td>Jl. Mawar No. 9</td>
                <td>3</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

@endsection
