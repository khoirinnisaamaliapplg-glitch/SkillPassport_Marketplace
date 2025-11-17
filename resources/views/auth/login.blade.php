<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Marketplace Sekolah</title>

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #102863, #2cce75);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
      overflow-x: hidden;
    }

    .login-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 420px;
      padding: 40px 30px;
    }

    .login-card .logo {
      width: 70px;
      margin-bottom: 10px;
    }

    .login-card h3 {
      font-weight: 700;
      color: #0f2f63;
      margin-bottom: 15px;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px 15px;
    }

    .btn-login {
      background-color: #2cce75;
      border: none;
      border-radius: 10px;
      padding: 10px;
      font-weight: 600;
      color: white;
      transition: 0.3s ease;
    }

    .btn-login:hover {
      background-color: #1ea55c;
      transform: translateY(-2px);
    }

    .text-muted a {
      color: #2cce75;
      text-decoration: none;
    }
    .text-muted a:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .login-card {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="login-card text-center">
    <img src="image/lgmarket.png" alt="Logo" class="logo" />


    <h3>Login ke Akun Anda</h3>
    <p class="text-muted mb-4">Masuk untuk melanjutkan ke Marketplace Sekolah</p>
    
     @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

   <form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="mb-3 text-start">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required />
    </div>

    <div class="mb-3 text-start">
        <label class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required />
    </div>

    <button type="submit" class="btn btn-login w-100 mt-3">
        <i class="fa-solid fa-right-to-bracket me-2"></i> Login
    </button>

    <p class="text-muted mt-4">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar Sekarang</a>
    </p>
</form>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
