@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-secondary text-white min-vh-100">
            <div class="text-center my-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="80">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active bg-dark text-white rounded">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products') }}" class="nav-link text-white">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reviews') }}" class="nav-link text-white">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.website') }}" class="nav-link text-white">Halaman Website</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="riwayatDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Riwayat
                    </a>
                    <ul class="dropdown-menu bg-dark">
                        <li><a class="dropdown-item text-white" href="{{ route('admin.riwayat.produk') }}">Riwayat Produk</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('admin.riwayat.ulasan') }}">Riwayat Ulasan</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Dashboard</h3>
                <div>
                    <span class="fw-bold">ADMIN ▼</span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Jumlah Produk</div>
                        <div class="card-body text-center">
                            <h5>{{ $jumlahProduk ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Jumlah Kategori Produk</div>
                        <div class="card-body text-center">
                            <h5>{{ $jumlahKategori ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Jumlah Ulasan</div>
                        <div class="card-body text-center">
                            <h5>{{ $jumlahUlasan ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Jumlah Produk Terlaris</div>
                        <div class="card-body text-center">
                            <h5>{{ $produkTerlaris ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
