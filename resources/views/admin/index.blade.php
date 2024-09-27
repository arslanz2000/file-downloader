@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Panel - Manage Products</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Search products">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>

    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Discription</th>
            <th>Image</th>
            <th>Price</th>
            <th>Type</th>
            <th>Zip File</th> <!-- New column for Zip file -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->type }}</td>
            <td>
                @if ($product->zip_file)
                    <a href="{{ Storage::url($product->zip_file) }}" class="btn btn-info" download>Download Zip</a>
                @else
                    No Zip File
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $products->links() }}
</div>
@endsection
