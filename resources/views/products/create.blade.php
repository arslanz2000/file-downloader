<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" id="short_description" class="form-control" required>{{ $product->short_description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
            @if(isset($product) && $product->icon)
                <img src="{{ Storage::url($product->icon) }}" class="mt-2" width="100" alt="{{ $product->name }}">
            @endif
        </div>

        {{-- <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="windows" {{ (isset($product) && $product->category == 'windows') ? 'selected' : '' }}>
                    Windows
                </option>
                <option value="mac" {{ (isset($product) && $product->category == 'mac') ? 'selected' : '' }}>
                    Mac
                </option>
                <option value="android-games" {{ (isset($product) && $product->category == 'android-games') ? 'selected' : '' }}>
                    Android Games
                </option>
                <option value="pc-games" {{ (isset($product) && $product->category == 'pc-games') ? 'selected' : '' }}>
                    PC Games
                </option>
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}" 
                        {{ isset($product) && $product->category == $category->name ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="additional_tags" class="form-label">Additional Tags</label>
            <select name="additional_tags" id="additional_tags" class="form-control">
                <option value="" {{ (isset($product) && is_null($product->additional_tags)) ? 'selected' : '' }}>
                    -- Select an Option --
                </option>
                <option value="popular" {{ (isset($product) && $product->additional_tags == 'popular') ? 'selected' : '' }}>
                    Popular
                </option>
                <option value="mostview" {{ (isset($product) && $product->additional_tags == 'mostview') ? 'selected' : '' }}>
                    Most View
                </option>
                <option value="new" {{ (isset($product) && $product->additional_tags == 'new') ? 'selected' : '' }}>
                    New
                </option>
            </select>
        </div>
        
        

        <div class="mb-3">
            <label for="subcategory" class="form-label">Subcategory</label>
            <input type="text" name="subcategory" id="subcategory" class="form-control" value="{{ $product->subcategory ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="launch_date" class="form-label">Launch Date</label>
            <input type="date" name="launch_date" id="launch_date" class="form-control" value="{{ $product->launch_date ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" min="0" max="5" name="rating" id="rating" class="form-control" value="{{ $product->rating ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input type="text" name="size" id="size" class="form-control" value="{{ $product->size ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="download_link" class="form-label">Download Link</label>
            <input type="url" name="download_link" id="download_link" class="form-control" value="{{ $product->download_link ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active</label>
            <select name="is_active" id="is_active" class="form-control" required>
                <option value="1" {{ isset($product) && $product->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ isset($product) && !$product->is_active ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="version" class="form-label">Version</label>
            <input type="text" name="version" id="version" class="form-control" value="{{ $product->version ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="version_details" class="form-label">Version Details</label>
            <textarea name="version_details" id="version_details" class="form-control">{{ $product->version_details ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <input type="text" name="language" id="language" class="form-control" value="{{ $product->language ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="pass_code" class="form-label">Pass Code</label>
            <input type="text" name="pass_code" id="pass_code" class="form-control" value="{{ $product->pass_code ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="display_picture" class="form-label">Display Picture</label>
            <input type="file" name="display_picture" id="display_picture" class="form-control" accept="image/*">
            @if(isset($product) && $product->display_picture)
                <img src="{{ Storage::url($product->display_picture) }}" class="mt-2" width="100" alt="{{ $product->name }}">
            @endif
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea name="details" id="details" class="form-control">{{ $product->details ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control" value="{{ $product->tags ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="seo_title" class="form-label">SEO Title</label>
            <input type="text" name="seo_title" id="seo_title" class="form-control" value="{{ $product->seo_title ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="seo_description" class="form-label">SEO Description</label>
            <textarea name="seo_description" id="seo_description" class="form-control">{{ $product->seo_description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="seo_tags" class="form-label">SEO Tags</label>
            <input type="text" name="seo_tags" id="seo_tags" class="form-control" value="{{ $product->seo_tags ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Add' }} Product</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
