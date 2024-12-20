<?php

namespace App\Http\Controllers;

use App\Models\UpcomingProduct;
use Illuminate\Http\Request;

class UpcomingProductController extends Controller
{
    public function index()
    {
        $products = UpcomingProduct::all();
        return view('upcoming_products.index', compact('products'));
    }

    public function create()
    {
        return view('upcoming_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('picture')->store('upcoming', 'public');

        UpcomingProduct::create([
            'name' => $request->name,
            'picture' => $path,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('upcoming-products.index');
    }

    public function edit(UpcomingProduct $upcomingProduct)
    {
        return view('upcoming_products.edit', compact('upcomingProduct'));
    }

    public function update(Request $request, UpcomingProduct $upcomingProduct)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('upcoming', 'public');
            $upcomingProduct->update(['picture' => $path]);
        }

        $upcomingProduct->update([
            'name' => $request->name,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('upcoming-products.index');
    }

    public function destroy(UpcomingProduct $upcomingProduct)
    {
        $upcomingProduct->delete();
        return redirect()->route('upcoming-products.index');
    }

    public function getActiveProducts()
{
    $products = UpcomingProduct::where('is_active', 1)->get();

    $products->transform(function ($product) {
        $product->image = 'upcoming/' . $product->image;
        return $product;
    });

    return response()->json([
        'success' => true,
        'data' => $products,
    ]);
}

}
