@extends('admin.template')

@section('title', '')

@section('content')

<style>
    
    .header-custom {
        background: linear-gradient(135deg, #102863, #1b3a8a);
        padding: 25px;
        border-radius: 12px;
        color: white;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .header-custom h1 {
        font-size: 26px;
        font-weight: 700;
        margin: 0;
    }

    
    .table-container {
        background: #ffffff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        border: 1px solid #e6e9f0;
    }

   
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 12px;
    }

    thead {
        background: #102863;
        color: white;
    }

    thead th {
        padding: 14px;
        font-size: 14px;
        font-weight: 600;
        border-bottom: 2px solid #2cce75;
        text-align: center;
        letter-spacing: 0.3px;
    }

    tbody td {
        padding: 12px;
        border-bottom: 1px solid #e9e9e9;
        vertical-align: middle;
        text-align: center;
        font-size: 14px;
    }

    tbody tr:hover td {
        background: #f4fff2;
        transition: .25s;
    }

   
    .img-toko {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #2cce75;
        transition: .2s;
    }

    .img-toko:hover {
        transform: scale(1.08);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

   
    .btn-edit {
        background: #102863;
        color: white;
        padding: 7px 14px;
        border-radius: 6px;
        border: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-edit:hover {
        background: #0c1f51;
    }

    .btn-delete {
        background: #d93030;
        color: white;
        padding: 7px 14px;
        border-radius: 6px;
        border: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-delete:hover {
        background: #bb2626;
    }

  
    @media (max-width: 768px) {
        thead th, tbody td {
            font-size: 12px;
            padding: 8px;
        }

        .img-toko {
            width: 55px;
            height: 55px;
        }
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
                <th>Nama Member</th>
               
            </tr>
        </thead>

        <tbody>
            @foreach($tokos as $toko)
            <tr>
                <td>{{ $toko->id_toko }}</td>
                <td>{{ $toko->nama_toko }}</td>
                <td>{{ $toko->deskripsi }}</td>

                <td>
                    @if($toko->gambar)
                        <img src="{{ asset('storage/toko/' . $toko->gambar) }}"
                             class="img-toko">
                    @else
                        <img src="https://via.placeholder.com/70"
                             class="img-toko">
                    @endif
                </td>

                <td>{{ $toko->kontak_toko }}</td>
                <td>{{ $toko->alamat }}</td>
                <td>{{ $toko->user->nama }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
