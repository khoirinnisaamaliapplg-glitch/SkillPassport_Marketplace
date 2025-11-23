@extends('public.template')

@section('title', 'Beranda')

@section('content')

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
  background: rgba(0, 0, 0, 0.45);
}
@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
.hero-title {
  color: #81ef59;
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
.product-card img {
  height: 170px;
  object-fit: cover;
  border-radius: 8px;
}
</style>

<!-- =========================== -->
<!-- HERO SECTION -->
<!-- =========================== -->
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


<!-- =========================== -->
<!-- TOKO DINAMIS -->
<!-- =========================== -->
<section id="toko" class="container py-5">
  <h2 class="text-center mb-5 text-primary">
    <i class="fa-solid fa-shop"></i> Pilihan Toko
  </h2>

  <div class="row g-4 justify-content-center">

    @forelse ($tokos as $toko)
    <div class="col-md-4 col-lg-3">
      <div class="card shadow-sm text-center h-100">

        {{-- LOGO TOKO (OPSIONAL) --}}
        <div class="card-body">
          <i class="fa-solid fa-store fa-3x text-success mb-3"></i>

          <h5 class="fw-bold">{{ $toko->nama_toko }}</h5>

          <p class="text-muted">
            {{ Str::limit($toko->deskripsi, 55) }}
          </p>
        </div>
      </div>
    </div>
    @empty
      <p class="text-center text-muted">Belum ada toko terdaftar.</p>
    @endforelse

  </div>
</section>


<!-- =========================== -->
<!-- PRODUK DINAMIS PER KATEGORI -->
<!-- =========================== -->
<section id="produk" class="container py-5">
  <h3 class="mb-5 text-center text-primary">
    <i class="fa-solid fa-bag-shopping"></i> Produk Sesuai Kategori
  </h3>

  @foreach ($kategoris as $kategori)

    <h5 class="mb-4 text-success fw-bold">
      🛍️ {{ $kategori->nama_kategori }}
    </h5>

    <div class="row g-4 mb-5">

      @php
        $produkKategori = $produks->where('id_kategori', $kategori->id_kategori);
      @endphp

      @if ($produkKategori->isEmpty())
        <p class="text-muted ms-2">Belum ada produk pada kategori ini.</p>
      @endif

      @foreach ($produkKategori as $p)
      <div class="col-md-3">
  <a href="{{ route('produk.detail', $p->id_produk) }}" class="text-decoration-none text-dark">

    <div class="card product-card border-0 shadow-sm h-100">

      {{-- GAMBAR PRODUK --}}
      @if($p->gambars->isNotEmpty())
        <img src="{{ asset('uploads/produk/' . $p->gambars[0]->nama_gambar) }}"
             class="card-img-top">
      @else
        <img src="https://via.placeholder.com/300" class="card-img-top">
      @endif

      <div class="card-body text-center">
        <h6 class="fw-semibold">{{ $p->nama_produk }}</h6>

        <p class="text-muted mb-3">
          Rp {{ number_format($p->harga, 0, ',', '.') }}
        </p>
      </div>

    </div>

  </a>
</div>

      @endforeach

    </div>

  @endforeach
</section>

@endsection
