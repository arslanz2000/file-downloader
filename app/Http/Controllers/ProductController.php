<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('short_description', 'like', '%' . $search . '%')
                ->orWhere('tags', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('admin.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'icon' => 'nullable|image|max:2048',
            'category' => 'required|string',
            'subcategory' => 'nullable|string',
            'launch_date' => 'nullable|date',
            'rating' => 'nullable|numeric|between:0,5',
            'size' => 'nullable|string|max:50',
            'download_link' => 'nullable|url',
            'is_active' => 'required|boolean',
            'version' => 'nullable|string|max:50',
            'total_downloads' => 'nullable|integer',
            'version_details' => 'nullable|string',
            'language' => 'nullable|string',
            'pass_code' => 'nullable|string|max:50',
            'display_picture' => 'nullable|image|max:2048',
            'details' => 'nullable|string',
            'tags' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $product = new Product($validated);

        if ($request->hasFile('icon')) {
            $product->icon = $request->file('icon')->store('icons', 'public');
        }

        if ($request->hasFile('display_picture')) {
            $product->display_picture = $request->file('display_picture')->store('display_pictures', 'public');
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'icon' => 'nullable|image|max:2048',
            'category' => 'required|string',
            'subcategory' => 'nullable|string',
            'launch_date' => 'nullable|date',
            'rating' => 'nullable|numeric|between:0,5',
            'size' => 'nullable|string|max:50',
            'download_link' => 'nullable|url',
            'is_active' => 'required|boolean',
            'version' => 'nullable|string|max:50',
            'total_downloads' => 'nullable|integer',
            'version_details' => 'nullable|string',
            'language' => 'nullable|string',
            'pass_code' => 'nullable|string|max:50',
            'display_picture' => 'nullable|image|max:2048',
            'details' => 'nullable|string',
            'tags' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->fill($validated);

        if ($request->hasFile('icon')) {
            $product->icon = $request->file('icon')->store('icons', 'public');
        }

        if ($request->hasFile('display_picture')) {
            $product->display_picture = $request->file('display_picture')->store('display_pictures', 'public');
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function showProducts(Request $request)
    {
        $search = $request->input('search');
        $categories = ['Windows', 'Mac', 'Android Apps', 'Android Games', 'PC Games', 'Ebooks', 'Video Courses'];
        $products = [];

        foreach ($categories as $category) {
            $products[$category] = Product::where('type', $category)
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('short_description', 'like', '%' . $search . '%')
                        ->orWhere('tags', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        return view('products.index', compact('products', 'search'));
    }

    public function fetchProductsByCategory(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $category = $validated['category'];

        $products = Product::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'total' => $products->total(),
            'data' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }

    public function fetchLastSixMonthsProducts(Request $request)
    {
        $sixMonthsAgo = now()->subMonths(6);

        $products = Product::where('created_at', '>=', $sixMonthsAgo)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'total' => $products->total(),
            'data' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }
}
