<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index()
    {
        return response()->json(OrderStatus::all());
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
            'Address' => 'required|string',
            'OrderStatus' => 'required|in:Pending,Processing,Completed,Cancelled'
        ]);

        $orderStatus = OrderStatus::create($request->all());

        return response()->json(['message' => 'Status pesanan berhasil ditambahkan', 'data' => $orderStatus]);
    }

    public function show($id)
    {
        return response()->json(OrderStatus::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        $orderStatus->update($request->all());
        return response()->json(['message' => 'Status pesanan diperbarui', 'data' => $orderStatus]);
    }

    public function destroy($id)
    {
        OrderStatus::destroy($id);
        return response()->json(['message' => 'Status pesanan dihapus']);
    }
}
