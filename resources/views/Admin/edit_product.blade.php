@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    
    <form action="{{ route('admin.products.update', ['ProductID' => $product->ProductID]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ $product->ProductName }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" name="category" class="form-control" value="{{ $product->Category }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $product->Price }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Stok</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->Quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ $product->Description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Utama</label>
            @if(isset($product->Images['main']))
                <img src="{{ asset('storage/' . $product->Images['main']) }}" width="100">
            @endif
            <input type="file" name="main_image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Carousel</label>
            <div>
                @if(isset($product->Images['carousel']) && is_array($product->Images['carousel']))
                    @foreach($product->Images['carousel'] as $carousel)
                        <img src="{{ asset('storage/' . $carousel) }}" width="100">
                    @endforeach
                @endif
            </div>
            <input type="file" name="carousel_images[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>
@endsection
