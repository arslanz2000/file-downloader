<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- TinyMCE Script -->
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#details',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar: 'undo redo | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent',
            height: 300,
            menubar: false,
            branding: false,
            font_size_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt 64pt', 
            font_family_formats: 'Arial=arial,helvetica,sans-serif; Times New Roman=times new roman,times; Courier New=courier new,courier,monospace; Verdana=verdana,geneva,sans-serif;', // Custom font families
            content_style: 'body { font-family: Arial, sans-serif; font-size: 14pt; }',
        });
    </script>     
    
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
                        <label for="short_description">Short Description:</label>
                        <textarea name="short_description" id="short_description" class="form-control" rows="3" required>{{ $product->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="icon">Upload Icon:</label>
                        <input type="file" name="icon" id="icon" class="form-control-file" accept="image/*">
                        @if($product->icon)
                            <img src="{{ Storage::url($product->icon) }}" alt="{{ $product->name }}" class="img-thumbnail mt-3" width="150">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" name="category" id="category" value="{{ $product->category }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="subcategory">Subcategory:</label>
                        <input type="text" name="subcategory" id="subcategory" value="{{ $product->subcategory }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="launch_date">Launch Date:</label>
                        <input type="date" name="launch_date" id="launch_date" value="{{ $product->launch_date }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <input type="number" step="0.1" min="0" max="5" name="rating" id="rating" value="{{ $product->rating }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input type="text" name="size" id="size" value="{{ $product->size }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="download_link">Download Link:</label>
                        <input type="url" name="download_link" id="download_link" value="{{ $product->download_link }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="is_active">Is Active:</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$product->is_active ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="version">Version:</label>
                        <input type="text" name="version" id="version" value="{{ $product->version }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="version_details">Version Details:</label>
                        <textarea name="version_details" id="version_details" class="form-control" rows="3">{{ $product->version_details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="language">Language:</label>
                        <input type="text" name="language" id="language" value="{{ $product->language }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pass_code">Pass Code:</label>
                        <input type="text" name="pass_code" id="pass_code" value="{{ $product->pass_code }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="display_picture">Upload Display Picture:</label>
                        <input type="file" name="display_picture" id="display_picture" class="form-control-file" accept="image/*">
                        @if($product->display_picture)
                            <img src="{{ Storage::url($product->display_picture) }}" alt="{{ $product->name }}" class="img-thumbnail mt-3" width="150">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="details">Details:</label>
                        <textarea name="details" id="details" class="form-control" rows="4">{{ $product->details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" id="tags" value="{{ $product->tags }}" class="form-control">
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
