<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json(Product::latest()->get());
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Category' => 'nullable|string|max:255',
            'Brand' => 'nullable|string|max:255',
            'Rating' => 'nullable|numeric',
            'Review' => 'nullable|string',
            'Thumbnail' => 'nullable|string',
            'Image1' => 'nullable|string',
            'Image2' => 'nullable|string',
        ]);

        $product = Product::create($data);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Category' => 'nullable|string|max:255',
            'Brand' => 'nullable|string|max:255',
            'Rating' => 'nullable|numeric',
            'Review' => 'nullable|string',
            'Thumbnail' => 'nullable|string',
            'Image1' => 'nullable|string',
            'Image2' => 'nullable|string',
        ]);

        $product->update($data);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}