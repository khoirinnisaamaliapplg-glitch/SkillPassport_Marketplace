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
    color: white;
  }
  .product-image {
    border-radius: 14px;
    width: 100%;
    height: 380px;
    object-fit: cover;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
  }
  .thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
    cursor: pointer;
    transition: 0.2s;
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


<div class="col-md-5 mb-4">

  @php
    $selected = request()->get('img');
    $mainImage = $selected
        ? asset('uploads/produk/' . $selected)
        : ($produk->gambars->count()
            ? asset('uploads/produk/'.$produk->gambars->first()->nama_gambar)
            : asset('image/lgmarket.png'));
  @endphp

  
  <img src="{{ $mainImage }}" class="product-image mb-3">

  
  @if ($produk->gambars->count() > 1)
    <div class="d-flex gap-2 flex-wrap">
      @foreach ($produk->gambars as $g)
        <a href="?img={{ $g->nama_gambar }}">
          <img src="{{ asset('uploads/produk/'.$g->nama_gambar) }}"
               class="thumbnail"
               style="border: {{ $selected == $g->nama_gambar ? '2px solid #2cce75' : '2px solid #ddd' }};">
        </a>
      @endforeach
    </div>
  @endif

</div>


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
    <p class="mb-1"><strong>Lokasi:</strong> {{ $produk->toko->alamat }}</p>
    <p class="mb-0"><strong>Jam Buka:</strong> {{ $produk->toko->jam_buka }}</p>
  </div>

  <a href="https://wa.me/6287753514067?text={{ urlencode('Halo, saya ingin beli ' . $produk->nama_produk) }}"
    class="btn btn-wa btn-lg rounded-pill mt-4 px-4">
      <i class="fa-brands fa-whatsapp me-2"></i> Beli Lewat WhatsApp
  </a>


</div>


  </div>

</div>

@endsection
