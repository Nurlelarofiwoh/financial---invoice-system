<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Quick search by code or name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('product_code', 'LIKE', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Min & Max Price filter
        if ($request->filled('min_price')) {
            $query->where('unit_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('unit_price', '<=', $request->max_price);
        }

        $products = $query->orderBy('name', 'asc')->paginate(10)->withQueryString();

        $categories = Product::select('category')->distinct()->pluck('category');

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Product::select('category')->distinct()->pluck('category');
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => 'required|string|unique:products,product_code',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['stock_quantity'] = 0;

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Product::select('category')->distinct()->pluck('category');
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code' => 'required|string|unique:products,product_code,' . $product->id,
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function quickUpdatePrice(Request $request, Product $product)
    {
        $request->validate([
            'unit_price' => 'required|numeric|min:0',
        ]);

        $product->update(['unit_price' => $request->unit_price]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Price updated successfully', 'product' => $product]);
        }

        return back()->with('success', 'Price updated successfully for ' . $product->name);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
