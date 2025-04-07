<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua produk yang telah dihapus (soft deleted)
        $products = Product::onlyTrashed()->get();
        return view('admin.riwayat_product', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('riwayat.index')->with('success', 'Produk berhasil dipulihkan!');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->route('riwayat.index')->with('success', 'Produk berhasil dihapus permanen!');
    }
}
