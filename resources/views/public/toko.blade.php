@extends('public.template')

@section('title', 'Daftar Toko')

@section('content')

<div class="container py-5">
  <h3 class="text-center mb-5 fw-bold text-primary">
    <i class="fa-solid fa-shop me-2"></i> Daftar Toko
  </h3>

  <div class="row g-4">

    <!-- TOKO MAKANAN -->
    <div class="col-md-3">
      <a href="/toko/makanan" class="text-decoration-none text-dark">
        <div class="card produk-card">
          <img src="/image/toko-makanan.jpg" class="card-img-top" style="height:170px; object-fit:cover;">
          <div class="card-body text-center">
            <h6 class="fw-bold">Toko Makanan Lezat</h6>
            <p class="text-muted small mb-2">Aneka makanan rumahan & snack kekinian</p>

            <button class="btn btn-beli btn-sm rounded-pill px-3">
              <i class="fa-solid fa-store me-1"></i> Kunjungi
            </button>
          </div>
        </div>
      </a>
    </div>

    <!-- TOKO MINUMAN -->
    <div class="col-md-3">
      <a href="/toko/minuman" class="text-decoration-none text-dark">
        <div class="card produk-card">
          <img src="/image/toko-minuman.jpg" class="card-img-top" style="height:170px; object-fit:cover;">
          <div class="card-body text-center">
            <h6 class="fw-bold">Toko Minuman Segar</h6>
            <p class="text-muted small mb-2">Minuman dingin, kopi, & jus segar</p>

            <button class="btn btn-beli btn-sm rounded-pill px-3">
              <i class="fa-solid fa-store me-1"></i> Kunjungi
            </button>
          </div>
        </div>
      </a>
    </div>

    <!-- TOKO FASHION -->
    <div class="col-md-3">
      <a href="/toko/fashion" class="text-decoration-none text-dark">
        <div class="card produk-card">
          <img src="/image/toko-fashion.jpg" class="card-img-top" style="height:170px; object-fit:cover;">
          <div class="card-body text-center">
            <h6 class="fw-bold">Toko Fashion</h6>
            <p class="text-muted small mb-2">Aksesoris, pakaian, & perlengkapan keren</p>

            <button class="btn btn-beli btn-sm rounded-pill px-3">
              <i class="fa-solid fa-store me-1"></i> Kunjungi
            </button>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>

@endsection
