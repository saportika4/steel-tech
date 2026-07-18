@extends('layouts.app')

@section('title', 'Contact Us - Steel Tech Engineering & Equipment Solutions')

@section('content')

@push('styles')

<style>

    .d-none{
        display:none !important;
    }

    #submitBtn{
        min-width:180px;
    }

    #submitBtn:disabled{
        opacity:.7;
        cursor:not-allowed;
    }
    .contact-info-box{
        background:#1f1f1f;
        border-radius:20px;
        padding:50px;
        height:100%;
        color:#fff;
    }

    .contact-info-header{
        margin-bottom:40px;
    }

    .contact-info-header h2{
        color:#fff;
        margin:15px 0;
    }

    .contact-info-header p{
        color:rgba(255,255,255,.75);
        line-height:1.8;
    }

    .contact-info-list{
        display:flex;
        flex-direction:column;
        gap:25px;
    }

    .contact-info-item{
        display:flex;
        align-items:flex-start;
        gap:18px;
    }

    .contact-info-item .icon-box{
        width:60px;
        height:60px;
        min-width:60px;
        border-radius:50%;
        background:#cf814d;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .contact-info-item .icon-box i{
        color:#fff;
        font-size:22px;
    }

    .contact-info-item-content span{
        display:block;
        font-size:14px;
        color:rgba(255,255,255,.7);
        margin-bottom:5px;
    }

    .contact-info-item-content h4{
        margin:0;
        font-size:20px;
        color:#fff;
    }

    .contact-info-item-content h4 a{
        color:#fff;
    }

    .contact-info-item-content p{
        margin:0;
        color:rgba(255,255,255,.8);
        line-height:1.7;
    }

    /* ==========================
    Contact Page Mobile UX
    ========================== */
    @media (max-width: 767px) {

        /* Reduce overall spacing */
        .page-contact-us{
            padding:60px 0;
        }

        /* Contact info card */
        .contact-info-box{
            padding:28px 22px;
            border-radius:16px;
            margin-bottom:30px;
        }

        /* Contact rows */
        .contact-info-list{
            gap:22px;
        }

        .contact-info-item{
            gap:14px;
            align-items:flex-start;
        }

        /* Smaller icons */
        .contact-info-item .icon-box{
            width:48px;
            height:48px;
            min-width:48px;
        }

        .contact-info-item .icon-box i{
            font-size:18px;
        }

        /* Text */
        .contact-info-item-content span{
            font-size:12px;
            margin-bottom:4px;
            letter-spacing:.3px;
        }

        .contact-info-item-content h4{
            font-size:16px;
            line-height:1.5;
            word-break:break-word;
        }

        .contact-info-item-content p{
            font-size:14px;
            line-height:1.7;
        }

        /* Form spacing */
        .contact-us-form{
            margin-top:10px;
        }

        .contact-us-form .section-title{
            margin-bottom:25px;
        }

        .contact-us-form .section-title h2{
            font-size:30px;
            line-height:1.3;
        }

        .contact-form .form-group{
            margin-bottom:18px !important;
        }

        .contact-form .form-control{
            height:54px;
            padding:14px 18px;
            font-size:15px;
            border-radius:12px;
        }

        .contact-form textarea.form-control{
            height:140px;
            resize:none;
        }

        /* Full-width button */
        #submitBtn{
            width:100%;
            min-width:100%;
            justify-content:center;
        }

        /* Success/error message */
        #msgSubmit{
            font-size:14px;
            margin-top:18px !important;
        }

        /* Map section */
        .google-map{
            padding-top:60px;
        }

        .google-map .section-title h2{
            font-size:30px;
        }

        .google-map .section-title p{
            font-size:15px;
            line-height:1.7;
        }

        .google-map-iframe iframe{
            height:320px;
            border-radius:16px;
        }
    }

    .contact-info-item-content h4 a{
        display:inline-block;
        padding:4px 0;
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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Contact us</h1>
                        <nav class="wow fadeInUp" >
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Contact Us Content From Box Start -->
                    <div class="contact-image-form-box">
                        <!-- Contact Image Box Start -->
                        <div class="contact-info-box wow fadeInUp">

                            <div class="contact-info-list">

                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>

                                    <div class="contact-info-item-content">
                                        <span>Call Us</span>
                                        <h4>
                                            <a href="tel:++91 9778420010">
                                                +91 9778420010
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>

                                    <div class="contact-info-item-content">
                                        <span>Email</span>
                                        <h4>
                                            <a href="mailto:cncsteeltechblr@gmail.com">
                                                cncsteeltechblr@gmail.com
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>

                                    <div class="contact-info-item-content">
                                        <span>Head Office</span>

                                        <p>
                                            9/228A, Kunnukara,
                                            Kunnukara PO,
                                            Kochi, Kerala 683578
                                        </p>
                                    </div>
                                </div>

                                {{-- <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>

                                    <div class="contact-info-item-content">
                                        <span>Working Hours</span>

                                        <p>
                                            Monday – Saturday<br>
                                            09:00 AM – 06:00 PM
                                        </p>
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                        <!-- Contact Image Box End -->

                        <!-- Contact Us From Start -->
                        <div class="contact-us-form">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <span class="section-sub-title">Contact us</span>
                                <h2 class="text-anime-style-3" data-cursor="-opaque">Get in touch to discuss your laser cutting machine requirement</h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail Address" inputmode="email" autocomplete="email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" inputmode="tel" autocomplete="tel" required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-12 mb-5">
                                            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Tell us which machine you're looking for, material, sheet thickness, or any other requirements..."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <button type="submit" id="submitBtn" class="btn-default">
                                            <span class="btn-text">Submit Message</span>
                                            <span class="btn-loader d-none">
                                                <i class="fa fa-spinner fa-spin"></i> Sending...
                                            </span>
                                        </button>

                                        <div id="msgSubmit" class="h5 text-center hidden" style="margin-top: 20px;"></div>
                                    </div>
                                </form>
                            </div>
                            <!-- Contact Form End -->
                        </div>
                        <!-- Contact Us From End -->
                    </div>
                    <!-- Contact Us Content From Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Start -->
     <div class="google-map">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <span class="section-sub-title wow fadeInUp">Head Office</span>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Find us in Kochi, Kerala</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">9/228A, Kunnukara, Kunnukara PO, Kochi, Kerala 683578. We also have offices in Bangalore, Coimbatore, Chennai, Hyderabad, Ahmedabad & Surat for Pan India support.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Start -->
                    <div class="google-map-iframe wow fadeInUp" data-wow-delay="0.4s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.298794228504!2d76.2953419813909!3d10.156349864062468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d3d68d9845b%3A0x9dfe67b1d0b43987!2sSTEEL%20TECH%20ENGINEERING%20%26%20EQUIPMENT%20SOLUTIONS!5e0!3m2!1sen!2sin!4v1784320721130!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
     </div>
    <!-- Google Map End -->

    @push('scripts')

    <script>
        $('#contactForm').on('submit', function (e) {

            e.preventDefault();

            let $form = $(this);
            let $btn = $('#submitBtn');

            $btn.prop('disabled', true);
            $btn.find('.btn-text').addClass('d-none');
            $btn.find('.btn-loader').removeClass('d-none');

            $('#msgSubmit').html('');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),

                success: function (response) {

                    $form[0].reset();

                    $('#msgSubmit')
                        .removeClass()
                        .addClass('text-success')
                        .html(response.message);
                },

                error: function (xhr) {

                    let message = 'Something went wrong.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }

                    $('#msgSubmit')
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
