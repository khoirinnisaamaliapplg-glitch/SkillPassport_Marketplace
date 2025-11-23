@extends('public.template')

@section('title', 'Daftar Toko')

@section('content')

<div class="container py-5">
  <h3 class="text-center mb-5 fw-bold text-primary">
    <i class="fa-solid fa-shop me-2"></i> Daftar Toko
  </h3>

  <div class="row g-4">

    @foreach($toko as $item)
    <div class="col-md-3">
      <a href="{{ url('/toko/'.$item->id_toko) }}" class="text-decoration-none text-dark">
        <div class="card produk-card">

          {{-- GAMBAR TOKO --}}
          <img 
            src="{{ asset('storage/toko/'.$item->gambar) }}" 
            class="card-img-top"
            style="height:170px; object-fit:cover;"
            onerror="this.src='/image/default-toko.jpg'"
          >

          <div class="card-body text-center">
            <h6 class="fw-bold">{{ $item->nama_toko }}</h6>

            <p class="text-muted small mb-2">
              {{ $item->deskripsi ?? 'Toko ini belum memiliki deskripsi' }}
            </p>

            <button class="btn btn-beli btn-sm rounded-pill px-3">
              <i class="fa-solid fa-store me-1"></i> Kunjungi
            </button>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>
</div>

@endsection
