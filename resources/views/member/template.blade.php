<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Panel</title>

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d9d6a52c.js" crossorigin="anonymous"></script>

  <style>
    body {
      background-color: #f5f6fa;
      font-family: 'Poppins', sans-serif;
      color: #0f2f63;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
      width: 250px;
      min-height: 100vh;
      background: linear-gradient(180deg, #0f2f63 0%, #102863 40%, #2cce75 100%);
      color: #fff;
      box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
      font-weight: 700;
      color: #81ef59;
    }

    .sidebar .nav-link {
      color: #ffffff;
      padding: 10px 15px;
      border-radius: 8px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #81ef59;
      color: #0f2f63;
      font-weight: 600;
      transform: translateX(5px);
    }

    .sidebar hr {
      border-color: rgba(255, 255, 255, 0.2);
    }

    /* ===== CONTENT ===== */
    .content {
      background-color: #ffffff;
      border-radius: 12px;
      min-height: 100vh;
      padding: 20px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    }

    /* ===== CARD ===== */
    .card {
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(15, 47, 99, 0.15);
    }

    /* ===== BUTTON ===== */
    .btn-custom {
      background-color: #81ef59;
      color: #0f2f63;
      font-weight: 600;
      border-radius: 50px;
      border: none;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #2cce75;
      color: #fff;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        min-height: auto;
      }

      .content {
        border-radius: 0;
      }
    }
  </style>
</head>

<body>
  <div class="d-flex">

    <!-- SIDEBAR MEMBER -->
    <div class="sidebar p-3">
      <h4 class="text-center mb-4">Member Panel</h4>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="/member/dashboard" class="nav-link active"><i class="fa-solid fa-house me-2"></i> Dashboard</a></li>
        <li class="nav-item"><a href="/member/toko" class="nav-link"><i class="fa-solid fa-store me-2"></i> Toko Saya</a></li>
        <li class="nav-item"><a href="/member/produk" class="nav-link"><i class="fa-solid fa-box me-2"></i> Produk</a></li>
        <li class="nav-item"><a href="/member/profil" class="nav-link"><i class="fa-solid fa-user me-2"></i> Profil</a></li>

        <li class="nav-item mt-3 border-top pt-2">
          <a href="/logout" class="nav-link text-danger">
            <i class="fa-solid fa-right-from-bracket me-2"></i>
            Logout
          </a>
        </li>
      </ul>
    </div>

    <!-- CONTENT MEMBER -->
    <div class="content flex-grow-1 p-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>@yield('title')</h2>
      </div>

      @yield('content')
    </div>

  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
