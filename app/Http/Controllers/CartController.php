<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductID' => 'required|exists:products,ProductID',
            'NamaProduct' => 'required|string|max:255',
            'Quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::create($request->all());

        return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang', 'data' => $cart]);
    }

    public function show($id)
    {
        return response()->json(Cart::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return response()->json(['message' => 'Keranjang berhasil diperbarui', 'data' => $cart]);
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return response()->json(['message' => 'Item dihapus dari keranjang']);
    }
}
