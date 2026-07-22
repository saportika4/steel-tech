@extends('layouts.app')

@section('title', 'Home - Steel Tech Engineering & Equipment Solutions')

@section('content')

@push('styles')
    <style>

        .product-categories-home .section-title p {
            max-width: 720px;
            margin-top: 18px;
            color: rgba(255, 255, 255, 0.72);
        }

        .product-categories-home .category-section-cta {
            margin-top: 20px;
        }

        .product-categories-home .category-card-item {
            height: 100%;
            padding: 32px;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.03));
            border: 1px solid rgba(255,255,255,0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.35s ease;
            backdrop-filter: blur(6px);
        }

        .product-categories-home .category-card-item:hover {
            transform: translateY(-6px);
            border-color: rgba(254, 169, 53, 0.35);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
        }

        .product-categories-home .category-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }

        .product-categories-home .category-badge-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .product-categories-home .category-chip,
        .product-categories-home .category-count {
            display: inline-flex;
            align-items: center;
            min-height: 34px;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 13px;
            line-height: 1;
        }

        .product-categories-home .category-chip {
            background: rgba(254, 169, 53, 0.14);
            color: #fea935;
            border: 1px solid rgba(254, 169, 53, 0.2);
        }

        .product-categories-home .category-count {
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.8);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .product-categories-home .category-meta-list {
            margin-bottom: 14px;
        }

        .product-categories-home .category-meta-list li a {
            font-size: 14px;
            color: #fea935;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .product-categories-home .service-item-content-prime h2 {
            margin-bottom: 16px;
        }

        .product-categories-home .service-item-content-prime h2 a {
            color: #fff;
        }

        .product-categories-home .service-item-content-prime p {
            color: rgba(255,255,255,0.72);
            margin-bottom: 0;
            min-height: 78px;
        }

        .product-categories-home .category-card-footer {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .product-categories-home .readmore-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .product-categories-home .readmore-btn::after {
            content: '→';
            font-size: 16px;
            transition: transform 0.25s ease;
        }

        .product-categories-home .category-card-item:hover .readmore-btn::after {
            transform: translateX(4px);
        }

        .product-categories-home .service-item-no-prime h2 {
            color: rgba(255,255,255,0.12);
            font-size: 52px;
            line-height: 1;
            margin: 0;
        }

        .product-categories-home .category-footer-strip {
            margin-top: 24px;
            padding: 24px 30px;
            border-radius: 22px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .product-categories-home .category-footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
            text-align: center;
        }

        .product-categories-home .category-footer-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(254, 169, 53, 0.12);
            border: 1px solid rgba(254, 169, 53, 0.18);
            flex-shrink: 0;
        }

        .product-categories-home .category-footer-icon img {
            max-width: 22px;
        }

        .product-categories-home .category-footer-strip p {
            margin: 0;
            color: rgba(255,255,255,0.8);
        }

        .product-categories-home .category-footer-strip p a {
            color: #fea935;
        }

        .product-categories-home .category-empty-state {
            padding: 60px 20px;
            border-radius: 22px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .product-categories-home .category-empty-state h4 {
            color: #fff;
            margin-bottom: 12px;
        }

        .product-categories-home .category-empty-state p {
            color: rgba(255,255,255,0.72);
            margin-bottom: 22px;
        }

        @media (max-width: 991px) {
            .product-categories-home .category-section-cta {
                text-align: left;
                margin-top: 0;
            }

            .product-categories-home .category-card-item {
                padding: 24px;
            }

            .product-categories-home .service-item-content-prime p {
                min-height: auto;
            }
        }

        @media (max-width: 767px) {
            .product-categories-home .category-card-top {
                margin-bottom: 20px;
            }

            .product-categories-home .service-item-no-prime h2 {
                font-size: 40px;
            }

            .product-categories-home .category-footer-strip {
                padding: 20px;
            }
        }

        .hero-slider-wrapper-prime {
            position: relative;
        }

        .hero-bg-slide-prime {
            position: relative;
            min-height: 760px;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .hero-bg-slide-prime .container {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero-bg-swiper-pagination {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 35px;
            z-index: 10;
            text-align: center;
        }

        .hero-bg-swiper-pagination .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: rgba(255,255,255,0.55);
            opacity: 1;
            margin: 0 6px !important;
        }

        .hero-bg-swiper-pagination .swiper-pagination-bullet-active {
            background: var(--theme-color, #d92626);
        }

        .hero-bg-swiper-prev,
        .hero-bg-swiper-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255,255,255,0.9);
            z-index: 10;
            cursor: pointer;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .hero-bg-swiper-prev::after,
        .hero-bg-swiper-next::after {
            font-family: "swiper-icons";
            font-size: 16px;
            color: #111;
            line-height: 48px;
            display: block;
            text-align: center;
        }

        .hero-bg-swiper-prev {
            left: 25px;
        }

        .hero-bg-swiper-next {
            right: 25px;
        }

        .hero-bg-swiper-prev::after {
            content: 'prev';
        }

        .hero-bg-swiper-next::after {
            content: 'next';
        }

        @media (max-width: 991px) {
            .hero-bg-slide-prime {
                min-height: 620px;
            }
        }

        @media (max-width: 767px) {
            .hero-bg-slide-prime {
                min-height: 560px;
                background-position: center center;
            }

            .hero-bg-swiper-prev,
            .hero-bg-swiper-next {
                display: none;
            }

            .hero-bg-swiper-pagination {
                bottom: 20px;
            }
        }
        .business-partners-grid-prime {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .business-partner-item-prime {
            flex: 1 1 300px;
            max-width: 350px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .business-partner-item-prime:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .business-partner-logo-prime {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90px;
            margin-bottom: 25px;
        }

        .business-partner-logo-prime img {
            max-height: 70px;
            max-width: 180px;
            object-fit: contain;
        }

        .business-partner-content-prime h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .business-partner-content-prime p {
            font-size: 14px;
            margin: 0;
            opacity: 0.85;
        }

        @media (max-width: 767px) {
            .business-partner-item-prime {
                flex: 1 1 100%;
            }
        }
        .service-network-grid-prime {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .service-network-item-prime {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 28px 24px;
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            transition: all 0.35s ease;
        }

        .service-network-item-prime:hover {
            border-color: var(--theme-color, #d92626);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-6px);
        }

        .service-network-icon-prime {
            flex-shrink: 0;
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(217, 38, 38, 0.08);
            color: var(--theme-color, #d92626);
            font-size: 20px;
        }

        .service-network-content-prime {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .service-network-badge-prime {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--theme-color, #d92626);
        }

        .service-network-content-prime h3 {
            font-size: 18px;
            margin: 0;
        }

        .service-network-content-prime h3 a {
            color: inherit;
        }

        .service-network-content-prime h3 a:hover {
            color: var(--theme-color, #d92626);
        }

        @media (max-width: 991px) {
            .service-network-grid-prime {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575px) {
            .service-network-grid-prime {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

    <!-- Hero Section Start -->
    <div class="hero-slider-wrapper-prime">
        <div class="swiper heroBgSwiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <section class="hero-prime dark-section hero-bg-slide-prime"
                        style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/about/home1-2.webp') }}');">
                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="hero-content-prime">
                                        <div class="section-title">
                                            <span class="section-sub-title wow fadeInUp">Built for Precision Fabrication</span>
                                            <h1 class="text-anime-style-3" data-cursor="-opaque">
                                                Reliable CNC Fiber Laser Machines for Fabricators, OEMs and Engineering Teams
                                            </h1>
                                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                                Discover precision-built VN-J machines with expert support for machine selection, commissioning, training, and nationwide service response.
                                            </p>
                                        </div>

                                        <div class="hero-content-footer-prime wow fadeInUp" data-wow-delay="0.4s">
                                            <div class="hero-btn-prime">
                                                <a href="{{ route('products') }}" class="btn-default btn-highlighted">Explore Machines</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="swiper-slide">
                    <section class="hero-prime dark-section hero-bg-slide-prime"
                        style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/about/home3.webp') }}');">
                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="hero-content-prime">
                                        <div class="section-title">
                                            <span class="section-sub-title wow fadeInUp">Authorized VN-J Partner in India</span>
                                            <h1 class="text-anime-style-3" data-cursor="-opaque">
                                                Precision CNC Fiber Laser Cutting Machines for Modern Industry
                                            </h1>
                                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                                Steel Tech Engineering & Equipment Solutions supplies advanced VN-J fiber laser cutting machines with complete sales, installation, operator training, and after-sales support across India.
                                            </p>
                                        </div>

                                        <div class="hero-content-footer-prime wow fadeInUp" data-wow-delay="0.4s">
                                            <div class="hero-btn-prime">
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get a Free Quote</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="swiper-slide">
                    <section class="hero-prime dark-section hero-bg-slide-prime"
                        style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/about/hero3.webp') }}');">
                        <div class="container">
                            <div class="row align-items-end">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="hero-content-prime">
                                        <div class="section-title">
                                            <span class="section-sub-title wow fadeInUp">Pan India Sales & Service Support</span>
                                            <h1 class="text-anime-style-3" data-cursor="-opaque">
                                                Advanced Laser Cutting Solutions Backed by Local Engineering Teams
                                            </h1>
                                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                                From consultation and installation to training and after-sales support, Steel Tech delivers dependable CNC laser solutions tailored for industrial fabrication across India.
                                            </p>
                                        </div>

                                        <div class="hero-content-footer-prime wow fadeInUp" data-wow-delay="0.4s">
                                            <div class="hero-btn-prime">
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Talk To Our Experts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            <div class="hero-bg-swiper-pagination"></div>
            <div class="hero-bg-swiper-prev"></div>
            <div class="hero-bg-swiper-next"></div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Steel Tech Section Start -->
    <div class="about-us-prime">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">About Steel Tech</span>
                        <h2 class="text-effect" data-wow-delay="0.2s" data-cursor="-opaque">Bringing internationally engineered <span class="about-title-images-prime"><img src="{{ asset('assets/images/author-1.jpg') }}" alt=""><img src="{{ asset('assets/images/author-2.jpg') }}" alt=""><img src="{{ asset('assets/images/author-3.jpg') }}" alt=""></span> laser cutting to India</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="about-us-item-list-prime">
                        <div class="about-us-item-prime">
                            <div class="about-us-item-content-prime wow fadeInUp">
                                <p>Steel Tech Engineering & Equipment Solutions is the authorized business partner of VN-J Precision Mechanics Corporation in India, supplying advanced CNC Fiber Laser Cutting Machines with complete sales, installation, operator training, and after-sales support.</p>
                                <ul>
                                    <li>Offices across Bangalore, Kochi, Coimbatore, Chennai, Hyderabad, Ahmedabad & Surat</li>
                                    <li>Trained mechanical, electrical & electronics engineers</li>
                                </ul>
                            </div>

                            <div class="about-us-counter-box-prime wow fadeInUp" data-wow-delay="0.2s">
                                <h2><span class="counter">7</span>+</h2>
                                <h3>Cities across India with dedicated local technical support</h3>
                            </div>
                        </div>

                        <div class="about-us-image-box-prime wow fadeInUp">
                            <div class="about-us-image-prime">
                                <figure>
                                    <img src="{{ asset('assets/images/about/home4.webp') }}" alt="Steel Tech Facility">
                                </figure>
                            </div>

                            {{-- <div class="watch-video-circle-prime">
                                <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video bg-effect" data-cursor-text="Play">
                                    <img src="{{ asset('assets/images/watch-video-circle.svg') }}" alt="">
                                </a>
                            </div> --}}
                        </div>

                        <div class="about-us-info-box-prime">
                            <div class="about-us-info-item-list-prime">
                                <div class="about-us-info-item-prime wow fadeInUp">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-industry"></i>
                                    </div>
                                    <div class="about-us-info-item-content-prime">
                                        <h3>VN-J Precision Mechanics Corp</h3>
                                        <p>One of Vietnam's pioneers in designing & manufacturing CNC Fiber Laser Cutting Machines.</p>
                                    </div>
                                </div>

                                <div class="about-us-info-item-prime wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-screwdriver-wrench"></i>
                                    </div>
                                    <div class="about-us-info-item-content-prime">
                                        <h3>End-to-End Local Support</h3>
                                        <p>Machine consultation, configuration, installation, training, maintenance & spare parts support.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="about-us-btn-prime wow fadeInUp" data-wow-delay="0.4s">
                                <a href="{{ route('about') }}" class="btn-default">More About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Steel Tech Section End -->

    <!-- Why Choose Steel Tech Section Start -->
    <div class="why-choose-us-prime">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <div class="section-title">
                        <span class="section-sub-title">Why Choose Steel Tech</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">India's trusted authorized VN-J partner</h2>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="section-content-btn">
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Backed by experienced sales engineers, local service teams, and genuine spare parts support, we deliver reliable and customized laser cutting solutions Pan India.</p>
                        </div>

                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('contact') }}" class="btn-default">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="why-choose-us-content-prime">
                        <div class="why-choose-us-items-list-prime">
                            <div class="why-choose-us-item-prime wow fadeInUp">
                                <div class="why-choose-item-content-prime">
                                    <h3><span class="counter">7</span>+</h3>
                                    <p>Cities with local installation & service engineers.</p>
                                </div>
                                <div class="icon-box">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </div>
                                <div class="why-choose-item-bg-icon-prime">
                                    <img src="{{ asset('assets/images/icon-why-choose-bg-1-prime.svg') }}" alt="">
                                </div>
                            </div>

                            <div class="why-choose-us-item-prime wow fadeInUp" data-wow-delay="0.2s">
                                <div class="why-choose-item-content-prime">
                                    <h3><span class="counter">7</span>+</h3>
                                    <p>Machine series covering sheet, tube & combination cutting.</p>
                                </div>
                                <div class="icon-box">
                                    <i class="fa-solid fa-gears"></i>
                                </div>
                                <div class="why-choose-item-bg-icon-prime">
                                    <img src="{{ asset('assets/images/icon-why-choose-bg-2-prime.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="why-choose-review-box-prime wow fadeInUp" data-wow-delay="0.4s">
                            <div class="why-choose-review-item-prime">
                                <p>" Authorized VN-J partner delivering genuine machines, spare parts, and reliable after-sales support across India. "</p>
                                <h3>Steel Tech Engineering Team</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="why-choose-us-image-prime">
                        <figure class="image-anime reveal">
                            <img src="{{ asset('assets/images/about/home3.webp') }}" alt="Laser Cutting Machine">
                        </figure>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="why-choose-us-footer-prime wow fadeInUp" data-wow-delay="0.2s">
                        <div class="why-choose-us-footer-list-prime">
                            <ul>
                                <li>Experienced Sales Engineers</li>
                                <li>Installation & Operator Training</li>
                                <li>Genuine Spare Parts</li>
                                <li>Competitive Pricing</li>
                            </ul>
                        </div>

                        <div class="section-footer-text section-satisfy-img">
                            <div class="satisfy-client-images">
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image add-more">
                                    <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                                </div>
                            </div>
                            <p>Let's make something great work together. - <a href="{{ route('contact') }}">Get Free Quote</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Steel Tech Section End -->

    <!-- Product Categories Section Start -->
    <div class="our-services-prime dark-section product-categories-home">
        <div class="container">
            <div class="row section-row align-items-end">
                <div class="col-lg-8">
                    <div class="section-title">
                        <span class="section-sub-title wow fadeInUp">Product Categories</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">
                            CNC Fiber Laser Cutting Machine Series
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            Explore our machine categories built for fabrication, sheet processing, tube cutting, and industrial metalworking applications.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <div class="category-section-cta wow fadeInUp" data-wow-delay="0.3s">
                        <a href="{{ route('products') }}" class="btn-default">View All Products</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @forelse($categories as $index => $category)
                    @php
                        $productCount = $category->products_count ?? $category->products?->count() ?? 0;
                        $shortDescription = $category->description
                            ? \Illuminate\Support\Str::limit(strip_tags($category->description), 115)
                            : 'Precision-engineered laser cutting systems designed for demanding industrial production environments.';
                    @endphp

                    <div class="col-xl-4 col-md-6">
                        <div class="service-item-prime category-card-item wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s">
                            <div class="category-card-top">
                                <div class="category-badge-wrap">
                                    <span class="category-chip">Machine Category</span>
                                    <span class="category-count">{{ str_pad($productCount, 2, '0', STR_PAD_LEFT) }} Models</span>
                                </div>

                                <div class="service-item-no-prime">
                                    <h2>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h2>
                                </div>
                            </div>

                            <div class="service-item-content-prime">
                                <ul class="category-meta-list">
                                    <li>
                                        <a href="{{ route('products', ['category' => $category->slug]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                </ul>

                                <h2>
                                    <a href="{{ route('products', ['category' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                </h2>

                                <p>{{ $shortDescription }}</p>
                            </div>

                            <div class="service-item-btn-prime category-card-footer">
                                <a href="{{ route('products', ['category' => $category->slug]) }}" class="readmore-btn">
                                    Explore Category
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="category-empty-state text-center wow fadeInUp">
                            <h4>Product categories coming soon</h4>
                            <p>We are organizing our machine range and category pages for a better browsing experience.</p>
                            <a href="{{ route('products') }}" class="btn-default">Browse All Products</a>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($categories->count())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-footer-text category-footer-strip wow fadeInUp" data-wow-delay="0.6s">
                            <div class="category-footer-content">
                                <div class="category-footer-icon">
                                    <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="Contact icon">
                                </div>
                                <p>
                                    Need help choosing the right laser cutting machine for your application?
                                    <a href="{{ route('contact') }}">Talk to our team</a>
                                    or
                                    <a href="{{ route('products') }}">view the complete range</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Product Categories Section End -->

    <!-- Industries Served Section Start -->
    <div class="our-impact-prime">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Industries Served</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Built for every metal fabrication industry</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">VN-J fiber laser cutting machines are trusted across sheet metal, structural steel, electrical, medical, automotive & heavy engineering sectors.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="impact-item-prime wow fadeInUp">
                        <div class="impact-item-header-prime">
                            <ul>
                                <li>Fabrication</li>
                            </ul>
                        </div>
                        <div class="impact-item-body-prime">
                            <div class="icon-box">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <div class="impact-item-content-prime">
                                <h2>Sheet Metal</h2>
                                <p>Sheet Metal Fabrication, Electrical Panel & Cabinet Production, Steel Structure Fabrication.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="impact-item-prime wow fadeInUp" data-wow-delay="0.2s">
                        <div class="impact-item-header-prime">
                            <ul>
                                <li>Engineering</li>
                            </ul>
                        </div>
                        <div class="impact-item-body-prime">
                            <div class="icon-box">
                                <i class="fa-solid fa-industry"></i>
                            </div>
                            <div class="impact-item-content-prime">
                                <h2>Heavy Engineering</h2>
                                <p>Construction, Industrial Equipment, Automotive Components & Heavy Engineering.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="impact-item-prime wow fadeInUp" data-wow-delay="0.4s">
                        <div class="impact-item-header-prime">
                            <ul>
                                <li>Specialty</li>
                            </ul>
                        </div>
                        <div class="impact-item-body-prime">
                            <div class="icon-box">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <div class="impact-item-content-prime">
                                <h2>Medical & Decorative</h2>
                                <p>Medical Equipment, Decorative Metal Fabrication & Artistic Iron Works.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <p><span>Free</span>Stainless Steel & Mild Steel Processing - <a href="{{ route('contact') }}">Talk To Our Engineers.</a></p>
                        <ul>
                            <li><span class="counter">13</span></li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Industries Served</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Industries Served Section End -->

     <!-- Testimonial Section Start -->
    <div class="our-testimonials dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Our Testimonials</span>
                        <h2 class="text-anime-style-3" data-cursor-opaque>What customers say about Steel Tech</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider wow fadeInUp">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-header">
                                            <div class="testimonial-item-rating">
                                                <p>5.0 Review</p>
                                                <span class="testimonial-item-rating-star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>
                                            <div class="testimonial-item-content">
                                                <p>“I have been working with Steeltech Lasers for the past 2 years. I have received the best quality CNC Laser cutting works with timely delivery.”</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-author-box">
                                            <div class="testimonial-author-content">
                                                <h2>Benson Gipson</h2>
                                                <p>Google Review</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-header">
                                            <div class="testimonial-item-rating">
                                                <p>5.0 Review</p>
                                                <span class="testimonial-item-rating-star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>
                                            <div class="testimonial-item-content">
                                                <p>“Only authorised dealer of Accurl CNC machine in South India, very good people also, and good service.”</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-author-box">
                                            <div class="testimonial-author-content">
                                                <h2>Flycut CNC</h2>
                                                <p>Google Review</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-header">
                                            <div class="testimonial-item-rating">
                                                <p>5.0 Review</p>
                                                <span class="testimonial-item-rating-star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>
                                            <div class="testimonial-item-content">
                                                <p>“Good service provided for laser and bending machine.”</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-author-box">
                                            <div class="testimonial-author-content">
                                                <h2>SUDHEESH KUMAR S</h2>
                                                <p>Google Review</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-item-header">
                                            <div class="testimonial-item-rating">
                                                <p>5.0 Review</p>
                                                <span class="testimonial-item-rating-star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>
                                            <div class="testimonial-item-content">
                                                <p>“Clear and detailed information about any query. Great.”</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-author-box">
                                            <div class="testimonial-author-content">
                                                <h2>Jaiz L</h2>
                                                <p>Google Review</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.2s">
                        <div class="satisfy-client-images">
                            <div class="satisfy-client-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/images/author-1.jpg') }}" alt="Steel Tech customer feedback">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="Contact Steel Tech">
                            </div>
                        </div>
                        <p>Trusted by fabrication and machinery customers across India. <a href="{{ route('contact') }}">Talk to our team.</a></p>
                        <ul>
                            <li><span class="counter">4.9</span></li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Based on Google Reviews</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Business Partners Section Start -->
    <div class="our-benefits-prime light-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Business Partners</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Trusted partnerships behind every machine</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Steel Tech is proud to be the authorized business partner of leading precision machinery manufacturers, bringing internationally engineered solutions to India.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Business Partners Grid Start -->
                    <div class="business-partners-grid-prime wow fadeInUp" data-wow-delay="0.2s">
                        <div class="business-partner-item-prime">
                            <div class="business-partner-logo-prime">
                                <img src="{{ asset('assets/images/logo/vn-j-corp.png') }}" alt="VN-J Precision Mechanics Corporation">
                            </div>
                            <div class="business-partner-content-prime">
                                <h3>VN-J Precision Mechanics</h3>
                                <p>Authorized partner supplying CNC Fiber Laser Cutting Machines across India.</p>
                            </div>
                        </div>

                        <div class="business-partner-item-prime">
                            <div class="business-partner-logo-prime">
                                <img src="{{ asset('assets/images/logo/accurl-logo-gray.webp') }}" alt="Accurl">
                            </div>
                            <div class="business-partner-content-prime">
                                <h3>Accurl</h3>
                                <p>Authorized dealer for Accurl sheet metal processing machinery.</p>
                            </div>
                        </div>

                        <div class="business-partner-item-prime">
                            <div class="business-partner-logo-prime">
                                <img src="{{ asset('assets/images/logo/harsle-black.png') }}" alt="Harsle">
                            </div>
                            <div class="business-partner-content-prime">
                                <h3>Harsle</h3>
                                <p>Authorized dealer for Harsle precision fabrication equipment.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Business Partners Grid End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Business Partners Section End -->

    <div class="our-projects">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-xl-6">
                    <div class="section-title">
                        <span class="section-sub-title wow fadeInUp">Service Network</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Pan India installation & service support</h2>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="section-content-btn">
                        <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                            <p>Steel Tech operates from Bangalore (Head Office), Kochi, Coimbatore, Chennai, Hyderabad, Ahmedabad & Surat with trained local engineers for rapid response.</p>
                        </div>

                        <div class="section-btn wow fadeInUp" data-wow-delay="0.4s">
                            <a class="btn-default" href="{{ route('contact') }}">Find Nearest Office</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Service Network Grid Start -->
                    <div class="service-network-grid-prime">
                        @foreach(['Bangalore' => 'Head Office', 'Kochi' => 'Service Center', 'Coimbatore' => 'Service Center', 'Chennai' => 'Service Center', 'Hyderabad' => 'Service Center', 'Ahmedabad' => 'Service Center', 'Surat' => 'Service Center'] as $city => $label)
                        <div class="service-network-item-prime wow fadeInUp">
                            <div class="service-network-icon-prime">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="service-network-content-prime">
                                <span class="service-network-badge-prime">{{ $label }}</span>
                                <h3><a href="{{ route('contact') }}">{{ $city }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Service Network Grid End -->
                </div>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.4s">
                        <div class="satisfy-client-images">
                            <div class="satisfy-client-image">
                                <figure class="image-anime">
                                    <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                            </div>
                        </div>
                        <p>Let's make something great work together. <a href="{{ route('contact') }}">Get Free Quote</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Network Section End -->

    <!-- Contact CTA Section Start -->
    <div class="cta-box-prime dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-xl-12">
                    <div class="cta-title-box-prime">
                        <div class="section-title section-title-center">
                            <span class="section-sub-title wow fadeInUp">Contact Us</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Talk to our laser cutting machine experts</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Get machine consultation, configuration assistance, installation, training & after-sales support from our Pan India engineering team.</p>
                        </div>

                        <div class="cta-title-box-list-prime wow fadeInUp" data-wow-delay="0.4s">
                            <ul>
                                <li>Free machine consultation & configuration</li>
                                <li>Installation, training & maintenance support</li>
                                <li>Genuine VN-J spare parts nationwide</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="get-in-touch-box-prime wow fadeInUp">
                        <div class="get-in-touch-image-prime">
                            <figure>
                                <img src="{{ asset('assets/images/get-in-touch-image-prime.png') }}" alt="">
                            </figure>
                        </div>

                        <div class="get-in-touch-form-prime">
                            <div class="section-title">
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Get In Touch</h2>
                            </div>

                            <form id="homeContactForm" action="{{ route('contact.submit') }}" method="POST" data-toggle="validator" class="contact-form wow fadeInUp" data-wow-delay="0.2s">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Tell us about your requirement..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" id="homeSubmitBtn" class="btn-default">
                                            <span class="btn-text">Submit Message</span>
                                            <span class="btn-loader d-none">
                                                <i class="fa fa-spinner fa-spin"></i>
                                                Sending...
                                            </span>
                                        </button>

                                        <div id="homeMsgSubmit" class="h5 text-center" style="margin-top:20px;"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="cta-location-box-prime wow fadeInUp" data-wow-delay="0.2s">
                        <div class="cta-location-box-header-prime">
                            <div class="cta-location-box-content-prime">
                                <h3>We Are Present Across India</h3>
                                <p>Bangalore, Kochi, Coimbatore, Chennai, Hyderabad, Ahmedabad & Surat.</p>
                            </div>
                            <div class="cta-location-box-btn-prime">
                                <a href="{{ route('contact') }}" class="readmore-btn">View All Locations</a>
                            </div>
                        </div>
                        <div class="cta-location-box-image-prime">
                            <figure>
                                <img src="{{ asset('assets/images/cta-location-box-image-prime.png') }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact CTA Section End -->

    @push('scripts')

    <script>
        $('#homeContactForm').on('submit', function (e) {

            e.preventDefault();

            let $form = $(this);
            let $btn = $('#homeSubmitBtn');

            $btn.prop('disabled', true);
            $btn.find('.btn-text').addClass('d-none');
            $btn.find('.btn-loader').removeClass('d-none');

            $('#homeMsgSubmit').html('');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),

                success: function (response) {

                    $form[0].reset();

                    $('#homeMsgSubmit')
                        .removeClass()
                        .addClass('text-success')
                        .html(response.message);
                },

                error: function (xhr) {

                    let message = 'Something went wrong.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }

                    $('#homeMsgSubmit')
                        .removeClass()
                        .addClass('text-danger')
                        .html(message);
                },

                complete: function () {

                    $btn.prop('disabled', false);
                    $btn.find('.btn-loader').addClass('d-none');
                    $btn.find('.btn-text').removeClass('d-none');
                }
            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.heroBgSwiper', {
                loop: true,
                effect: 'slide',
                speed: 1000,
                grabCursor: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.hero-bg-swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.hero-bg-swiper-next',
                    prevEl: '.hero-bg-swiper-prev'
                }
            });
        });
    </script>

    @endpush

@endsection
