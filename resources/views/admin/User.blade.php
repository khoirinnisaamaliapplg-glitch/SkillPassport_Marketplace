@extends('admin.template')

@section('title', '')

@section('content')

<style>

    .header-custom {
        background: linear-gradient(135deg, #0f2f63, #143b85);
        padding: 26px;
        border-radius: 14px;
        color: white;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 5px 18px rgba(0,0,0,0.18);
    }

    .header-custom h1 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        letter-spacing: .5px;
    }

 
    .table-container {
        background: #fff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 6px 22px rgba(0,0,0,0.08);
        border: 1px solid #e5e8ee;
    }


    .btn-add {
        background: #0f2f63;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.25s ease;
        margin-bottom: 18px;
    }

    .btn-add:hover {
        background: #12387a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-edit {
        background: #1b5fbf;
        border: none;
        padding: 7px 14px;
        color: white;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #164fa0;
    }

    .btn-delete {
        background: #d64545;
        border: none;
        padding: 7px 14px;
        color: white;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #bb3737;
    }


    .table-responsive-custom {
        width: 100%;
        overflow-x: auto;
    }

    .table-custom {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
        font-size: 14.2px;
    }

    .table-custom thead tr {
        background: #f5f7fa;
        border-bottom: 2px solid #e5e7ec;
    }

    .table-custom th {
        padding: 14px;
        font-weight: 700;
        color: #0f2f63;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: .5px;
    }

    .table-custom td {
        padding: 13px 14px;
        border-bottom: 1px solid #eaecee;
        color: #333;
        font-weight: 500;
    }

    .table-custom tbody tr:hover {
        background: #eef4ff;
    }

 
    .alert-box {
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 18px;
        font-size: 15px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fadeSlide 0.5s ease;
    }

    .success-alert {
        background: #e6f7ed;
        color: #108d4d;
        border-left: 6px solid #108d4d;
    }

    .error-alert {
        background: #fdeaea;
        color: #ba2f2f;
        border-left: 6px solid #b32727;
    }
    .action-buttons {
    display: flex;
    align-items: center;
    gap: 10px;  
    }


    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }


    @media (max-width: 768px) {
        .btn-add {
            width: 100%;
        }
        .table-custom th,
        .table-custom td {
            padding: 10px;
            font-size: 13px;
        }
    }

</style>

<div class="header-custom">
    <h1>Data User</h1>
</div>


{{-- SUCCESS NOTIF --}}
@if (session('success'))
    <div class="alert-box success-alert">
        ✔ {{ session('success') }}
    </div>
@endif

{{-- ERROR NOTIF --}}
@if (session('error'))
    <div class="alert-box error-alert">
        ⚠ {{ session('error') }}
    </div>
@endif


<div class="table-container">

    <a href="{{ route('admin.User-create') }}">
        <button class="btn-add">+ Tambah User</button>
    </a>

    <div class="table-responsive-custom">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th style="width: 130px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id_user }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->kontak ?? '-' }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->role }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.User-edit', $u->id_user) }}">
                            <button class="btn-edit">Edit</button>
                        </a>

                        <form action="{{ route('admin.User.destroy', $u->id_user) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>


                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
