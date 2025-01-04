@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Panel - Manage Products</h1>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Search products" aria-label="Search products">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="fas fa-search"></i> Search
            </button>
        </div>
    </form>

    <!-- Add New Product Button -->
    <a href="{{ route('products.create') }}" class="btn btn-success mb-4">
        <i class="fas fa-plus"></i> Add New Product
    </a>

    <!-- Products Table -->
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td class="text-center">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 50px; height: 50px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->category }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection