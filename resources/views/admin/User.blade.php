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
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    border: none;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

.btn-add:hover {
    background: #24b666;
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

   <a href="{{ route('admin.User-create') }}">
    <button class="btn-add">+ Tambah User</button>
</a>

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
            @foreach ($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->kontak ?? '-' }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="{{ route('admin.User-edit', $u->id_user) }}">
    <button class="btn-edit">Edit</button>
</a>

<form action="{{ route('admin.User.destroy', $u->id_user) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn-delete" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
