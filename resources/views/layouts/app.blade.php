<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <title>@yield('title', 'Steel Tech')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo.webp') }}">
    <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mousecursor.css') }}">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" media="screen">
    <style>
        .brochure-popup-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 10px;
        }

        .brochure-option-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 16px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 14px;
            text-decoration: none;
            background: #fff;
            transition: all 0.3s ease;
            text-align: left;
        }

        .brochure-option-card:hover {
            transform: translateY(-4px);
            border-color: var(--theme-color, #d92626);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .brochure-option-icon {
            width: 52px;
            height: 52px;
            min-width: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(217, 38, 38, 0.08);
            color: var(--theme-color, #d92626);
            font-size: 20px;
        }

        .brochure-option-content h4 {
            margin: 0 0 4px;
            font-size: 18px;
            color: #111;
        }

        .brochure-option-content p {
            margin: 0;
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }

        .brochure-swal-popup {
            border-radius: 20px !important;
            padding: 24px !important;
        }

        @media (max-width: 767px) {
            .brochure-popup-options {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('assets/images/loader.svg') }}" alt=""></div>
        </div>
    </div>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/parallaxie.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/magiccursor.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const brochureBtn = document.getElementById('downloadBrochureBtn');

            if (brochureBtn) {
                brochureBtn.addEventListener('click', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Download Brochure',
                        html: `
                            <div class="brochure-popup-options">
                                <a href="{{ asset('assets/images/brochure/STEEL TECH BROCHURE FOR VN J LASER.pdf') }}"
                                target="_blank"
                                class="brochure-option-card">
                                    <div class="brochure-option-icon">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </div>
                                    <div class="brochure-option-content">
                                        <h4>VN-J Brochure</h4>
                                        <p>Fiber laser cutting machine brochure</p>
                                    </div>
                                </a>

                                <a href="{{ asset('assets/images/brochure/steel tech A4 Brochure.cdr.pdf') }}"
                                target="_blank"
                                class="brochure-option-card">
                                    <div class="brochure-option-icon">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </div>
                                    <div class="brochure-option-content">
                                        <h4>ACCURL Brochure</h4>
                                        <p>Sheet metal processing machinery brochure</p>
                                    </div>
                                </a>
                            </div>
                        `,
                        showConfirmButton: false,
                        showCloseButton: true,
                        width: 620,
                        customClass: {
                            popup: 'brochure-swal-popup'
                        }
                    });
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
