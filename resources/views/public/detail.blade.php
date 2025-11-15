@extends('public.template')

@section('title', 'Detail Produk - Nasi Goreng')

@section('content')

<style>
  .product-title {
    font-size: 28px;
    font-weight: 800;
    color: #0f2f63;
  }
  .product-price {
    font-size: 24px;
    font-weight: 700;
    color: #2cce75;
  }
  .btn-wa {
    background: #2cce75;
    border: none;
    color: white;
    font-weight: 600;
  }
  .btn-wa:hover {
    background: #25b767;
  }
  .badge-kategori {
    background: #0f2f63;
  }
  .product-image {
    border-radius: 14px;
    width: 100%;
    height: 380px;
    object-fit: cover;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
  }
  .info-box {
    border-radius: 14px;
    background: #f8f9fa;
    padding: 18px;
  }
  .judul-section {
    font-size: 20px;
    font-weight: 700;
    color: #0f2f63;
  }
</style>

<div class="container py-5">

  <!-- PRODUK UTAMA -->
  <div class="row">

    <!-- FOTO -->
    <div class="col-md-5 mb-4">
      <img src="/image/nasgor.jpg" class="product-image">
    </div>

    <!-- DETAIL -->
    <div class="col-md-7">

      <h1 class="product-title mb-2">Nasi Goreng Spesial</h1>

      <span class="badge badge-kategori py-2 px-3 mb-3">Makanan</span>

      <h3 class="product-price mt-3 mb-3">
        Rp 20.000
      </h3>

      <p class="text-muted" style="font-size: 15px;">
        Nasi goreng spesial dengan campuran telur, ayam suwir, sayuran segar, dan bumbu rahasia.
        Cocok untuk makan siang, makan malam, atau bekal siswa!
      </p>

      <div class="info-box mt-4">
        <p class="mb-1"><strong>Toko:</strong> Toko Makanan Lezat</p>
        <p class="mb-1"><strong>Lokasi:</strong> Kantin Tengah</p>
        <p class="mb-0"><strong>Jam Buka:</strong> 09.00 - 15.00</p>
      </div>

      <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20beli%20Nasi%20Goreng%20Spesial"
         class="btn btn-wa btn-lg rounded-pill mt-4 px-4">
        <i class="fa-brands fa-whatsapp me-2"></i> Beli Lewat WhatsApp
      </a>

    </div>
  </div>

  <!-- DESKRIPSI -->
  <div class="mt-5">
    <h4 class="judul-section mb-3">Deskripsi Produk</h4>
    <p class="text-muted">
      Nasi Goreng Spesial dibuat menggunakan bahan berkualitas dengan rasa gurih khas.
      Setiap porsi dimasak langsung oleh siswa tata boga sehingga fresh dan hangat.
      Sangat cocok sebagai hidangan favorit anak sekolah.
    </p>
  </div>

</div>

@endsection
