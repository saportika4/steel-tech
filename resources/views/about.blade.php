@extends('layouts.app')

@section('title', 'About Us - Steel Tech Engineering & Equipment Solutions')

@section('content')

    <!-- Page Header Section Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">About us</h1>
                        <nav class="wow fadeInUp" >
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- About Us Section Start -->
    <div class="about-us">
        <div class="container">
            <div class="row ">
                <div class="col-xl-6">
                    <!-- About Us Image Box Start -->
                    <div class="about-us-image-box wow fadeInUp">
                        <div class="about-us-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/about/about1.png') }}" alt="Steel Tech Engineering & Equipment Solutions">
                            </figure>
                        </div>

                        <div class="about-us-review-box">
                            <div class="about-us-review-box-header">
                                <h2><span class="counter">4.9</span>/5</h2>
                                <span class="google-rating-star">
                                    <i class="fa fa-solid fa-star"></i>
                                    <i class="fa fa-solid fa-star"></i>
                                    <i class="fa fa-solid fa-star"></i>
                                    <i class="fa fa-solid fa-star"></i>
                                    <i class="fa fa-solid fa-star"></i>
                                </span>
                            </div>
                            <div class="about-us-review-box-body">
                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-3.jpg') }}" alt="">
                                        </figure>
                                    </div>

                                    <div class="satisfy-client-image add-more">
                                        <h2><span class="counter">7</span>+</h2>
                                    </div>
                                </div>
                                <div class="satisfy-client-content">
                                    <p>Cities Across India Served</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Us Image Box End -->
                </div>

                <div class="col-xl-6">
                    <!-- About Us Content Start -->
                    <div class="about-us-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">About Steel Tech</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Authorized VN-J partner delivering precision laser cutting</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Steel Tech Engineering & Equipment Solutions is one of India's trusted providers of advanced CNC Fiber Laser Metal Cutting Machines, delivering cutting-edge solutions for the sheet metal fabrication industry. As the exclusive business partner for VN-J in India, we are committed to helping manufacturers enhance productivity, precision, and operational efficiency through world-class laser cutting technology.</p>
                        </div>

                        <div class="about-us-body wow fadeInUp" data-wow-delay="0.4s">
                            <div class="about-us-body-content">
                                <div class="about-us-body-list">
                                    <h3>Every Customer Receives Complete Support</h3>
                                    <ul>
                                        <li>Machine Consultation & Configuration Assistance</li>
                                        <li>Installation, Operator Training & Technical Guidance</li>
                                        <li>Maintenance & Genuine Spare Parts Support</li>
                                    </ul>
                                </div>

                                <div class="about-us-btn">
                                    <a href="{{ route('contact') }}" class="btn-default">Contact Us now</a>
                                </div>
                            </div>

                            <div class="about-experience-box">
                                <div class="about-experience-content">
                                    <h2><span class="counter">7</span>+</h2>
                                    <p>Offices Across Bangalore, Kochi, Coimbatore, Chennai, Hyderabad, Ahmedabad & Surat</p>
                                </div>

                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="{{ asset('assets/images/author-3.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image add-more">
                                        <h2><span class="counter">13</span>+</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Approach Section Start (Company Overview - VN-J) -->
    <div class="our-approach light-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-xl-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Company Overview</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">VN-J Precision Mechanics Corporation</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">One of Vietnam's pioneers in designing and manufacturing CNC Fiber Laser Cutting Machines, emphasizing innovation, precision engineering & continuous product development.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="approach-item wow fadeInUp">
                        <div class="approach-item-header">
                            <div class="icon-box">
                                <img src="{{ asset('assets/images/icon-approach-1.svg') }}" alt="">
                            </div>
                            <div class="approach-item-title">
                                <h2>Sheet Metal Machines</h2>
                            </div>
                        </div>

                        <div class="approach-item-body">
                            <div class="approach-item-body-content">
                                <p>Precision fiber laser cutting machines engineered for high-volume sheet metal fabrication and industrial production.</p>
                            </div>

                            <div class="approach-item-body-list">
                                <ul>
                                    <li>Sheet Metal Laser Cutting Machines</li>
                                    <li>CNC Automation Solutions</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="approach-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="approach-item-header">
                            <div class="icon-box">
                                <img src="{{ asset('assets/images/icon-approach-2.svg') }}" alt="">
                            </div>
                            <div class="approach-item-title">
                                <h2>Tube Cutting Machines</h2>
                            </div>
                        </div>

                        <div class="approach-item-body">
                            <div class="approach-item-body-content">
                                <p>Designed for round, square & rectangular tube processing across furniture, construction & structural steel industries.</p>
                            </div>

                            <div class="approach-item-body-list">
                                <ul>
                                    <li>Tube Laser Cutting Machines</li>
                                    <li>Large Format Steel Tube Cutting</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="approach-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="approach-item-header">
                            <div class="icon-box">
                                <img src="{{ asset('assets/images/icon-approach-3.svg') }}" alt="">
                            </div>
                            <div class="approach-item-title">
                                <h2>Plate & Tube Combination</h2>
                            </div>
                        </div>

                        <div class="approach-item-body">
                            <div class="approach-item-body-content">
                                <p>Dual function machines that combine sheet and tube cutting for multi-purpose, cost-efficient production lines.</p>
                            </div>

                            <div class="approach-item-body-list">
                                <ul>
                                    <li>Plate & Tube Combination Machines</li>
                                    <li>Reduced Production Cost</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.2s">
                        <p><span>Free</span>Precision Meets International Engineering - <a href="{{ route('contact') }}">Talk To Our Team.</a></p>
                        <ul>
                            <li><span class="counter">4.9</span></li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </li>
                            <li>Trusted Pan India</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Approach Section End -->

    <!-- What We Do Section Start (Product Categories) -->
    <div class="what-we-do">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="what-we-image-box">
                        <div class="what-we-image-box-1">
                            <div class="what-we-image">
                                <figure class="image-anime reveal">
                                    <img src="{{ asset('assets/images/what-we-image-1.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="what-we-client-served-box wow fadeInUp">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-what-we-client-served.svg') }}" alt="">
                                </div>
                                <div class="what-we-client-content">
                                    <h2><span class="counter">7</span>+</h2>
                                    <p>Machine Series Available</p>
                                </div>
                            </div>
                        </div>

                        <div class="what-we-image-box-2">
                            <div class="what-we-image">
                                <figure class="image-anime reveal">
                                    <img src="{{ asset('assets/images/what-we-image-2.jpg') }}" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="what-we-content">
                        <div class="section-title">
                            <span class="section-sub-title wow fadeInUp">What We Do</span>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">VN-J CNC fiber laser cutting machine range</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">From full-protective double exchange tables to heavy duty tube cutting, our VN-J machine range covers every fabrication need.</p>
                        </div>

                        <div class="what-we-content-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul>
                                <li>VLF Plus & E Plus Series - Sheet Metal</li>
                                <li>VLF B & G Series - Single & Large Format</li>
                                <li>VLF-T Series - Plate & Tube Combination</li>
                                <li>VLT, VLT-S & VLT-Z Series - Tube Cutting</li>
                            </ul>
                        </div>

                        <div class="what-we-footer wow fadeInUp" data-wow-delay="0.6s">
                            <div class="what-we-btn">
                                <a href="{{ route('products') }}" class="btn-default">View All Machines</a>
                            </div>

                            <div class="about-us-contact-box">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-headphone-white.svg') }}" alt="">
                                </div>
                                <div class="about-us-conatct-content">
                                    <p>Call Us</p>
                                    <h3><a href="tel:++91 9778420010">+91 9778420010</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do Section End -->

    <!-- Global Impact Section Start (Business Locations & Certifications) -->
    <div class="global-impact dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Our Brand Certifications</span>

                        <h2 class="text-anime-style-3">
                            Trusted Partnerships with Global Manufacturing Brands
                        </h2>

                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            Steel Tech is an authorized partner and dealer for globally recognized metal fabrication equipment manufacturers, delivering genuine products backed by certified technical expertise and reliable after-sales support.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="global-impact-list">

                        <!-- Certificate 1 -->
                        <div class="global-impact-item wow fadeInUp">
                            <div class="certificate-card">
                                <img src="{{ asset('assets/images/about/vnj-cert.png') }}" alt="VN-J Authorized Partner">
                            </div>
                        </div>

                        <!-- Certificate 2 -->
                        <div class="global-impact-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="certificate-card">
                                <img src="{{ asset('assets/images/about/accurl-cert.png') }}" alt="Accurl Authorization">
                            </div>
                        </div>

                        <!-- Certificate 3 -->
                        <div class="global-impact-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="certificate-card">
                                <img src="{{ asset('assets/images/about/harsle-cert.png') }}" alt="Harsle Authorization">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="company-slider-box wow fadeInUp">
                        <div class="company-slider-title">
                            <h3>Authorized Partner & Certified Dealer Across India</h3>
                        </div>

                        <div class="company-supports-slider">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('assets/images/logo/vn-j-corp.png') }}" alt="VN-J Precision Mechanics">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('assets/images/logo/accurl-logo-gray.webp') }}" alt="ISO 9001:2015">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('assets/images/logo/harsle.png') }}" alt="Accurl Authorization">
                                        </div>
                                    </div>

                                    {{-- <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('assets/images/company-supports-logo-4.svg') }}" alt="Harsle Authorization">
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="company-supports-logo">
                                            <img src="{{ asset('assets/images/company-supports-logo-5.svg') }}" alt="Authorized Dealer">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Global Impact Section End -->

    <!-- Our Team Section Start (Engineering Team) -->
    {{-- <div class="our-team light-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Our Experts</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Trained engineers supporting every installation</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Our local mechanical, electrical & electronics engineers ensure smooth installation, training & after-sales support at every branch office.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="team-item wow fadeInUp">
                        <div class="team-item-image">
                            <a href="{{ route('about') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('assets/images/team-1.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>

                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('about') }}">Mechanical Engineering Team</a></h2>
                                <p>Machine Installation & Configuration</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item-image">
                            <a href="{{ route('about') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('assets/images/team-2.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>

                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('about') }}">Electrical Engineering Team</a></h2>
                                <p>Power Systems & Machine Wiring</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item-image">
                            <a href="{{ route('about') }}" data-cursor-text="View">
                                <figure>
                                    <img src="{{ asset('assets/images/team-3.jpg') }}" alt="">
                                </figure>
                            </a>
                        </div>

                        <div class="team-item-body">
                            <div class="team-item-content">
                                <h2><a href="{{ route('about') }}">Electronics & Operator Training</a></h2>
                                <p>CNC Programming & Technical Support</p>
                            </div>
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-footer-text section-satisfy-img wow fadeInUp" data-wow-delay="0.2s">
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
                        <p>Let's make something great work together. <a href="{{ route('contact') }}">Get in touch</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Our Team Section End -->

    <!-- Our Faqs Section Start -->
    <div class="our-faqs">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Frequently Asked Questions</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Your questions answered here</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Find answers to common questions about our VN-J laser cutting machines, installation process & after-sales support.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="faq-content wow fadeInUp">
                        <div class="faq-info-item">
                            <div class="icon-box">
                                <img src="{{ asset('assets/images/icon-faq-answer.svg') }}" alt="">
                            </div>
                            <div class="faq-info-content">
                                <h3>Get Answers</h3>
                                <p>Our FAQ section covers common questions about our VN-J machines, installation process & spare parts support.</p>
                            </div>
                        </div>

                        <div class="faq-info-body-box">
                            <div class="faq-info-content">
                                <h3>Contact Information</h3>
                                <p>Have questions about our laser cutting machines or need a custom configuration? Our team is ready to assist you.</p>
                            </div>

                            <div class="faq-contact-list">
                                <div class="faq-contact-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                                    </div>
                                    <div class="faq-contact-item-content">
                                        <h3>Phone Number</h3>
                                        <p><a href="tel:++91 9778420010">+91 9778420010</a></p>
                                    </div>
                                </div>

                                <div class="faq-contact-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('assets/images/icon-location-white.svg') }}" alt="">
                                    </div>
                                    <div class="faq-contact-item-content">
                                        <h3>Our Location</h3>
                                        <p>Kunnukara, Kochi, Kerala, India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="faq-contant-box">
                        <div class="faq-accordion" id="accordion">
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        01. Are you an authorized VN-J dealer?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" role="region" aria-labelledby="heading1" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>Yes, Steel Tech is the authorized business partner of VN-J Precision Mechanics Corporation in India, supplying genuine CNC Fiber Laser Cutting Machines.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        02. Do you provide installation & training?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" role="region" aria-labelledby="heading2" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>Yes, our certified engineers handle professional installation and conduct operator training before machine handover.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        03. Which industries do your machines serve?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" role="region" aria-labelledby="heading3" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>Our machines serve sheet metal fabrication, electrical panels, steel structures, medical equipment, automotive components & heavy engineering, among others.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        04. Do you offer spare parts & maintenance support?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" role="region" aria-labelledby="heading4" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>Yes, we supply genuine VN-J spare parts and provide preventive & corrective maintenance services Pan India.</p>
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
                                    <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                </figure>
                            </div>
                            <div class="satisfy-client-image add-more">
                                <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                            </div>
                        </div>
                        <p>Let's make something great work together. <a href="{{ route('contact') }}">Get in touch.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Faqs Section End -->

@endsection
