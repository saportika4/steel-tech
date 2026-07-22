@extends('layouts.app')

@section('title', $product->name . ' - Steel Tech Engineering & Equipment Solutions')

@push('styles')
<style>
    .product-single-section {
        padding: 100px 0;
    }

    .product-single-image {
        position: sticky;
        top: 120px;
        border-radius: 20px;
        overflow: hidden;
        background: #f5f5f5;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    }

    .product-single-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .product-info-card,
    .product-content-card,
    .product-spec-card,
    .product-list-card {
        background: #fff;
        border: 1px solid rgba(0,0,0,0.08);
        border-radius: 18px;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.04);
    }

    .product-overline {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(217, 38, 38, 0.08);
        color: var(--theme-color, #d92626);
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 18px;
    }

    .product-title-main {
        font-size: 42px;
        line-height: 1.2;
        margin-bottom: 16px;
    }

    .product-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-top: 24px;
    }

    .product-meta-item {
        padding: 18px 20px;
        border-radius: 14px;
        background: #f8f8f8;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .product-meta-item span {
        display: block;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        color: #777;
        margin-bottom: 6px;
    }

    .product-meta-item h6 {
        margin: 0;
        font-size: 17px;
        line-height: 1.5;
    }

    .product-section-title {
        font-size: 28px;
        margin-bottom: 18px;
    }

    .product-copy {
        color: #666;
        line-height: 1.9;
        font-size: 16px;
    }

    .product-feature-list,
    .product-model-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 14px;
    }

    .product-feature-list li,
    .product-model-list li {
        position: relative;
        padding: 14px 18px 14px 48px;
        background: #fafafa;
        border: 1px solid rgba(0,0,0,0.06);
        border-radius: 14px;
        color: #444;
        font-weight: 500;
    }

    .product-feature-list li::before,
    .product-model-list li::before {
        content: "✓";
        position: absolute;
        left: 18px;
        top: 14px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(217, 38, 38, 0.10);
        color: var(--theme-color, #d92626);
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
    }

    .product-spec-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-spec-table tr:not(:last-child) td {
        border-bottom: 1px solid rgba(0,0,0,0.08);
    }

    .product-spec-table td {
        padding: 16px 14px;
        vertical-align: top;
    }

    .product-spec-table td:first-child {
        width: 34%;
        font-weight: 700;
        color: #1a1a1a;
    }

    .product-spec-table td:last-child {
        color: #666;
    }

    .product-contact-box {
        padding: 30px;
        border-radius: 18px;
        background: #111;
        color: #fff;
    }

    .product-contact-box h4 {
        color: #fff;
        margin-bottom: 14px;
    }

    .product-contact-box p {
        color: rgba(255,255,255,0.75);
        margin-bottom: 22px;
    }

    .related-products-wrap {
        margin-top: 60px;
    }

    .related-product-card {
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 12px 30px rgba(0,0,0,0.06);
        height: 100%;
    }

    .related-product-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .related-product-content {
        padding: 20px;
    }

    .related-product-content span {
        display: block;
        font-size: 13px;
        color: var(--theme-color, #d92626);
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .related-product-content h5 {
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .related-product-content p {
        color: #666;
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .product-single-image {
            position: static;
            margin-bottom: 30px;
        }

        .product-title-main {
            font-size: 32px;
        }
    }

    @media (max-width: 767px) {
        .product-single-section {
            padding: 70px 0;
        }

        .product-meta-grid {
            grid-template-columns: 1fr;
        }

        .product-info-card,
        .product-content-card,
        .product-spec-card,
        .product-list-card {
            padding: 22px;
        }

        .product-section-title {
            font-size: 24px;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $product->name }}</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-single-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="product-single-image wow fadeInUp">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="product-info-card wow fadeInUp">
                    <span class="product-overline">{{ $product->category->name ?? 'Product Series' }}</span>
                    <h2 class="product-title-main">{{ $product->name }}</h2>

                    @if(!empty($product->description))
                        <div class="product-copy">
                            {{ $product->description }}
                        </div>
                    @endif

                    <div class="product-meta-grid">
                        @if($product->manufacturer)
                            <div class="product-meta-item">
                                <span>Manufacturer</span>
                                <h6>{{ $product->manufacturer }}</h6>
                            </div>
                        @endif

                        @if($product->machine_type)
                            <div class="product-meta-item">
                                <span>Machine Type</span>
                                <h6>{{ $product->machine_type }}</h6>
                            </div>
                        @endif

                        <div class="product-meta-item">
                            <span>Category</span>
                            <h6>{{ $product->category->name ?? 'N/A' }}</h6>
                        </div>

                        <div class="product-meta-item">
                            <span>Status</span>
                            <h6>{{ $product->is_active ? 'Available' : 'Unavailable' }}</h6>
                        </div>
                    </div>
                </div>

                @if(!empty($product->applications) && is_array($product->applications))
                    <div class="product-list-card wow fadeInUp" data-wow-delay="0.2s">
                        <h3 class="product-section-title">Applications</h3>
                        <ul class="product-feature-list">
                            @foreach($product->applications as $application)
                                @if(!empty($application))
                                    <li>{{ $application }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(!empty($product->available_models) && is_array($product->available_models))
                    <div class="product-list-card wow fadeInUp" data-wow-delay="0.4s">
                        <h3 class="product-section-title">Available Models</h3>
                        <ul class="product-model-list">
                            @foreach($product->available_models as $model)
                                @if(!empty($model))
                                    <li>{{ $model }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="product-contact-box wow fadeInUp" data-wow-delay="0.6s">
                    <h4>Need expert help choosing the right machine?</h4>
                    <p>Talk to our team for product recommendations, technical details, pricing, and the right machine configuration for your production requirements.</p>
                    <a href="{{ route('contact') }}" class="btn-default">Enquire Now</a>
                </div>
            </div>
        </div>

        @if(!empty($product->specifications) && is_array($product->specifications))
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="product-spec-card wow fadeInUp">
                        <h3 class="product-section-title">Technical Specifications</h3>
                        <table class="product-spec-table">
                            <tbody>
                                @foreach($product->specifications as $spec)
                                    @if(!empty($spec['label']) || !empty($spec['value']))
                                        <tr>
                                            <td>{{ $spec['label'] ?? '-' }}</td>
                                            <td>{{ $spec['value'] ?? '-' }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if($relatedProducts->count())
            <div class="related-products-wrap">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <div class="section-title section-title-center">
                            <span class="section-sub-title wow fadeInUp">Related Products</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Explore more machine series</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($relatedProducts as $related)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="related-product-card wow fadeInUp">
                                <a href="{{ route('products.show', $related->slug) }}">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}">
                                </a>
                                <div class="related-product-content">
                                    <span>{{ $related->category->name ?? 'Product' }}</span>
                                    <h5>
                                        <a href="{{ route('products.show', $related->slug) }}">{{ $related->name }}</a>
                                    </h5>
                                    @if($related->manufacturer)
                                        <p>{{ $related->manufacturer }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
