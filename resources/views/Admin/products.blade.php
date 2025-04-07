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
            <div class="d-flex justify-content-between mt-4">
                <input type="text" class="form-control w-50" placeholder="Cari...">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success ms-3">Tambah Produk</a>
            </div>

            <table class="table table-bordered table-hover mt-4">
                <thead class="table-success text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar Utama</th>
                        <th>Slide Carousel 1</th>
                        <th>Slide Carousel 2</th>
                        <th>Slide Carousel 3</th>
                        <th>Aksi Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    @php
                        $images = json_decode($product->Images, true);
                        $carousel = $images['carousel'] ?? [];
                    @endphp
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->ProductName }}</td>
                        <td>{{ $product->Category }}</td>
                        <td>Rp{{ number_format($product->Price, 0, ',', '.') }}</td>
                        <td>{{ Str::limit($product->Description, 50) }}</td>
                        <td>
                            @if(isset($images['main']))
                                <img src="{{ asset('storage/' . $images['main']) }}" width="50">
                            @else
                                <span class="text-danger">-</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($carousel[0]))
                                <img src="{{ asset('storage/' . $carousel[0]) }}" width="50">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($carousel[1]))
                                <img src="{{ asset('storage/' . $carousel[1]) }}" width="50">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($carousel[2]))
                                <img src="{{ asset('storage/' . $carousel[2]) }}" width="50">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                        @if(isset($product->ProductID) && !empty($product->ProductID))
                            <a href="{{ route('admin.products.view', ['ProductID' => $product->ProductID]) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.products.edit', ['ProductID' => $product->ProductID]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', ['ProductID' => $product->ProductID]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</div>
@endsection
