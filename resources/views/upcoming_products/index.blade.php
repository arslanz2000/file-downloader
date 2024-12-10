@extends('layouts.app')

@section('title', 'All Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Upcoming Products</h1>
    <a href="{{ route('upcoming-products.create') }}" class="btn btn-primary">Add New Product</a>
</div>

@if($products->isEmpty())
    <div class="alert alert-info">No products found. Add one now!</div>
@else
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Picture</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('upcoming-products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('upcoming-products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
