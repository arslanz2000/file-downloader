<form action="{{ route('products.index') }}" method="GET" class="file-downloader-form">
    <div style="display: flex; margin-left: 130px; margin-top: 20px; margin-bottom: 20px;">
        {{-- <div>
            <img src="{{ asset('storage/logos/seers.png') }}" alt="Logo" class="logo" />
        </div> --}}
        <div class="file-downloader-input-group input-group">
            <button type="submit" class="btn btn-primary" style="background: #0859D7 !important"><i
                    class="fa fa-search"></i></button>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search products"
                class="form-control">
        </div>
    </div>
    <div class="file-downloader-nav">
        <div></div>
        <div data-url="{{ route('products.category', 'Windows') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/windows-black.png') }}" alt="Logo" class="logo" />
            Windows
        </div>
        <div data-url="{{ route('products.category', 'Mac') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/mac-os-black.png') }}" alt="Logo" class="logo" />
            Mac
        </div>
        <div data-url="{{ route('products.category', 'Android Apps') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/android-black.png') }}" alt="Logo" class="logo" />
            Android Apps
        </div>
        <div data-url="{{ route('products.category', 'Android Games') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/android-black.png') }}" alt="Logo" class="logo" />
            Android Games
        </div>
        <div data-url="{{ route('products.category', 'PC Games') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/joystick.png') }}" alt="Logo" class="logo" />
            PC Games
        </div>
        <div data-url="{{ route('products.category', 'Ebooks') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/open-book.png') }}" alt="Logo" class="logo" />
            Ebooks
        </div>
        <div data-url="{{ route('products.category', 'Video Courses') }}" class="file-downloader-nav-category clickable">
            <img src="{{ asset('storage/logos/streaming.png') }}" alt="Logo" class="logo" />
            Video Courses
        </div>
        <div style="border: none !important"></div>
    </div>
</form>

<script>
    document.querySelectorAll('.clickable').forEach(item => {
        item.addEventListener('click', () => {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
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
    cursor: pointer;
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