@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <h2 class="mb-0">Edit Product</h2>
    </div>
    <div class="card-body px-4 py-5">
        <form action="{{ route('upcoming-products.update', $upcomingProduct->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $upcomingProduct->name }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="picture" class="form-label">Product Picture</label>
                <input type="file" name="picture" id="picture" class="form-control-file">
                <img src="{{ asset('storage/' . $upcomingProduct->picture) }}" alt="{{ $upcomingProduct->name }}" class="img-thumbnail mt-3" style="max-width: 150px;">
            </div>
            <div class="form-group form-check mb-4">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ $upcomingProduct->is_active ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Is Active</label>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Update Product</button>
        </form>
    </div>
</div>
@endsection
