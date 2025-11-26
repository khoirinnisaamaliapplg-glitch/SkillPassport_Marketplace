@extends('member.template')

@section('title', '')

@section('content')

<style>
    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #102863;
        margin-bottom: 25px;
    }

    .alert-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 600;
        margin-bottom: 20px;
        animation: fadeSlide 0.4s ease;
    }

    .success-alert {
        background: #2cce75;
        color: #fff;
        border-left: 6px solid #1e9e5a;
    }

    .error-alert {
        background: #d93030;
        color: #fff;
        border-left: 6px solid #a32323;
    }

    .alert-icon {
        font-size: 18px;
    }

    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .toko-card {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-bottom: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .toko-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .toko-header {
        background: linear-gradient(90deg, #2cce75, #25b864);
        color: #fff;
        font-weight: 700;
        font-size: 18px;
        padding: 15px 20px;
    }

    .toko-body {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        gap: 15px;
        align-items: center;
    }

    .toko-body img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .toko-info {
        flex: 1;
        min-width: 200px;
    }

    .toko-info p {
        margin: 5px 0;
        font-size: 15px;
        color: #0f2f63;
    }

    .toko-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .btn-edit {
        background: #102863;
        color: #fff;
        padding: 8px 18px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-edit:hover {
        background: #0f2f63;
        transform: scale(1.05);
    }

    .btn-create {
        background: linear-gradient(90deg, #2cce75, #25b864);
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
        margin-top: 15px;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        background: linear-gradient(90deg, #25b864, #20a854);
    }

    @media (max-width: 768px) {
        .toko-body {
            flex-direction: column;
            align-items: flex-start;
        }

        .toko-body img {
            width: 100%;
            height: auto;
        }

        .toko-info {
            width: 100%;
        }
    }
</style>

<div class="page-title">Toko Saya</div>

@if(session('success'))
    <div class="alert-box success-alert">
        <span class="alert-icon">✔</span>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-box error-alert">
        <span class="alert-icon">⚠</span>
        {{ session('error') }}
    </div>
@endif

@if($toko)
<div class="toko-card">
    <div class="toko-header">{{ $toko->nama_toko }}</div>
    <div class="toko-body">
        <img src="{{ $toko->gambar ? asset('storage/toko/'.$toko->gambar) : 'https://via.placeholder.com/120' }}" alt="Foto Toko">
        <div class="toko-info">
            <p><strong>Deskripsi:</strong> {{ $toko->deskripsi ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $toko->alamat ?? '-' }}</p>
            <p><strong>Kontak:</strong> {{ $toko->kontak_toko ?? '-' }}</p>

            <div class="toko-actions">
                <a href="{{ route('member.toko.edit', $toko->id_toko) }}">
                    <button class="btn-edit">Edit Toko</button>
                </a>
            </div>
        </div>
    </div>
</div>
@else
<p>Anda belum memiliki toko.</p>
<a href="{{ route('member.toko.create') }}" class="btn-create">Buat Toko</a>
@endif

@endsection
