<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   // Dashboard Admin
   public function dashboard()
   {
    $jumlahProduk = Product::count();
    $jumlahKategori = Product::distinct('category')->count('category'); // Ambil kategori unik dari Product
    $jumlahUlasan = Review::count();
   
    return view('admin.dashboard', compact('jumlahProduk', 'jumlahKategori', 'jumlahUlasan'));
    }

   // Halaman Produk
   public function products()
   {
       return view('admin.products');
   }

   // Halaman Ulasan
   public function reviews()
   {
       return view('admin.reviews');
   }

   // Halaman Website
   public function website()
   {
       return view('admin.website');
   }

    // Menampilkan daftar admin di halaman admin.index
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    // Menampilkan form tambah admin
    public function create()
    {
        return view('admin.create');
    }

    // Menyimpan admin baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'AdminName' => 'required|string|max:255',
            'Email' => 'required|email|unique:admins,Email',
            'Password' => 'required|min:6'
        ]);

        Admin::create([
            'AdminName' => $request->AdminName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password)
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan halaman edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Mengupdate data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'AdminName' => $request->AdminName,
            'Email' => $request->Email,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
