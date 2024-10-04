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
                     ->orWhere('description', 'like', '%' . $search . '%');
    })->paginate(10);

    return view('admin.index', compact('products', 'search'));
}

    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'image' => 'nullable|image|max:2048',
            'zipFile' => 'nullable|mimes:zip|max:20480' 
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
    
        if ($request->hasFile('image')) {
         
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
    
        if ($request->hasFile('zipFile')) {
            // dd("here");
            $zipPath = $request->file('zipFile')->store('zipFiles', 'public'); 
            $product->zip_file = $zipPath; 
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
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'type' => 'required',
        'image' => 'nullable|image|max:2048',
        'zipFile' => 'nullable|mimes:zip|max:20480'
    ]);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->type = $request->type;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $product->image = $path;
    }

    if ($request->hasFile('zipFile')) {
        $zipPath = $request->file('zipFile')->store('zipFiles', 'public');
        $product->zip_file = $zipPath;
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
    $products = Product::when($search, function ($query, $search) {
        return $query->where('name', 'like', '%' . $search . '%')
                     ->orWhere('description', 'like', '%' . $search . '%');
    })->paginate(10);

    return view('products.index', compact('products', 'search'));
}

}
