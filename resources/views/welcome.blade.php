<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marketplace Publik</title>

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
        <img src="image/lgmarket.png" alt="Logo" width="40" class="me-2">
        Marketplace Sekolah
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto fw-semibold align-items-center">
    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
    <li class="nav-item"><a class="nav-link" href="#toko">Toko</a></li>
    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

    <!-- Tombol Auth -->
    <li class="nav-item ms-3">
      <a href="/login" class="btn btn-outline-light btn-sm px-3 rounded-pill fw-semibold">
        <i class="fa-solid fa-right-to-bracket me-1"></i> Login
      </a>
    </li>
    <li class="nav-item ms-2">
      <a href="/registrasi" class="btn btn-success btn-sm px-3 rounded-pill fw-semibold">
        <i class="fa-solid fa-user-plus me-1"></i> Register
      </a>
    </li>
  </ul>
</div>

    </div>
  </nav>

 <!-- Hero Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-white text-center">
  <div class="overlay"></div>
  <div class="container position-relative">
    <h1 class="fw-bold display-5 mb-3 animate-fade">Selamat Datang di <span class="text-success">Marketplace Sekolah</span></h1>
    <p class="lead mb-4 animate-fade-delay">
      Temukan berbagai toko dan produk menarik — dari makanan, minuman, hingga fashion dan aksesoris!
    </p>
    <a href="#produk" class="btn btn-lg btn-success px-4 py-2 fw-semibold shadow-sm rounded-pill">
      <i class="fa-solid fa-store me-2"></i> Jelajahi Sekarang
    </a>
  </div>
</section>
<!-- Pilihan Toko -->
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
          <p class="card-text text-muted">Aneka makanan rumahan dan snack kekinian.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-3">
      <div class="card store-card text-center shadow-sm">
        <div class="card-body">
          <i class="fa-solid fa-mug-hot fa-3x text-info mb-3"></i>
          <h5 class="card-title fw-bold">Toko Minuman Segar</h5>
          <p class="card-text text-muted">Minuman dingin, kopi, dan jus buah segar.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Produk -->
<section id="produk" class="container py-5">
  <h3 class="mb-5 text-center text-primary">
    <i class="fa-solid fa-bag-shopping"></i> Produk Sesuai Kategori
  </h3>

  <!-- Makanan -->
  <h5 class="mb-4 text-success fw-bold">🍽️ Toko Makanan Lezat</h5>
  <div class="row g-4 mb-5">
    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="https://source.unsplash.com/400x300/?friedrice" class="card-img-top" alt="Nasi Goreng" />
        <div class="card-body text-center">
          <h6 class="card-title fw-semibold">Nasi Goreng Spesial</h6>
          <p class="text-muted mb-3">Rp 20.000</p>
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20beli%20Nasi%20Goreng%20Spesial" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WhatsApp
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="https://source.unsplash.com/400x300/?snack" class="card-img-top" alt="Snack" />
        <div class="card-body text-center">
          <h6 class="card-title fw-semibold">Snack Kering</h6>
          <p class="text-muted mb-3">Rp 10.000</p>
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20beli%20Snack%20Kering" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WhatsApp
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
        <img src="https://source.unsplash.com/400x300/?juice" class="card-img-top" alt="Jus Buah" />
        <div class="card-body text-center">
          <h6 class="card-title fw-semibold">Jus Buah Segar</h6>
          <p class="text-muted mb-3">Rp 12.000</p>
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20beli%20Jus%20Buah%20Segar" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WhatsApp
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card product-card border-0 shadow-sm h-100">
        <img src="https://source.unsplash.com/400x300/?coffee" class="card-img-top" alt="Kopi" />
        <div class="card-body text-center">
          <h6 class="card-title fw-semibold">Kopi Susu</h6>
          <p class="text-muted mb-3">Rp 15.000</p>
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20beli%20Kopi%20Susu" class="btn btn-success btn-sm px-3 rounded-pill">
            <i class="fa-brands fa-whatsapp me-1"></i> Beli via WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>
</section>



  <!-- Footer -->
  <footer id="kontak" class="footer text-center py-3">
    <div class="container">
      <p class="mb-0">
        © 2025 Marketplace Sekolah | Dibuat dengan <i class="fa-solid fa-heart text-danger"></i>
      </p>
    </div>
  </footer>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
