<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #f5f6fa;
      font-family: 'Poppins', sans-serif;
      color: #0f2f63;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background: linear-gradient(180deg, #0f2f63 0%, #102863 40%, #2cce75 100%);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
      box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
      font-weight: 700;
      color: #81ef59;
      text-align: center;
      margin-bottom: 25px;
    }

    .nav-link {
      color: #ffffff;
      padding: 10px 15px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.2s ease;
    }

    .nav-link i {
      width: 20px;
    }

    .nav-link:hover,
    .nav-link.active {
      background: #81ef59;
      color: #0f2f63;
    }

    .logout-area {
      margin-top: auto;
      padding-top: 15px;
      border-top: 1px solid rgba(255, 255, 255, 0.3);
    }

    .logout-area .nav-link {
      color: #ffdddd !important;
    }

    .logout-area .nav-link:hover {
      background: #ff4d4d;
      color: #fff !important;
    }

    .content {
      margin-left: 250px;
      padding: 25px;
      min-height: 100vh;
      background: #ffffff;
      border-radius: 10px;
    }
    @media (max-width: 992px) {
      .sidebar {
        display: none;
      }

      .content {
        margin-left: 0;
        border-radius: 0;
      }

      .btn-toggle-sidebar {
        display: block;
      }
    }

    @media (min-width: 992px) {
      .btn-toggle-sidebar {
        display: none;
      }
    }
  </style>
</head>

<body>


  <div class="offcanvas offcanvas-start" id="mobileSidebar"
       style="background: linear-gradient(180deg, #0f2f63 0%, #102863 40%, #2cce75 100%); color:white;">
    <div class="offcanvas-header">
      <h4 class="mt-2">Admin</h4>
      <button class="btn btn-light" data-bs-dismiss="offcanvas">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
     {{-- Menu Mobile --}}
    <div class="offcanvas-body d-flex flex-column">
      <ul class="nav flex-column w-100">
        <li class="nav-item"><a href="/admin/dashboard" class="nav-link active"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li class="nav-item"><a href="/admin/user" class="nav-link"><i class="fa-solid fa-users"></i> Users</a></li>
        <li class="nav-item"><a href="{{ route('admin.kategori') }}" class="nav-link"><i class="fa-solid fa-tags"></i> Kategori</a></li>
        <li class="nav-item"><a href="{{ route('admin.produk') }}" class="nav-link"><i class="fa-solid fa-box"></i> Produk</a></li>
        <li class="nav-item"><a href="/admin/toko" class="nav-link"><i class="fa-solid fa-store"></i> Toko</a></li>
      </ul>

      <div class="logout-area mt-auto w-100">
        <a href="#" class="nav-link text-danger"
          onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
        <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>

  <div class="d-flex">

    {{-- Menu Web --}}
    <div class="sidebar d-none d-lg-flex flex-column">
      <h4>Admin </h4>

      <ul class="nav flex-column mb-3">
        <li class="nav-item"><a href="/admin/dashboard" class="nav-link"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li class="nav-item"><a href="/admin/user" class="nav-link"><i class="fa-solid fa-users"></i> Users</a></li>
        <li class="nav-item"><a href="{{ route('admin.kategori') }}" class="nav-link"><i class="fa-solid fa-tags"></i> Kategori</a></li>
        <li class="nav-item"><a href="{{ route('admin.produk') }}" class="nav-link"><i class="fa-solid fa-box"></i> Produk</a></li>
        <li class="nav-item"><a href="/admin/toko" class="nav-link"><i class="fa-solid fa-store"></i> Toko</a></li>
      </ul>

     
      <div class="logout-area">
        <a href="#" class="nav-link text-danger"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>

    
    <div class="content flex-grow-1">

      <button class="btn btn-primary btn-toggle-sidebar mb-3"
              data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        <i class="fa-solid fa-bars"></i>
      </button>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>@yield('title')</h2>
      </div>

      @yield('content')

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
