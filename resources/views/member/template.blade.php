<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #f5f6fa;
      font-family: 'Poppins', sans-serif;
      color: #0f2f63;
      margin: 0;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background: linear-gradient(180deg, #0f2f63 0%, #102863 40%, #2cce75 100%);
      color: #fff;
      box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px 15px;

      display: flex;             
      flex-direction: column;    
    }

    .sidebar h4 {
      font-weight: 700;
      color: #81ef59;
      text-align: center;
    }

    .nav-link {
      color: #ffffff;
      padding: 10px 15px;
      border-radius: 8px;
      transition: 0.2s;
      font-weight: 500;
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: #81ef59;
      color: #0f2f63;
      font-weight: 600;
    }

    .logout-area {
      margin-top: auto;       
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      padding-top: 15px;
    }

    
    .content {
      margin-left: 250px;
      background: #ffffff;
      border-radius: 12px;
      min-height: 100vh;
      padding: 20px;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }

      .content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>


  <div class="sidebar">

    <h4 class="mb-4">Member</h4>

    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="/member/dashboard" class="nav-link">
          <i class="fa-solid fa-house me-2"></i> Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a href="/member/toko" class="nav-link">
          <i class="fa-solid fa-store me-2"></i> Toko Saya
        </a>
      </li>

      <li class="nav-item">
        <a href="/member/produk" class="nav-link">
          <i class="fa-solid fa-box me-2"></i> Produk
        </a>
      </li>

      <li class="nav-item">
        <a href="/member/profil" class="nav-link">
          <i class="fa-solid fa-user me-2"></i> Profil
        </a>
      </li>
    </ul>

    
    <div class="logout-area">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link nav-link text-danger p-0">
          <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </button>
      </form>
    </div>

  </div>


  <div class="content p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>@yield('title')</h2>
    </div>

    @yield('content')
  </div>

</body>
</html>
