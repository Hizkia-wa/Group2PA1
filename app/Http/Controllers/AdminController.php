<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menampilkan semua admin
    public function index()
    {
        return response()->json(Admin::all());
    }

    // Menambahkan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'AdminName' => 'required|string|max:255',
            'Email' => 'required|email|unique:admins,Email',
            'Password' => 'required|min:6'
        ]);

        $admin = Admin::create([
            'AdminName' => $request->AdminName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password)
        ]);

        return response()->json(['message' => 'Admin berhasil ditambahkan', 'data' => $admin]);
    }

    // Menampilkan detail admin berdasarkan ID
    public function show($id)
    {
        return response()->json(Admin::findOrFail($id));
    }

    // Mengupdate data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
        return response()->json(['message' => 'Admin berhasil diperbarui', 'data' => $admin]);
    }

    // Menghapus admin
    public function destroy($id)
    {
        Admin::destroy($id);
        return response()->json(['message' => 'Admin berhasil dihapus']);
    }
}
