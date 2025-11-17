@extends('member.template')

@section('title', 'Toko Saya')

@section('content')

<style>
    .table-card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-left: 10px solid #2cce75;
        margin-top: 20px;
    }

    .table-card h2 {
        color: #102863;
        font-weight: 700;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #2cce75;
        color: #fff;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
        background: #e8f8ef;
        transition: 0.2s;
    }

    .btn-edit {
        background: #102863;
        color: #fff;
        padding: 5px 10px;
        border-radius: 6px;
        border: none;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-edit:hover {
        background: #0f2f63;
    }

    .btn-create {
        background: #2cce75;
        color: #fff;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 600;
        margin-top: 10px;
        display: inline-block;
        text-decoration: none;
    }

    .btn-create:hover {
        background: #25b864;
        text-decoration: none;
        color: #fff;
    }

    @media (max-width: 576px) {
        th, td {
            font-size: 14px;
            padding: 8px 10px;
        }
    }
</style>

<div class="table-card">
    <h2>Toko Saya</h2>

    @if($toko)
        <table>
            <thead>
                <tr>
                    <th>Nama Toko</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $toko->nama_toko }}</td>
                    <td>{{ $toko->deskripsi ?? '-' }}</td>
                    <td>{{ $toko->alamat ?? '-' }}</td>
                    <td>{{ $toko->kontak_toko ?? '-' }}</td>
                    <td>
                        <a href="{{ route('member.toko.edit', $toko->id_toko) }}">
                            <button class="btn-edit">Edit</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Anda belum memiliki toko.</p>
        <a href="{{ route('member.toko.create') }}" class="btn-create">Buat Toko</a>
    @endif
</div>

@endsection
