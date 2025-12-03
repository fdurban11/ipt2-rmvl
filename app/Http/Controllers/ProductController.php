<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create new product
        Product::create($validated);

        return redirect()->route('products.index')
                       ->with('success', 'Product created successfully!');
    }

    /**
     * Display a specific product
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update product
        $product->update($validated);

        return redirect()->route('products.index')
                       ->with('success', 'Product updated successfully!');
    }

    /**
     * Delete the specified product from database
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $productName = $product->name;
        $product->delete();

        return redirect()->route('products.index')
                       ->with('success', "Product '{$productName}' deleted successfully!");
    }

    /**
     * Filter products by name
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('q', '');
        
        // Search for products by name
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
                           ->orWhere('category', 'like', '%' . $searchTerm . '%')
                           ->get();

        return view('products.index', compact('products', 'searchTerm'));
    }

    /**
     * Get products filtered by stock status
     * 
     * @param  string  $status
     * @return \Illuminate\View\View
     */
    public function filterByStock($status)
    {
        $query = Product::query();

        switch ($status) {
            case 'in-stock':
                $query->where('quantity', '>', 0);
                break;
            case 'low-stock':
                $query->whereBetween('quantity', [1, 9]);
                break;
            case 'out-of-stock':
                $query->where('quantity', 0);
                break;
        }

        $products = $query->get();
        $filterStatus = $status;

        return view('products.index', compact('products', 'filterStatus'));
    }

    /**
     * Get API endpoint for all products (JSON)
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Get API endpoint for single product (JSON)
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiShow(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Create product via API (JSON)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    /**
     * Update product via API (JSON)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpdate(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return response()->json($product);
    }

    /**
     * Delete product via API (JSON)
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiDestroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
