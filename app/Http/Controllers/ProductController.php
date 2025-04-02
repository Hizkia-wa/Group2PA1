<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Quantity' => 'required|integer|min:1',
            'Price' => 'required|numeric|min:0',
            'Category' => 'required|string|max:255',
            'Description' => 'required|string',
            'Images' => 'required|string'
        ]);

        $product = Product::create($request->all());

        return response()->json(['message' => 'Produk berhasil ditambahkan', 'data' => $product]);
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json(['message' => 'Produk berhasil diperbarui', 'data' => $product]);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
