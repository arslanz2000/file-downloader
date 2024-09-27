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
