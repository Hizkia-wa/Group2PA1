<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductID' => 'required|exists:products,ProductID',
            'CustomerID' => 'required|exists:customers,CustomerID',
            'CustomerName' => 'required|string|max:255',
            'ProductName' => 'required|string|max:255',
            'Quantity' => 'required|integer|min:1',
            'Request' => 'nullable|string',
            'Address' => 'required|string'
        ]);

        $order = Order::create($request->all());

        return response()->json(['message' => 'Pesanan berhasil dibuat', 'data' => $order]);
    }

    public function show($id)
    {
        return response()->json(Order::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json(['message' => 'Pesanan diperbarui', 'data' => $order]);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message' => 'Pesanan dihapus']);
    }
}
