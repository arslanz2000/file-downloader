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

    // dd($request);

 $request->validate([
 'name' => 'required',
 'description' => 'required',
 'price' => 'required|numeric',
 'type' => 'required',
 'image' => 'nullable|image|max:2048',
 'zipFile' => 'nullable|mimes:zip|max:20480',
 'file_name' => 'nullable|string',
 'created_by' => 'nullable|string',
 'version' => 'nullable|string',
 'license_type' => 'nullable|string',
 'change_log' => 'nullable|string',
 'languages' => 'nullable|string',
 'total_downloads' => 'nullable|integer',
 'uploaded_by' => 'nullable|string',
 'sub_category' => 'nullable|string',
 'main_image' => 'nullable|image|max:2048',
 'overview' => 'nullable|string',
 'features' => 'nullable|array',
 'system_requirements' => 'nullable|array', 
]);

 $product = new Product();
 $product->name = $request->name;
 $product->description = $request->description;
 $product->price = $request->price;
 $product->type = $request->type;
 $product->file_name = $request->file_name;
 $product->created_by = $request->created_by;
 $product->version = $request->version;
 $product->license_type = $request->license_type;
 $product->change_log = $request->change_log;
 $product->languages = $request->languages;
 $product->total_downloads = $request->total_downloads;
 $product->uploaded_by = $request->uploaded_by;
 $product->sub_category = $request->sub_category;
 $product->overview = $request->overview;

 if ($request->hasFile('image')) {
 $path = $request->file('image')->store('images', 'public');
 $product->image = $path;
 }

 if ($request->hasFile('main_image')) {
 $mainImagePath = $request->file('main_image')->store('main_images', 'public');
 $product->main_image = $mainImagePath;
 }

 if ($request->hasFile('zipFile')) {
 $zipPath = $request->file('zipFile')->store('zipFiles', 'public');
 $product->zip_file = $zipPath;
 }

 $product->features = $request->features ? implode("\n", $request->features) : null;
 $product->system_requirements = $request->system_requirements ? implode("\n", $request->system_requirements) : null;

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

$product->file_name = $request->file_name;
$product->created_by = $request->created_by;
$product->version = $request->version;
$product->license_type = $request->license_type;
$product->change_log = $request->change_log;
$product->languages = $request->languages;
$product->total_downloads = $request->total_downloads;
$product->uploaded_by = $request->uploaded_by;
$product->sub_category = $request->sub_category;

if ($request->hasFile('main_image')) {
    $mainImagePath = $request->file('main_image')->store('main_images', 'public');
    $product->main_image = $mainImagePath;
}

$product->overview = $request->overview;
$product->features = $request->features ? str_replace("\r\n", "\n", $request->features) : null;
$product->system_requirements = $request->system_requirements ? str_replace("\r\n", "\n", $request->system_requirements) : null;

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

        $windowsProducts = Product::where('type', 'Windows')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $macProducts = Product::where('type', 'Mac')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $androidAppsProducts = Product::where('type', 'Android Apps')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $androidGamesProducts = Product::where('type', 'Android Games')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $pcGamesProducts = Product::where('type', 'PC Games')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $ebooksProducts = Product::where('type', 'Ebooks')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();

        $videoCoursesProducts = Product::where('type', 'Video Courses')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })->orderBy('created_at', 'desc')->take(10)->get();


        return view('products.index', compact(
            'windowsProducts',
            'macProducts',
            'androidAppsProducts',
            'androidGamesProducts',
            'pcGamesProducts',
            'ebooksProducts',
            'videoCoursesProducts',
            'search'
        ));
    }
    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}

public function allproduct(Request $request, $type = null)
{
    if ($type) {
        $products = Product::where('type', $type)->get();
    // } else {
    //     $products = Product::paginate(10);
    }
    return view('products.allproducts', compact('products', 'type'));
}


}
