<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'CustomerName' => 'required|string|max:255',
            'Email' => 'required|email|unique:customers,Email',
            'Password' => 'required|min:6',
            'Address' => 'required|string',
            'Birthday' => 'required|date'
        ]);

        $customer = Customer::create([
            'CustomerName' => $request->CustomerName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Address' => $request->Address,
            'Birthday' => $request->Birthday
        ]);

        return response()->json(['message' => 'Customer berhasil ditambahkan', 'data' => $customer]);
    }

    public function show($id)
    {
        return response()->json(Customer::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json(['message' => 'Customer berhasil diperbarui', 'data' => $customer]);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json(['message' => 'Customer berhasil dihapus']);
    }
}
