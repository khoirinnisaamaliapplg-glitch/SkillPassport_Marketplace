@extends('public.template')

@section('title', 'Produk')

@section('content')

<style>
  .title-page {
    font-weight: 700;
    color: #0f2f63;
  }

  .produk-card {
    border: none;
    border-radius: 14px;
    overflow: hidden;
    transition: .25s;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }

  .produk-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
  }

  .produk-card img {
    height: 180px;
    object-fit: cover;
  }

  .btn-beli {
    background: #2cce75;
    border: none;
    font-weight: 600;
    color: white;
  }

  .btn-beli:hover {
    background: #25b767;
  }

  .judul-toko {
    font-size: 20px;
    font-weight: 700;
    color: #0f2f63;
    border-left: 5px solid #2cce75;
    padding-left: 10px;
    margin-top: 50px;
  }
</style>

<div class="container py-5">

  <h2 class="text-center title-page mb-5">
    <i class="fa-solid fa-store"></i> Produk Sesuai Toko
  </h2>


  <!-- ======================================================
      TOKO 1 : Toko Makanan Lezat
  ======================================================= -->
  <h4 class="judul-toko">🍽️ Toko Makanan Lezat</h4>

  <div class="row g-4 mt-2">

    <div class="col-md-3">
    <a href="/detail" class="text-decoration-none text-dark">
    <div class="card produk-card">
      <img src="/image/nasgor.jpg" class="card-img-top">
      <div class="card-body text-center">
        <h6 class="fw-bold">Nasi Goreng Spesial</h6>
        <p class="text-muted mb-2">Rp 20.000</p>

        <div class="btn btn-beli btn-sm rounded-pill px-3">
          <i class="fa-brands fa-whatsapp me-1"></i>Beli
        </div>
      </div>
    </div>
    </a>
    </div>


    <div class="col-md-3">
      <div class="card produk-card">
        <img src="/image/snack.jpg">
        <div class="card-body text-center">
          <h6 class="fw-bold">Snack Kering</h6>
          <p class="text-muted mb-2">Rp 10.000</p>
          <a href="https://wa.me/6281234567890?text=Saya ingin beli Snack Kering"
             class="btn btn-beli btn-sm rounded-pill px-3">
            <i class="fa-brands fa-whatsapp me-1"></i>Beli
          </a>
        </div>
      </div>
    </div>

  </div>




  <!-- ======================================================
      TOKO 2 : Toko Minuman Segar
  ======================================================= -->
  <h4 class="judul-toko">🥤 Toko Minuman Segar</h4>

  <div class="row g-4 mt-2">

    <div class="col-md-3">
      <div class="card produk-card">
        <img src="/image/jus.jpg">
        <div class="card-body text-center">
          <h6 class="fw-bold">Jus Buah Segar</h6>
          <p class="text-muted mb-2">Rp 12.000</p>
          <a href="https://wa.me/6281234567890?text=Saya ingin beli Jus Buah Segar"
             class="btn btn-beli btn-sm rounded-pill px-3">
            <i class="fa-brands fa-whatsapp me-1"></i>Beli
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card produk-card">
        <img src="/image/kopi.jpg">
        <div class="card-body text-center">
          <h6 class="fw-bold">Kopi Susu</h6>
          <p class="text-muted mb-2">Rp 15.000</p>
          <a href="https://wa.me/6281234567890?text=Saya ingin beli Kopi Susu"
             class="btn btn-beli btn-sm rounded-pill px-3">
            <i class="fa-brands fa-whatsapp me-1"></i>Beli
          </a>
        </div>
      </div>
    </div>

  </div>

</div>

@endsection
