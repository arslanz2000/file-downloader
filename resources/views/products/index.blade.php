@extends('layouts.app')

@section('content')
<div class="container listing-background">
    <h1 class="mb-4 text-center">Product Listing</h1>
    
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search products" class="form-control">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 mb-4">
            <div class="card horizontal-card shadow-sm border-light" style="background-image: url('{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}'); background-size: cover; background-position: center;">
                
                <div class="card-overlay d-flex flex-column justify-content-between p-3">
                    <div>
                        <h5 class="card-title text-white">{{ $product->name }}</h5>
                        <p class="card-text text-white">{{ $product->description }}</p>
                    </div>
                    <div>
                        <p class="card-text text-white"><strong>Price: </strong>${{ $product->price }}</p>
                        <p class="card-text text-white"><strong>Type: </strong>{{ $product->type }}</p>

                        @if($product->zip_file)
                            <a href="{{ asset('storage/' . $product->zip_file) }}" class="btn btn-light" download>Download Zip File</a>
                        @else
                            <p class="text-muted">No Zip File Available</p>
                        @endif
                    </div>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

<style>
    .horizontal-card {
        height: 200px;
        display: flex;
        flex-direction: row;
        background-color: rgba(0, 0, 0, 0.6); /* Dark overlay to improve text visibility */
    }

    .card-overlay {
        background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
        color: white;
        width: 100%;
        height: 100%;
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card-text {
        font-size: 1rem;
    }
</style>
@endsection
