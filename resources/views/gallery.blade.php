@extends('layouts.app')

@section('title', 'Image Gallery - Steel Tech Engineering & Equipment Solutions')

@section('content')

    <!-- Page Header Section Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Image gallery</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Image gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Photo Gallery Start -->
    <div class="page-gallery">
        <div class="container">
            <div class="row gallery-items page-gallery-box" id="galleryItemsRow" data-next-page="1" data-loading="0">
                {{-- Images injected here via AJAX --}}
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-loader-prime" id="galleryLoader" style="display:none; text-align:center; padding:40px 0; font-size:15px;">
                        <i class="fa-solid fa-spinner fa-spin" style="margin-right:8px;"></i> Loading more images...
                    </div>
                    <div class="gallery-empty-prime" id="galleryEmpty" style="display:none; text-align:center; padding:40px 0;">
                        <p>No gallery images available yet.</p>
                    </div>
                    <div class="gallery-end-prime" id="galleryEnd" style="display:none; text-align:center; padding:30px 0; color:#999; font-size:14px;">
                        <p>You've reached the end of the gallery.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Photo Gallery End -->

@endsection

@push('styles')
<style>
    .photo-gallery { position: relative; }
    .gallery-caption-overlay {
        position: absolute; left: 0; right: 0; bottom: 0; padding: 16px 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0));
        color: #ffffff; opacity: 0; transition: opacity 0.35s ease; pointer-events: none;
    }
    .photo-gallery:hover .gallery-caption-overlay { opacity: 1; }
    .gallery-caption-overlay h5 { font-size: 15px; margin-bottom: 4px; color: #ffffff; }
    .gallery-caption-overlay p { font-size: 12px; margin: 0; opacity: 0.9; }
    @media (max-width: 575px) { .gallery-caption-overlay { opacity: 1; } }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const row = document.getElementById('galleryItemsRow');
    const loader = document.getElementById('galleryLoader');
    const emptyBox = document.getElementById('galleryEmpty');
    const endBox = document.getElementById('galleryEnd');

    let currentPage = 1;
    let hasMore = true;
    let isLoading = false;
    const delays = ['0s', '0.2s', '0.4s', '0.6s', '0.8s', '1s', '1.2s', '1.4s', '1.6s'];

    const sentinel = document.createElement('div');
    sentinel.id = 'gallerySentinel';
    sentinel.style.height = '1px';
    sentinel.style.width = '100%';
    row.parentNode.appendChild(sentinel);

    function cardTemplate(item, index) {
        const delay = delays[index % delays.length];
        const caption = (item.title || item.description) ? `
            <div class="gallery-caption-overlay">
                ${item.title ? `<h5>${item.title}</h5>` : ''}
                ${item.description ? `<p>${item.description}</p>` : ''}
            </div>` : '';

        return `
        <div class="col-lg-4 col-6">
            <div class="photo-gallery wow fadeInUp" data-wow-delay="${delay}">
                <a href="${item.image}" data-cursor-text="View">
                    <figure class="image-anime">
                        <img src="${item.image}" alt="${item.title || 'Gallery image'}" loading="lazy">
                    </figure>
                </a>
                ${caption}
            </div>
        </div>`;
    }

    function loadImages() {
        if (isLoading || !hasMore) return;

        isLoading = true;
        loader.style.display = 'block';
        emptyBox.style.display = 'none';
        observer.unobserve(sentinel);

        fetch(`{{ route('gallery.ajax') }}?page=${currentPage}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            const images = Array.isArray(data.images) ? data.images : [];

            if (images.length === 0 && currentPage === 1) {
                emptyBox.style.display = 'block';
            } else {
                images.forEach((item, idx) => {
                    row.insertAdjacentHTML('beforeend', cardTemplate(item, idx));
                });
            }

            hasMore = !!data.has_more;
            currentPage = Number(data.next_page || (currentPage + 1));
            isLoading = false;
            loader.style.display = 'none';

            if (!hasMore) {
                endBox.style.display = 'block';
                observer.disconnect();
                return;
            }

            observer.observe(sentinel);

            if (window.WOW) {
                new WOW().init();
            }
        })
        .catch(() => {
            isLoading = false;
            loader.style.display = 'none';
            observer.observe(sentinel);
        });
    }

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isLoading && hasMore) {
            loadImages();
        }
    }, {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0
    });

    observer.observe(sentinel);
    loadImages();
});
</script>
@endpush
