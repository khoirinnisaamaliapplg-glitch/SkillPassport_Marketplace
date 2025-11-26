@extends('public.template')

@section('title', 'Produk')

@section('content')

<style>
  .title-page {
    font-weight: 700;
    color: #0f2f63;
  }

  .produk-card {
    border: none;
    border-radius: 14px;
    overflow: hidden;
    transition: .25s;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }

  .produk-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
  }

  .produk-card img {
    height: 180px;
    width: 100%;
    object-fit: cover;
  }

  .btn-beli {
    background: #2cce75;
    border: none;
    font-weight: 600;
    color: white;
  }

  .btn-beli:hover {
    background: #25b767;
  }

  .judul-toko {
    font-size: 20px;
    font-weight: 700;
    color: #0f2f63;
    border-left: 5px solid #2cce75;
    padding-left: 10px;
    margin-top: 50px;
  }
</style>

<div class="container py-5">

  <h2 class="text-center title-page mb-5">
    <i class="fa-solid fa-store"></i> Produk Sesuai Toko
  </h2>

  @foreach($tokos as $toko)


    <h4 class="judul-toko">
      {{ $toko->nama_toko }}
    </h4>

    <div class="row g-4 mt-2">

      @forelse($toko->produks as $produk)
        <div class="col-md-3">
          <div class="card produk-card">

            {{-- Gambar produk (ambil gambar pertama) --}}
            @if(count($produk->gambars) > 0)
              <img src="{{ asset('uploads/produk/'.$produk->gambars[0]->nama_gambar) }}">
            @else
              <img src="/image/no-image.jpg">
            @endif

            <div class="card-body text-center">
              <h6 class="fw-bold">{{ $produk->nama_produk }}</h6>
              <p class="text-muted mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

              <a href="https://wa.me/6287753514067?text={{ urlencode('Halo, saya ingin beli ' . $produk->nama_produk) }}"
                 class="btn btn-beli btn-sm rounded-pill px-3">
                <i class="fa-brands fa-whatsapp me-1"></i>Beli Lewat WhatsApp
              </a>
            </div>

          </div>
        </div>
      @empty
        <p class="text-muted ms-3">Belum ada produk di toko ini.</p>
      @endforelse

    </div>

  @endforeach

</div>

@endsection
