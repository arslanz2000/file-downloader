@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Add New Product</h2>
    </div>
    <div class="card-body px-4 py-5">
        <form action="{{ route('upcoming-products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="picture" class="form-label">Product Picture</label>
                <input type="file" name="picture" id="picture" class="form-control-file" required>
            </div>
            <div class="form-group form-check mb-4">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                <label for="is_active" class="form-check-label">Is Active</label>
            </div>
            <button type="submit" class="btn btn-success btn-block">Save Product</button>
        </form>
    </div>
</div>
@endsection
