@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-md-block bg-success sidebar vh-100">
            <div class="position-sticky">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active bg-dark" href="{{ route('admin.products') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.reviews') }}">Ulasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.website') }}">Halaman Website</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="riwayatDropdown" role="button" data-bs-toggle="dropdown">
                            Riwayat ▼
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.riwayat.produk') }}">Riwayat Produk</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.riwayat.ulasan') }}">Riwayat Ulasan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Konten utama -->
        <main class="col-md-10 ms-sm-auto px-4">
            <div class="mt-4">
                <a href="{{ route('admin.products') }}" class="btn btn-dark">Tambah Produk</a>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Jumlah Produk</label>
                    <input type="number" name="quantity" id="quantity" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori:</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga Produk:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="main_image" class="form-label">Upload Gambar:</label>
                    <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="carousel_images" class="form-label">Upload Gambar Lainnya:</label>
                    <input type="file" class="form-control" id="carousel_images" name="carousel_images[]" accept="image/*" multiple>
                </div>

                <div class="d-flex">
                    <a href="{{ route('admin.products') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
