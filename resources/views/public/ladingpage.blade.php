@extends('public.template')

@section('title', 'Beranda')

@section('content')

<!-- Hero Section -->
<style>
.hero-section-custom {
  height: 70vh;
  background: linear-gradient(135deg, #102863, #0f2f63, #2cce75);
  background-size: 300% 300%;
  animation: gradientMove 10s ease infinite;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}

.hero-section-custom .overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.45); /* biar teks lebih jelas */
}

@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.hero-title {
  color: #81ef59; /* Hijau neon kamu */
  text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

.hero-btn {
  background: #2cce75;
  border: none;
  color: #102863;
  font-weight: 600;
}

.hero-btn:hover {
  background: #81ef59;
  color: #0f2f63;
}
</style>

<section class="hero-section-custom text-center">
  <div class="overlay"></div>
  
  <div class="container position-relative">
    <h1 class="fw-bold display-5 mb-3 hero-title">
      Selamat Datang di Marketplace Sekolah
    </h1>

    <p class="lead mb-4">
      Temukan berbagai toko dan produk terbaik — makanan, minuman, hingga fashion!
    </p>

    <a href="/produk" class="btn btn-lg px-4 py-2 rounded-pill hero-btn shadow-sm">
      <i class="fa-solid fa-store me-2"></i> Jelajahi Sekarang
    </a>
  </div>
</section>


<!-- ======================== -->
<!-- BAGIAN TOKO -->
<!-- ======================== -->
<section id="toko" class="container py-5">
  <h2 class="text-center mb-5 text-primary">
    <i class="fa-solid fa-shop"></i> Pilihan Toko
  </h2>

  <div class="row g-4 justify-content-center">

    <div class="col-md-4 col-lg-3">
      <div class="card store-card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-utensils fa-3x text-success mb-3"></i>
          <h5 class="card-title fw-bold">Toko Makanan Lezat</h5>
          <p class="text-muted">Aneka makanan rumahan & snack kekinian.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-3">
      <div class="card store-card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-mug-hot fa-3x text-info mb-3"></i>
          <h5 class="card-title fw-bold">Toko Minuman Segar</h5>
          <p class="text-muted">Minuman dingin, kopi, dan jus buah segar.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ======================== -->
<!-- BAGIAN PRODUK -->
<!-- ======================== -->
<section id="produk" class="container py-5">
  <h3 class="mb-5 text-center text-primary">
    <i class="fa-solid fa-bag-shopping"></i> Produk Sesuai Kategori
  </h3>

  <!-- Makanan -->
  <h5 class="mb-4 text-success fw-bold">🍽️ Toko Makanan Lezat</h5>
  <div class="row g-4 mb-5">

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="/image/nasgor.jpg" class="card-img-top" alt="Nasi Goreng" />
        <div class="card-body text-center">
          <h6 class="fw-semibold">Nasi Goreng Spesial</h6>
          <p class="text-muted mb-3">Rp 20.000</p>
          <a href="#" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WA
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="/image/snack.jpg" class="card-img-top" alt="Snack" />
        <div class="card-body text-center">
          <h6 class="fw-semibold">Snack Kering</h6>
          <p class="text-muted mb-3">Rp 10.000</p>
          <a href="#" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WA
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- Minuman -->
  <h5 class="mb-4 text-success fw-bold">🥤 Toko Minuman Segar</h5>
  <div class="row g-4">

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="/image/jus.jpg" class="card-img-top" alt="Jus Buah" />
        <div class="card-body text-center">
          <h6 class="fw-semibold">Jus Buah Segar</h6>
          <p class="text-muted mb-3">Rp 12.000</p>
          <a href="#" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WA
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="/image/kopi.jpg" class="card-img-top" alt="Kopi" />
        <div class="card-body text-center">
          <h6 class="fw-semibold">Kopi Susu</h6>
          <p class="text-muted mb-3">Rp 15.000</p>
          <a href="#" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WA
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
