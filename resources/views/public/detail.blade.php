@extends('public.template')

@section('title', 'Detail Produk - ' . $produk->nama_produk)

@section('content')

<style>
  .product-title {
    font-size: 28px;
    font-weight: 800;
    color: #0f2f63;
  }
  .product-price {
    font-size: 24px;
    font-weight: 700;
    color: #2cce75;
  }
  .btn-wa {
    background: #2cce75;
    border: none;
    color: white;
    font-weight: 600;
  }
  .btn-wa:hover {
    background: #25b767;
  }
  .badge-kategori {
    background: #0f2f63;
  }
  .product-image {
    border-radius: 14px;
    width: 100%;
    height: 380px;
    object-fit: cover;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
  }
  .info-box {
    border-radius: 14px;
    background: #f8f9fa;
    padding: 18px;
  }
  .judul-section {
    font-size: 20px;
    font-weight: 700;
    color: #0f2f63;
  }
</style>

<div class="container py-5">

  <div class="row">

    <!-- FOTO PRODUK -->
    <div class="col-md-5 mb-4">
     @if ($produk->gambars->count())
        <img src="{{ asset('uploads/produk/'.$produk->gambars->first()->nama_gambar) }}" class="product-image">
    @else
        <img src="{{ asset('image/no-image.png') }}" class="product-image">
    @endif


    </div>

    <!-- DETAIL PRODUK -->
    <div class="col-md-7">

      <h1 class="product-title mb-2">{{ $produk->nama_produk }}</h1>

      <span class="badge badge-kategori py-2 px-3 mb-3">
        {{ $produk->kategori->nama_kategori ?? 'Tanpa Kategori' }}
      </span>

      <h3 class="product-price mt-3 mb-3">
        Rp {{ number_format($produk->harga, 0, ',', '.') }}
      </h3>

      <p class="text-muted" style="font-size: 15px;">
        {{ $produk->deskripsi ? $produk->deskripsi : 'Tidak ada deskripsi.' }}
      </p>

      <div class="info-box mt-4">
        <p class="mb-1"><strong>Toko:</strong> {{ $produk->toko->nama_toko }}</p>
        <p class="mb-1"><strong>Lokasi:</strong> {{ $produk->toko->lokasi }}</p>
        <p class="mb-0"><strong>Jam Buka:</strong> {{ $produk->toko->jam_buka }}</p>
      </div>

      <a href="https://wa.me/{{ $produk->toko->no_wa }}?text=Halo%2C%20saya%20ingin%20beli%20{{ urlencode($produk->nama_produk) }}"
         class="btn btn-wa btn-lg rounded-pill mt-4 px-4">
        <i class="fa-brands fa-whatsapp me-2"></i> Beli Lewat WhatsApp
      </a>

    </div>
  </div>

  <!-- DESKRIPSI -->
  <div class="mt-5">
    <h4 class="judul-section mb-3">Deskripsi Produk</h4>
    <p class="text-muted">
      {{ $produk->deskripsi ? $produk->deskripsi : 'Tidak ada deskripsi tambahan.' }}
    </p>
  </div>

</div>

@endsection
