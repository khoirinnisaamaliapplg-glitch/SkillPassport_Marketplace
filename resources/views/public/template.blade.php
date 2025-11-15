<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Marketplace Publik')</title>

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Custom CSS -->
  <style>
    .custom-navbar {
      background: linear-gradient(90deg, #102863, #0f2f63, #2cce75);
    }
    .custom-navbar .nav-link,
    .navbar-brand {
      color: #fff !important;
    }
    .hero-section {
      position: relative;
      height: 380px;
      background: url('https://source.unsplash.com/1600x600/?market,shop') center/cover no-repeat;
    }
    .hero-section .overlay {
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.55);
    }
  </style>

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
        <img src="/image/lgmarket.png" alt="Logo" width="40" class="me-2">
        Marketplace Sekolah
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fw-semibold align-items-center">

          <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="/toko">Toko</a></li>
          <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
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

  <!-- CONTENT -->
  <main>
      @yield('content')
  </main>

  <!-- Footer -->
 <style>
  .footer-custom {
    background: linear-gradient(135deg, #0f2f63, #102863, #2cce75);
    color: #ffffff;
    font-weight: 500;
  }

  .footer-custom p {
    margin: 0;
  }
</style>

<footer id="kontak" class="footer-custom text-center py-3 mt-5">
  <div class="container">
    <p>
      © 2025 Marketplace Sekolah | Dibuat dengan 
      <i class="fa-solid fa-heart text-danger"></i>
    </p>
  </div>
</footer>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
