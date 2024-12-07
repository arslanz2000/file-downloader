<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <h1 class="mb-4">{{ isset($product) ? 'Edit' : 'Add' }} Product</h1>

    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $product->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Select Type</option>
                <option value="Windows" {{ (isset($product) && $product->type == 'Windows') ? 'selected' : '' }}>Windows</option>
                <option value="Mac" {{ (isset($product) && $product->type == 'Mac') ? 'selected' : '' }}>Mac</option>
                <option value="Android Apps" {{ (isset($product) && $product->type == 'Android Apps') ? 'selected' : '' }}>Android Apps</option>
                <option value="Android Games" {{ (isset($product) && $product->type == 'Android Games') ? 'selected' : '' }}>Android Games</option>
                <option value="PC Games" {{ (isset($product) && $product->type == 'PC Games') ? 'selected' : '' }}>PC Games</option>
                <option value="Ebooks" {{ (isset($product) && $product->type == 'Ebooks') ? 'selected' : '' }}>Ebooks</option>
                <option value="Video Courses" {{ (isset($product) && $product->type == 'Video Courses') ? 'selected' : '' }}>Video Courses</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @if(isset($product) && $product->image)
                <img src="{{ Storage::url($product->image) }}" class="mt-2" width="100" alt="{{ $product->name }}">
            @endif
        </div>

        <div class="mb-3">
            <label for="zipFile" class="form-label">ZIP File</label>
            <input type="file" name="zipFile" id="zipFile" class="form-control" accept=".zip">
        </div>

        <div class="mb-3">
            <label for="file_name" class="form-label">File Name</label>
            <input type="text" name="file_name" id="file_name" class="form-control" value="{{ $product->file_name ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <input type="text" name="created_by" id="created_by" class="form-control" value="{{ $product->created_by ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="version" class="form-label">Version</label>
            <input type="text" name="version" id="version" class="form-control" value="{{ $product->version ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="license_type" class="form-label">License Type</label>
            <input type="text" name="license_type" id="license_type" class="form-control" value="{{ $product->license_type ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="change_log" class="form-label">Change Log</label>
            <textarea name="change_log" id="change_log" class="form-control">{{ $product->change_log ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input type="text" name="languages" id="languages" class="form-control" value="{{ $product->languages ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="total_downloads" class="form-label">Total Downloads</label>
            <input type="number" name="total_downloads" id="total_downloads" class="form-control" value="{{ $product->total_downloads ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="uploaded_by" class="form-label">Uploaded By</label>
            <input type="text" name="uploaded_by" id="uploaded_by" class="form-control" value="{{ $product->uploaded_by ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="sub_category" class="form-label">Sub Category</label>
            <input type="text" name="sub_category" id="sub_category" class="form-control" value="{{ $product->sub_category ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="main_image" class="form-label">Main Image</label>
            <input type="file" name="main_image" id="main_image" class="form-control" accept="image/*">
            @if(isset($product) && $product->main_image)
                <img src="{{ Storage::url($product->main_image) }}" class="mt-2" width="100" alt="{{ $product->name }}">
            @endif
        </div>

        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea name="overview" id="overview" class="form-control">{{ $product->overview ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="features" class="form-label">Features</label>
            <div id="features-container">
                <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature" value="{{ isset($product) ? explode("\n", $product->features)[0] : '' }}">
            </div>
            <button type="button" id="add-feature" class="btn btn-secondary mt-2">Add Another Feature</button>
        </div>

        <div class="mb-3">
            <label for="system_requirements" class="form-label">System Requirements</label>
            <div id="requirements-container">
                <input type="text" name="system_requirements[]" class="form-control mb-2" placeholder="System Requirement" value="{{ isset($product) ? explode("\n", $product->system_requirements)[0] : '' }}">
            </div>
            <button type="button" id="add-requirement" class="btn btn-secondary mt-2">Add Another Requirement</button>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Add' }} Product</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('add-feature').addEventListener('click', function() {
            const container = document.getElementById('features-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'features[]';
            input.className = 'form-control mb-2';
            input.placeholder = 'Feature';
            container.appendChild(input);
        });

        document.getElementById('add-requirement').addEventListener('click', function() {
            const container = document.getElementById('requirements-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'system_requirements[]';
            input.className = 'form-control mb-2';
            input.placeholder = 'System Requirement';
            container.appendChild(input);
        });
    </script>
</body>
</html>
