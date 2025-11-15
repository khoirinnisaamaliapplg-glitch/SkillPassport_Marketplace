@extends('admin.template')

@section('title', 'Data User')

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
    <h1>Data User</h1>
</div>

<div class="table-container">

    <button class="btn-add">+ Tambah User</button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Budi Santoso</td>
                <td>08123456789</td>
                <td>budi123</td>
                <td>admin</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Ani Lestari</td>
                <td>08987654321</td>
                <td>ani_l</td>
                <td>member</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Santo Pratama</td>
                <td>082233445566</td>
                <td>santo_p</td>
                <td>member</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

@endsection
