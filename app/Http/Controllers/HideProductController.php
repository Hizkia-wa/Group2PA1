<?php

namespace App\Http\Controllers;

use App\Models\HideProduct;
use Illuminate\Http\Request;

class HideProductController extends Controller
{
    public function index()
    {
        return response()->json(HideProduct::all());
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

        $hideProduct = HideProduct::create($request->all());

        return response()->json(['message' => 'Produk disembunyikan', 'data' => $hideProduct]);
    }

    public function show($id)
    {
        return response()->json(HideProduct::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $hideProduct = HideProduct::findOrFail($id);
        $hideProduct->update($request->all());
        return response()->json(['message' => 'Data produk tersembunyi diperbarui', 'data' => $hideProduct]);
    }

    public function destroy($id)
    {
        HideProduct::destroy($id);
        return response()->json(['message' => 'Produk tersembunyi dihapus']);
    }
}
