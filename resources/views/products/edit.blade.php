<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="card-title">Edit Product</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Product Type:</label>
                        <input type="text" name="type" id="type" value="{{ $product->type }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="zipFile">Upload Zip File:</label>
                        <input type="file" name="zipFile" id="zipFile" class="form-control-file" accept=".zip">
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Product Image:</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-3" width="150">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="file_name">File Name:</label>
                        <input type="text" name="file_name" id="file_name" value="{{ $product->file_name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="created_by">Created By:</label>
                        <input type="text" name="created_by" id="created_by" value="{{ $product->created_by }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="version">Version:</label>
                        <input type="text" name="version" id="version" value="{{ $product->version }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="license_type">License Type:</label>
                        <input type="text" name="license_type" id="license_type" value="{{ $product->license_type }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="change_log">Change Log:</label>
                        <textarea name="change_log" id="change_log" class="form-control" rows="4">{{ $product->change_log }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="languages">Languages:</label>
                        <input type="text" name="languages" id="languages" value="{{ $product->languages }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="total_downloads">Total Downloads:</label>
                        <input type="number" name="total_downloads" id="total_downloads" value="{{ $product->total_downloads }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="uploaded_by">Uploaded By:</label>
                        <input type="text" name="uploaded_by" id="uploaded_by" value="{{ $product->uploaded_by }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sub_category">Sub Category:</label>
                        <input type="text" name="sub_category" id="sub_category" value="{{ $product->sub_category }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="main_image">Upload Main Image:</label>
                        <input type="file" name="main_image" id="main_image" class="form-control-file">
                        @if($product->main_image)
                            <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-3" width="150">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="overview">Overview:</label>
                        <textarea name="overview" id="overview" class="form-control" rows="4">{{ $product->overview }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="features">Features:</label>
                        <textarea name="features" id="features" class="form-control" rows="4">{{ str_replace('\n', "\n", $product->features) }}</textarea>
                        <small class="form-text text-muted">Please enter each feature on a new line.</small>
                    </div>

                    <div class="form-group">
                        <label for="system_requirements">System Requirements:</label>
                        <textarea name="system_requirements" id="system_requirements" class="form-control" rows="4">{{ str_replace('\n', "\n", $product->system_requirements) }}</textarea>
                        <small class="form-text text-muted">Please enter each requirement on a new line.</small>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
