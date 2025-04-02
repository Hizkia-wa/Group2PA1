<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ReviewerName' => 'required|string|max:255',
            'Rating' => 'required|integer|min:1|max:5',
            'Picture' => 'nullable|string',
            'Coment' => 'required|string'
        ]);

        $review = Review::create($request->all());

        return response()->json(['message' => 'Review berhasil ditambahkan', 'data' => $review]);
    }

    public function show($id)
    {
        return response()->json(Review::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return response()->json(['message' => 'Review diperbarui', 'data' => $review]);
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json(['message' => 'Review dihapus']);
    }
}
