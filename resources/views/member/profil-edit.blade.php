@extends('member.template')

@section('title', 'Edit Profil')

@section('content')

<style>
    .form-container {
        background: #fff;
        padding: 25px;
        border-radius: 18px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    .form-container h3 {
        font-weight: 700;
        margin-bottom: 20px;
        color: #0f2f63;
    }
    .form-control {
        border-radius: 12px;
        padding: 10px;
        margin-bottom: 12px;
    }
    .btn-save {
        background: #2cce75;
        color: white;
        padding: 10px 25px;
        border-radius: 10px;
        border: none;
        font-weight: bold;
    }
    .btn-back {
        background: gray;
        color: white;
        padding: 10px 25px;
        border-radius: 10px;
        margin-left: 10px;
        border: none;
    }
</style>

<div class="form-container">

    <h3>Edit Profil</h3>

    <form action="{{ route('member.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>

        <label>Username</label>
        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>

        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control" value="{{ $user->kontak }}">

        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea>

        <label>Foto Profil</label>
        <input type="file" name="foto" class="form-control">

        <button class="btn-save">Simpan</button>
        <a href="{{ route('member.profil') }}" class="btn-back">Batal</a>
    </form>

</div>

@endsection
