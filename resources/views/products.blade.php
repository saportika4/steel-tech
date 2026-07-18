@extends('layouts.app')

@section('title', 'Products - Steel Tech Engineering & Equipment Solutions')

@section('content')

@push('styles')
<style>
    .products-filter-bar {
        margin-bottom: 50px;
    }

    .products-filter-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .products-filter-list li {
        margin: 0;
    }

    .products-filter-list .filter-btn {
        display: inline-block;
        padding: 12px 28px;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--main-black-color, #1a1a1a);
        background-color: transparent;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.35s ease;
        font-family: var(--font-primary, inherit);
    }

    .products-filter-list .filter-btn:hover {
        border-color: var(--theme-color, #d92626);
        color: var(--theme-color, #d92626);
    }

    .products-filter-list .filter-btn.active {
        background-color: var(--theme-color, #d92626);
        border-color: var(--theme-color, #d92626);
        color: #ffffff;
    }

    .product-grid-item {
        margin-bottom: 30px;
    }

    .photo-gallery {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    .photo-gallery figure img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .photo-gallery:hover figure img {
        transform: scale(1.08);
    }

    .photo-gallery {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        background: #000;
    }

    .photo-gallery::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.90) 0%,
            rgba(0,0,0,0.65) 35%,
            rgba(0,0,0,0.20) 60%,
            rgba(0,0,0,0) 100%
        );
        z-index: 1;
        pointer-events: none;
    }

    .product-gallery-caption {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 22px;
        color: #fff;
        z-index: 2;
    }

    .product-gallery-caption h3 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        color: #fff;
        text-shadow: 0 2px 8px rgba(0,0,0,.8);
    }

    .product-gallery-caption p {
        margin-top: 6px;
        font-size: 14px;
        font-weight: 500;
        color: rgba(255,255,255,.92);
        text-shadow: 0 2px 6px rgba(0,0,0,.8);
    }

    .product-category{
        margin-top:10px;
        text-align:center;
        font-size:14px;
        font-weight:600;
        color:#666;
    }

    .product-gallery-caption h3 a {
        color: #ffffff;
    }

    .product-gallery-caption h3 a:hover {
        color: var(--theme-color, #d92626);
    }

    .products-loader {
        font-size: 15px;
        color: var(--main-black-color, #1a1a1a);
    }

    .products-loader i {
        margin-right: 8px;
        color: var(--theme-color, #d92626);
    }

    .products-empty p {
        font-size: 16px;
    }

    @media (max-width: 767px) {
        .products-filter-list {
            justify-content: flex-start;
            overflow-x: auto;
            flex-wrap: nowrap;
            padding-bottom: 10px;
        }

        .products-filter-list .filter-btn {
            white-space: nowrap;
            padding: 10px 20px;
            font-size: 13px;
        }

        .product-grid-item{
            margin-bottom:20px;
        }

        .photo-gallery figure img{
            height:260px;
        }

        .product-gallery-caption{
            padding:16px;
        }

        .product-gallery-caption h3{
            font-size:18px;
            line-height:1.35;

            display:-webkit-box;
            -webkit-line-clamp:3;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }

        .product-gallery-caption p{
            margin-top:8px;
            font-size:13px;
            line-height:1.4;
        }
    }
</style>
@endpush

    <!-- Page Header Section Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our Products</h1>
                        <nav class="wow fadeInUp" >
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Products Filter & Gallery Start -->
    <div class="page-gallery">
        <div class="container">

            <!-- Filter Bar Start -->
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">VN-J Machine Range</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Browse by machine series</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="products-filter-bar wow fadeInUp">
                        <ul class="products-filter-list" id="productsFilter">
                            <li>
                                <button type="button" class="filter-btn active" data-slug="">All Products</button>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <button type="button" class="filter-btn" data-slug="{{ $category->slug }}">{{ $category->name }}</button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Filter Bar End -->

            <!-- gallery section start -->
            <div class="row gallery-items page-gallery-box" id="productsGrid" data-next-page="1" data-loading="0">
                {{-- Product cards injected here via AJAX --}}
            </div>
            <!-- gallery section end -->

            <!-- Loader Start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="products-loader text-center" id="productsLoader" style="display:none; padding:30px 0;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Loading more products...
                    </div>

                    <div class="products-empty text-center" id="productsEmpty" style="display:none; padding:30px 0;">
                        <p>No products found in this category.</p>
                    </div>
                </div>
            </div>
            <!-- Loader End -->

        </div>
    </div>
    <!-- Products Filter & Gallery End -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const grid = document.getElementById('productsGrid');
    const loader = document.getElementById('productsLoader');
    const emptyBox = document.getElementById('productsEmpty');

    const urlParams = new URLSearchParams(window.location.search);

    let currentSlug = urlParams.get('category') || '';
    let currentPage = 1;
    let hasMore = true;
    let isLoading = false;

    const filterButtons = document.querySelectorAll('.filter-btn');

    // Set active filter from URL
    filterButtons.forEach(btn => {
        btn.classList.remove('active');

        if (btn.dataset.slug === currentSlug) {
            btn.classList.add('active');
        }
    });

    // If no category in URL, activate "All Products"
    if (!currentSlug) {
        document.querySelector('.filter-btn[data-slug=""]')?.classList.add('active');
    }

    function cardTemplate(product) {
        return `
        <div class="col-lg-4 col-md-6 col-12 product-grid-item">
            <div class="photo-gallery wow fadeInUp">
                <a href="${product.image}" class="image-popup">
                    <figure class="image-anime">
                        <img src="${product.image}" alt="${product.name}">
                    </figure>
                </a>

                <div class="product-gallery-caption">
                    <h3>${product.name}</h3>
                </div>
            </div>

            <div class="product-category">
                ${product.category}
            </div>
        </div>`;
    }

    function initGallery() {
        if ($.fn.magnificPopup) {
            $('.image-popup').magnificPopup('destroy');

            $('.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
                closeOnContentClick: false,
                closeBtnInside: true,
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true,
                    duration: 300
                }
            });
        }
    }

    function loadProducts(reset = false) {
        if (isLoading || (!hasMore && !reset)) return;

        isLoading = true;
        loader.style.display = 'block';
        emptyBox.style.display = 'none';

        const params = new URLSearchParams({
            category: currentSlug,
            page: reset ? 1 : currentPage
        });

        fetch(`{{ route('products.ajax') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {

            if (reset) {
                grid.innerHTML = '';
            }

            if (data.products.length === 0 && reset) {
                emptyBox.style.display = 'block';
            }

            data.products.forEach(product => {
                grid.insertAdjacentHTML('beforeend', cardTemplate(product));
            });

            hasMore = data.has_more;
            currentPage = data.next_page;

            loader.style.display = 'none';
            isLoading = false;

            initGallery();

            if (window.WOW) {
                new WOW().init();
            }
        })
        .catch(error => {
            console.error(error);
            loader.style.display = 'none';
            isLoading = false;
        });
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentSlug = this.dataset.slug;

            const url = new URL(window.location);

            if (currentSlug) {
                url.searchParams.set('category', currentSlug);
            } else {
                url.searchParams.delete('category');
            }

            window.history.replaceState({}, '', url);
            currentPage = 1;
            hasMore = true;

            loadProducts(true);
        });
    });

    let scrollTimeout;

    window.addEventListener('scroll', function () {
        clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(function () {

            const scrollPosition = window.innerHeight + window.scrollY;
            const threshold = document.body.offsetHeight - 400;

            if (scrollPosition >= threshold) {
                loadProducts(false);
            }

        }, 150);
    });

    loadProducts(true);
});
</script>
@endpush
