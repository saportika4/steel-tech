@extends('layouts.app')

@section('title', 'Home - Steel Tech Engineering & Equipment Solutions')

@section('content')

@push('styles')
    <style>
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
    <div class="hero-prime dark-section parallaxie">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="hero-content-prime">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">Authorized VN-J Partner in India</span>
                            <h1 class="text-anime-style-3" data-cursor="-opaque">Precision CNC Fiber Laser Cutting Machines for Modern Industry</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Steel Tech Engineering & Equipment Solutions supplies advanced VN-J fiber laser cutting machines with complete sales, installation, operator training, and after-sales support across India.</p>
                        </div>

                        <div class="hero-content-footer-prime wow fadeInUp" data-wow-delay="0.4s">
                            <div class="hero-btn-prime">
                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Get a Free Quote</a>
                            </div>

                            {{-- <div class="video-play-button-prime" data-cursor-text="Play">
                                <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video">
                                    <span><i class="fa-solid fa-play"></i></span>
                                    <p>Watch Our Story</p>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
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
    <div class="our-services-prime dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Product Categories</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">VN-J CNC Fiber Laser Cutting Machine Series</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($categories as $index => $category)
                <div class="col-xl-4 col-md-6">
                    <div class="service-item-prime wow fadeInUp" data-wow-delay="{{ ($index % 3) * 0.2 }}s">
                        <div class="service-item-content-prime">
                            <ul>
                                <li><a href="{{ route('products.category', $category->slug) }}">CNC Laser Cutting</a></li>
                            </ul>
                            <h2><a href="{{ route('products.category', $category->slug) }}">{{ $category->name }}</a></h2>
                            <p>{{ $category->description ?? 'Precision engineered VN-J laser cutting machines for industrial fabrication.' }}</p>
                        </div>

                        <div class="service-item-btn-prime">
                            <a href="{{ route('products.category', $category->slug) }}" class="readmore-btn">View Models</a>
                        </div>

                        <div class="service-item-no-prime">
                            <h2>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h2>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <p class="text-center">Product categories coming soon.</p>
                </div>
                @endforelse

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.6s">
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
                        <p>Explore our complete machine range. <a href="{{ route('products') }}">View all products</a></p>
                    </div>
                </div>
            </div>
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

    @endpush

@endsection
