@extends('member.template')

@section('title', 'Profil Saya')

@section('content')

<style>
    .profile-container {
        background: #fff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        max-width: 850px;
        margin: 0 auto;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    .profile-header h3 {
        font-weight: 700;
        color: #0f2f63;
    }

    .edit-btn {
        position: absolute;
        right: 0;
        top: 0;
        background: #2cce75;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 600;
        text-decoration: none;
    }

    .edit-btn:hover {
        background: #27b868;
    }

    .info-box {
        background: #f7f9fc;
        padding: 18px 20px;
        border-left: 6px solid #2cce75;
        border-radius: 12px;
        margin-bottom: 18px;
    }

    .info-title {
        font-weight: 700;
        color: #102863;
        margin-bottom: 5px;
    }

    .info-text {
        color: #0f2f63;
        font-size: 15px;
    }
</style>

<div class="profile-container">
    
    <!-- HEADER -->
    <div class="profile-header">

        <a href="/member/profil/edit" class="edit-btn">Edit Profil</a>

        <h3>{{ $user->nama }}</h3>
        <p class="text-muted">Member Marketplace</p>
    </div>

    <!-- INFORMASI -->
    <div class="info-box">
        <div class="info-title">Nama Lengkap</div>
        <div class="info-text">{{ $user->nama }}</div>
    </div>

    <div class="info-box">
        <div class="info-title">Username</div>
        <div class="info-text">{{ $user->username }}</div>
    </div>

    <div class="info-box">
        <div class="info-title">Kontak</div>
        <div class="info-text">
            {{ $user->kontak ? $user->kontak : '-' }}
        </div>
    </div>

    <div class="info-box">
        <div class="info-title">Alamat</div>
        <div class="info-text">
            {{ $user->alamat ? $user->alamat : '-' }}
        </div>
    </div>

</div>

@endsection
