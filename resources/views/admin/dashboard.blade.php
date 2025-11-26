@extends('admin.template')

@section('title', 'Dashboard Admin')

@section('content')

{{-- FontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>


  .dashboard-wrap {
    margin-top: 25px;
    padding: 10px;
  }

  .dashboard-row {
    display: flex;
    flex-wrap: wrap;
    gap: 22px;
  }

 
  .dashboard-card {
    flex: 1 1 30%;
    padding: 35px 25px;
    border-radius: 28px;
    background: rgba(255, 255, 255, 0.35);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 12px 28px rgba(0,0,0,0.10);

    transition: 0.35s ease;
    text-align: center;

    position: relative;
    overflow: hidden;
  }

  
  .dashboard-card::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    background: radial-gradient(circle, rgba(255,255,255,0.55), transparent);
    top: -40px;
    right: -40px;
    filter: blur(25px);
    opacity: .7;
  }

  .dashboard-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.18);
  }

  
  .dashboard-card .icon {
    height: 80px;
    width: 80px;
    margin: 0 auto 18px auto;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 22px;
    font-size: 38px;
    color: #fff;
  }

  .icon.users   { 
    background: linear-gradient(135deg, #228be6, #4c6ef5); 
  }
  .icon.produk  { 
    background: linear-gradient(135deg, #fa5252, #ff7675); 
  }
  .icon.toko    { 
    background: linear-gradient(135deg, #fab005, #ffd43b); 
  }


  .dashboard-card h5 {
    margin-top: 10px;
    font-weight: 700;
    color: #0f2f63;
    font-size: 17px;
  }

  .dashboard-card h3 {
    margin-top: 6px;
    font-size: 42px;
    font-weight: 800;
    color: #0f2f63;
  }


  @media (max-width: 768px) {
    .dashboard-card {
      flex: 1 1 100%;
    }
  }

</style>

<div class="dashboard-wrap">
  <div class="dashboard-row">

    <div class="dashboard-card">
      <div class="icon users">
        <i class="fa-solid fa-users"></i>
      </div>
      <h5>Total Users</h5>
      <h3>{{ $totalUsers }}</h3>
    </div>

    <div class="dashboard-card">
      <div class="icon produk">
        <i class="fa-solid fa-box-open"></i>
      </div>
      <h5>Total Produk</h5>
      <h3>{{ $totalProduk }}</h3>
    </div>

    <div class="dashboard-card">
      <div class="icon toko">
        <i class="fa-solid fa-store"></i>
      </div>
      <h5>Total Toko</h5>
      <h3>{{ $totalToko }}</h3>
    </div>

  </div>
</div>

@endsection
