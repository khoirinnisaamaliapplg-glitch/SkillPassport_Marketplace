@extends('admin.template')

@section('title', '')

@section('content')

<style>

  
    body {
        font-family: 'Inter', sans-serif;
    }

    
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

  
    .alert-box {
        padding: 14px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid transparent;
        animation: fadeSlide 0.3s ease;
    }

    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .success-alert {
        background: #f0fdf4;
        color: #15803d;
        border-color: #bbf7d0;
    }

    .error-alert {
        background: #fef2f2;
        color: #b91c1c;
        border-color: #fecaca;
    }

    .alert-icon {
        font-size: 18px;
    }

    
    .table-container {
        background: white;
        padding: 25px;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    
    .btn-add {
        background: #0f2f63;
        border: none;
        padding: 10px 18px;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        transition: .25s;
        text-decoration: none;
    }

    .btn-add:hover {
        background: #0b234a;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

   
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        margin-top: 10px;
    }

    thead tr {
        background: #e8eef7;
        color: #102a5e;
        border-radius: 10px;
    }

    th {
        padding: 14px;
        font-weight: 700;
        font-size: 14px;
    }

    tbody tr {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
        transition: .25s ease;
    }

    tbody tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }

    td {
        padding: 16px;
        font-size: 14px;
        color: #374151;
    }

   
    .action-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-edit, .btn-delete {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: .25s;
    }

    .btn-edit {
        background: #e8eef7;
        color: #0f2f63;
    }

    .btn-edit:hover {
        background: #d9e4f5;
        transform: scale(1.04);
    }

    .btn-delete {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn-delete:hover {
        background: #fecaca;
        transform: scale(1.04);
    }

    .btn-icon {
        font-size: 15px;
    }

</style>

<div class="header-custom">
    <h1>Kategori Produk</h1>
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
    <a href="{{ route('admin.kategori.create') }}" class="btn-add">+ Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th style="width:180px;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id_kategori }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>
                    <div class="action-buttons">

                        <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}">
                            <button class="btn-edit">
                                <span class="btn-icon">✏</span> Edit
                            </button>
                        </a>

                        <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" 
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Yakin ingin hapus kategori ini?')">
                                <span class="btn-icon">🗑</span> Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
