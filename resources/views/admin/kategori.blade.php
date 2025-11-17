@extends('admin.template')

@section('title', 'Kategori Produk')

@section('content')

<style>
.table-container {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-left: 10px solid #2cce75;
    margin-top: 20px;
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
    display: inline-block;
    text-decoration: none;
}

.btn-add:hover { background: #25b864; text-decoration: none; color:white; }

table { width: 100%; border-collapse: collapse; margin-top: 15px; }
thead { background: #0f2f63; color: white; }
th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
tbody tr:hover { background: #81ef59; transition: 0.2s; }

.btn-edit { background: #102863; color: white; padding: 6px 12px; border-radius: 6px; border: none; cursor: pointer; margin-right:5px;}
.btn-edit:hover { background: #0f2f63; }
.btn-delete { background: #d93030; color: white; padding: 6px 12px; border-radius: 6px; border: none; cursor: pointer; }
.btn-delete:hover { background: #b82a2a; }
</style>

<div class="table-container">
    <a href="{{ route('admin.kategori.create') }}" class="btn-add">+ Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id_kategori }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>
                    <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}"><button class="btn-edit">Edit</button></a>
                    <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin hapus kategori ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
