@extends('layouts.app')

@section('content')
    <div class="container show-product">
        <div class="row">
            <div class="col-md-8 show-product-details">
                <h2 class="product-name">{{ $product->name }}</h2>
                <p class="card-text">{{ $product->description }}</p>
                <div class="row">
                    <div class="product-listing-main-image">
                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : 'https://via.placeholder.com/100x100?text=No+Image' }}"
                            alt="{{ $product->name }}" class="img-fluid" style="width: 100%">
                    </div>
                    <h2 class="product-details" style="display: block">Overview of {{ $product->name }}</h2>
                    <p>{{ $product->overview }}</p>
                    <h2 class="product-details" style="display: block">Technical Details and System Requirements</h2>
                    <ul style="margin-left: 25px;">
                        @foreach (explode("\n", $product->system_requirements) as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    <h2 class="product-details" style="display: block">Features of {{ $product->features }}</h2>
                    <ul style="margin-left: 25px;">
                        @foreach (explode("\n", $product->features) as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-info">
                    <h2>Product Information</h2>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>File Name:</strong>
                        <div class="file_right_align">{{ $product->file_name }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Created By:</strong>
                        <div class="file_right_align">{{ $product->created_by }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Version:</strong>
                        <div class="file_right_align">{{ $product->version }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>License Type:</strong>
                        <div class="file_right_align">{{ $product->license_type }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Change Log:</strong>
                        <div class="file_right_align">{{ $product->change_log }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Languages:</strong>
                        <div class="file_right_align">{{ $product->languages }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Total Downloads:</strong>
                        <div class="file_right_align">{{ $product->total_downloads }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item d-flex">
                        <strong>Uploaded By:</strong>
                        <div class="file_right_align">{{ $product->uploaded_by }}</div>
                    </div>
                    <div class="bottom-line"></div>
                    <div class="info-item">
                        <a href="#">MS Office Activator</a>,
                        <a href="#">Windows Activator</a>
                    </div>
                </div>


                <div class="product-info mt-5">
                    <div class="file-size text-center">
                        <span class="size-number">1.07</span><span class="size-unit">GB</span>
                    </div>
                    <div class="file-rating" style="justify-content: center;">
                        <span class="rating-score">{{ $product->rating }}</span>
                        <span class="rating-count">({{ $product->rating_count }})</span>
                        <div class="star-rating">
                            @php
                                $fullStars = floor($product->rating);
                                $halfStar = ($product->rating - $fullStars) >= 0.5 ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                    
                            @if ($halfStar)
                                <i class="fas fa-star-half-alt"></i>
                            @endif
                    
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div>
                        @if ($product->zip_file)
                                        <a href="{{ asset('storage/logos/android-black') }}" class=""
                                        style="width: 100%;color: #fff;background: #00856f;margin: 30px 0px 10px;font-weight: bold;padding: 10px 0px;display: block;text-align: center;"
                                            download>Download Zip File</a>
                                    @else
                                        <p class="text-muted">No Zip File Available</p>
                                    @endif
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

    <style>
        body {
            background: #f8f9fa;
        }

        .show-product {
            margin-top: 50px;
        }

        .show-product-details {
            background: #fff;
            border: 1px solid #ebebeb;
            border-radius: 5px;
            padding: 15px 30px 25px;
        }

        .product-name {
            font-weight: 600;
            line-height: 1;
            margin: 10px 0 20px;
        }

        .product-details {
            font-weight: 600;
            line-height: 1;
            margin: 10px 0 20px;
            font-size: 24px
        }

        .product-listing-main-image {
            margin: auto;
        }

        .img-fluid {
            margin: 30px 0px;

        }


        .product-info {
            /* width: 300px; */
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #f8f8f8;
            margin-left: 35px;
            background: #fff;
        }

        .product-info h2 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .info-item strong {
            font-weight: bold;
        }

        a {
            color: #008000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .bottom-line {
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }

        .file_right_align {
            margin-left: auto;
        }


        .file-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .file-size {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        .file-size .size-number {
            font-size: 42px;
            font-weight: 700;
            color: #333;
        }

        .file-size .size-unit {
            font-size: 20px;
            font-weight: 700;
            color: #333;
        }

        .file-rating {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-score {
            background-color: #8b5e3c;
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }

        .rating-count {
            font-size: 14px;
            color: #666;
        }


        .star-rating {
            color: #ffc107;
            display: flex;
        }

        .star-rating i {
            font-size: 18px;
            margin-right: 2px;
        }

        .star-rating i:last-child {
            color: #e0e0e0;
        }
    </style>
@endsection
