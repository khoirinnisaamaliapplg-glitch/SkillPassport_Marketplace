<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi | Marketplace Sekolah</title>

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* ======== GLOBAL STYLE ======== */
    body {
     background: linear-gradient(135deg, #102863, #2cce75);
      font-family: "Poppins", sans-serif;
      color: #0f2f63;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* ======== CARD AUTH ======== */
    .auth-card {
      width: 100%;
      max-width: 420px;
      background: #fff;
      border-radius: 20px;
      padding: 2rem 2.5rem;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ======== FORM ======== */
    .form-control, .form-select {
      border-radius: 50px;
      border: 1px solid #ccc;
      transition: all 0.3s ease;
      padding-left: 15px;
    }

    .form-control:focus, .form-select:focus {
      border-color: #2cce75;
      box-shadow: 0 0 6px rgba(44, 206, 117, 0.4);
    }

    /* ======== BUTTON ======== */
    .btn-success {
      background-color: #81ef59;
      border: none;
      color: #0f2f63;
      transition: all 0.3s ease;
    }

    .btn-success:hover {
      background-color: #2cce75;
      color: #fff;
      transform: translateY(-2px);
    }

    /* ======== TEXT & LINKS ======== */
    a {
      text-decoration: none;
      transition: color 0.3s;
    }

    a.text-success:hover {
      color: #2cce75 !important;
    }

    /* ======== LOGO ======== */
    .auth-card img {
      width: 70px;
      border-radius: 12px;
    }

    /* ======== RESPONSIVE ======== */
    @media (max-width: 576px) {
      .auth-card {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="auth-card mx-auto">
      <div class="text-center mb-4">
        <img src="{{ asset('image/lgmarket.png') }}" alt="Logo" class="mb-3">
        <h4 class="fw-bold text-primary">Registrasi Akun</h4>
        <p class="text-muted small">Bergabung dan mulai berjualan di Marketplace Sekolah!</p>
      </div>

      <form action="{{ route('register') }}" method="POST">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
  </div>

  <div class="mb-3">
    <label for="username" class="form-label fw-semibold">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username aktif" required>
  </div>

  <div class="mb-3">
  <label class="form-label fw-semibold">Kontak</label>
  <input type="text" name="kontak" class="form-control" placeholder="Masukkan nomor HP">
  </div>


  <div class="mb-3">
    <label for="role" class="form-label fw-semibold">Role</label>
    <select id="role" name="role" class="form-select" required>
      <option value="" selected disabled>Pilih Role</option>
      <option value="member">Member</option>
      <option value="admin">Admin</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label fw-semibold">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
  </div>

  <div class="mb-3">
    <label for="confirm_password" class="form-label fw-semibold">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Ulangi password" required>
  </div>

  <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold mt-3">
    <i class="fa-solid fa-user-plus me-2"></i> Daftar Sekarang
  </button>
</form>


      <div class="text-center mt-4">
        <p class="small mb-0">Sudah punya akun?
          <a href="/login" class="text-success fw-semibold">Login di sini</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
