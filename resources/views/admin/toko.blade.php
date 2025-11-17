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

    

    <table>
        <thead>
    <tr>
        <th>ID Toko</th>
        <th>Nama Toko</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Nama Member</th> <!-- ganti dari ID User -->
        {{-- <th>Aksi</th> --}}
    </tr>
</thead>

<tbody>
    @foreach($tokos as $toko)
    <tr>
        <td>{{ $toko->id_toko }}</td>
        <td>{{ $toko->nama_toko }}</td>
        <td>{{ $toko->deskripsi }}</td>
        <td>{{ $toko->gambar }}</td>
        <td>{{ $toko->kontak_toko }}</td>
        <td>{{ $toko->alamat }}</td>
        <td>{{ $toko->user->nama }}</td> <!-- tampilkan nama member -->
        {{-- <td>
            <a href="{{ route('admin.toko.edit', $toko->id_toko) }}" class="btn-edit">Edit</a>
            <form action="{{ route('admin.toko.destroy', $toko->id_toko) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</tbody>

    </table>

</div>

@endsection
