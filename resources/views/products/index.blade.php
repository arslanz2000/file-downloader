@extends('layouts.app')

@section('content')
    <div class="container-fluid listing-background">
        <form action="{{ route('products.index') }}" method="GET" class="file-downloader-form">
            <div style="display: flex; margin-left: 130px; margin-top: 20px; margin-bottom: 20px;">
            <div>
                <img src="{{ asset('storage/logos/seers.png') }}" alt="Logo" class="logo" />
            </div>
            <div class="file-downloader-input-group input-group">
                <button type="submit" class="btn btn-primary" style="background: #0859D7 !important"><i
                        class="fa fa-search"></i></button>
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search products"
                    class="form-control">
            </div>
            </div>
            <div class="file-downloader-nav">
                <div></div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/windows-black.png') }}" alt="Logo" class="logo" />
                    Windows
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/mac-os-black.png') }}" alt="Logo" class="logo" />
                    Mac
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/android-black.png') }}" alt="Logo" class="logo" />
                    Android Apps
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/android-black.png') }}" alt="Logo" class="logo" />
                    Android Games
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/joystick.png') }}" alt="Logo" class="logo" />
                    PC Games
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/open-book.png') }}" alt="Logo" class="logo" />
                    Ebooks
                </div>
                <div class="file-downloader-nav-category">
                    <img src="{{ asset('storage/logos/streaming.png') }}" alt="Logo" class="logo" />
                    Video Courses
                </div>
                <div style="border: none !important"></div>
            </div>
        </form>

        <div class="row file-downloader-content-row">
            <div class="col-1"></div>
            <div class="col-7">
                <div class="mb-3 p-2" style="display: flex; align-items: center; width: 100%; border: 1px solid #ddd; border-left: 8px solid #0859D7; background: #fff;">
                    <h5 style="margin-left:10px;">Windows</h5>
                    <button class="btn btn-light" style="margin-left: auto;">View All</button>
                </div>
                
                @foreach ($products as $product)
                    <div class="col mb-4">
                        <div class="card horizontal-card shadow-sm border-light d-flex flex-row">
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
                                        <img src="{{ asset('storage/logos/windowsBlue.png') }}" alt="Logo"
                                            class="logo" />
                                        {{ $product->type }}
                                    </p>
                                </div>

                                <div class="product-details products-border">
                                    @if ($product->zip_file)
                                        <a href="{{ asset('storage/logos/android-black') }}" class="btn btn-light"
                                            download>Download Zip File</a>
                                    @else
                                        <p class="text-muted">No Zip File Available</p>
                                    @endif
                                </div>

                                <div class="product-details products-border">
                                    <h5 class="card-title   ">{{ floor($product->price) }} MB</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-3">
                <div class="right-box">
                    <h4>PC Games</h4>
                    <hr>
                    @foreach ($products as $product)
                        <div class="d-flex mb-4">
                            <div
                                style="width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                <img
                                    src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/60x60?text=No+Image' }}"
                                    alt="{{ $product->name }}" class="img-fluid"
                                    style="width: 60px; height: 60px; object-fit: cover;">
                                </div>
                            <div class="ml-2" style="width: 70%;">
                                <h5 class="card-title mb-1"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $product->name }}
                                    </h5>
                                <p class="card-text mb-1" style="color: #0859D7; font-weight: bold;">{{ $product->type }}</p>
                                <h5 class="card-title">{{ floor($product->price) }} MB</h5>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
    <script>
        document.querySelectorAll('.file-downloader-nav-category').forEach(function(category) {
            const img = category.querySelector('img');
            const originalSrc = img.src;
            const hoverSrc = originalSrc.replace('-black', '-white');

            category.addEventListener('mouseenter', function() {
                img.src = hoverSrc;
            });

            category.addEventListener('mouseleave', function() {
                img.src = originalSrc;
            });
        });
    </script>
    <style>
        .listing-background {
            margin: 0px;
            padding: 0px;
            background: #f8f9fa;
        }

        .file-downloader-form {
            padding: 10px 0px 35px;
        }

        .file-downloader-content-row {
            background: #f8f9fa;
        }

        .horizontal-card {
            height: 100px;
            display: flex;
            flex-direction: row;
            background-color: #fff;
            /* margin-left: 120px; */
        }

        .card-overlay {
            background-color: #fff;
            color: white;
            width: 100%;
            height: 100%;
        }

        .card-title {
            font-size: 16px;
            color: #2b373a;
        }

        .card-text {
            font-size: 12px;
            color: #666666
        }

        .file-downloader-input-group {
            width: 40%;
            margin-left: 20px;
            
        }

        .file-downloader-nav {
            display: flex;
            width: 100%;
            justify-content: space-between;
            border-bottom: 1px solid #ebebeb;
            border-top: 1px solid #ebebeb;

        }

        .file-downloader-nav div {
            flex: 1;
            text-align: center;
            padding: 30px 10px;
            box-sizing: border-box;
            color: var(--color-text, #2b373a);
            cursor: pointer;
            text-transform: capitalize;
            transition: background-color .25s ease;
            white-space: nowrap;
            letter-spacing: .15px;
            line-height: 1.6;
            border-right: 1px solid #ebebeb;
            font-weight: bold;
            background: #fff;
            font-size: 14px;
        }

        .file-downloader-nav-category {
            justify-content: center;
            display: flex;
            align-items: center;
        }

        .file-downloader-nav-category:hover {
            color: #fff;
            background: #0859D7;
        }


        .logo {
            width: 1em;
            height: auto;
            margin-right: 0.5em;
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

        .card-body {
            display: flex;
            width: 100%;
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

        .right-box {
            height: 525px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        .logo {
            width: 1.5em;
            height: auto;
            margin-right: 0.5em;
        }
    </style>
@endsection
