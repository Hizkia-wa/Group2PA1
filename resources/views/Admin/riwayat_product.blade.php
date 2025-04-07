@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="text-center mt-3 mb-4">Halaman Riwayat Produk</h2>

    <table class="table table-bordered text-center">
        <thead class="table-success">
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
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->ProductName }}</td>
                    <td>{{ $product->Category }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Description }}</td>
                    <td>{{ basename($images['main'] ?? '') }}</td>
                    <td>{{ basename($carousel[0] ?? '') }}</td>
                    <td>{{ basename($carousel[1] ?? '') }}</td>
                    <td>{{ basename($carousel[2] ?? '') }}</td>
                    <td>
                        <form action="{{ route('riwayat.restore', $product->ProductID) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                        </form>
                        <form action="{{ route('riwayat.delete', $product->ProductID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus permanen?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
