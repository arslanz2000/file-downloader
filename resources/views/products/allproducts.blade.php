@extends('layouts.app')

@section('content')
    <div class="container listing-background" style="margin: auto;">
        @foreach ($products as $product)
        <div class="col mb-4">
            <div class="card horizontal-card shadow-sm border-light d-flex flex-row"
                onclick="window.location='{{ route('products.show', $product->id) }}'">
                <div class="card-image" style="width: 110px; height: 90px;">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/100x100?text=No+Image' }}"
                        alt="{{ $product->name }}" class="img-fluid"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
    
                <div class="card-body d-flex flex-row m-auto p-3">
                    <div class="product-info">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
    
                    <div class="product-details products-border">
                        <p class="card-text">
                            <img src="{{ asset('storage/logos/windowsBlue.png') }}" alt="Logo" class="logo" />
                            {{ $product->type }}
                        </p>
                    </div>
    
                    <div class="product-details products-border">
                        @if ($product->zip_file)
                            <a href="{{ asset('storage/logos/android-black') }}" class="btn btn-light" download>Download Zip File</a>
                        @else
                            <p class="text-muted">No Zip File Available</p>
                        @endif
                    </div>
    
                    <div class="product-details products-border">
                        <h5 class="card-title">{{ floor($product->price) }} MB</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    {{-- <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div> --}}

    <style>
        .listing-background {
            margin: 0px;
            padding: 0px;
            background: #f8f9fa;
        }

        .horizontal-card {
            height: 100px;
            display: flex;
            flex-direction: row;
            background-color: #fff;
            cursor: pointer;
        }

        .card-title {
            font-size: 16px;
            color: #2b373a;
        }

        .card-text {
            font-size: 12px;
            color: #666666;
        }

        .card-image {
            padding: 5px 10px;
        }

        .product-info .card-title,
        .product-info .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-info {
            width: 300px;
            margin-right: 20px;
        }

        .product-details {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .products-border {
            border-left: 2px solid #ebebeb;
        }

        .pagination-container {
            margin-top: 20px;
        }

        /* Pagination Styling */
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a, .pagination li span {
            color: #0859D7;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination li a:hover {
            background-color: #0859D7;
            color: #fff;
        }

        .pagination .active span {
            background-color: #0859D7;
            color: #fff;
            border-color: #0859D7;
        }

        .pagination .disabled span {
            color: #999;
            background-color: #f8f9fa;
            border-color: #ddd;
        }
    </style>
@endsection
