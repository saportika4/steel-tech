<!-- Main Footer Start -->
<footer class="main-footer-prime dark-section">
    <!-- Footer Scrolling Ticker Start -->
    <div class="footer-scrolling-ticker-prime">
        <!-- Scrolling Ticker Start -->
        <div class="footer-scrolling-box-prime">
            <div class="scrolling-content-prime">
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
            </div>

            <div class="scrolling-content-prime">
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
                <span>GET FREE QUOTE *</span>
            </div>
        </div>
        <!-- Scrolling Ticker End -->

        <!-- Contact Us Circle Start -->
        <div class="contact-us-circle-prime">
            <a href="{{ route('contact') }}">
                <img src="{{ asset('assets/images/contact-us-circle.svg') }}" alt="">
            </a>
        </div>
        <!-- Contact Us Circle End -->
    </div>
    <!-- Footer Scrolling Ticker End -->

    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <!-- About Footer Start -->
                <div class="about-footer-prime">
                    <!-- Footer Logo Start -->
                    <div class="footer-logo-prime">
                        <img src="{{ asset('assets/images/logo/logo.webp') }}" alt="Steel Tech Engineering & Equipment Solutions">
                    </div>
                    <!-- Footer Logo End -->

                    <!-- About footer Content Start -->
                    <div class="about-footer-content-prime">
                        <p>Steel Tech Engineering & Equipment Solutions is the authorized business partner of VN-J Precision Mechanics Corporation in India, supplying CNC Fiber Laser Cutting Machines with Pan India installation, training & support.</p>
                    </div>
                    <!-- About footer Content End -->

                    <div class="working-hour-box-prime">
                        <h2>Working Hours:</h2>
                        <ul>
                            <li><span>Monday - Saturday:</span> 09:00 AM - 06:00 PM</li>
                            <li><span>Sunday:</span> Closed</li>
                        </ul>
                    </div>
                </div>
                <!-- About Footer End -->
            </div>

            <div class="col-xl-8">
                <!-- Footer Links Box Start -->
                <div class="footer-links-box-prime">
                    <!-- Footer Links Start -->
                    <div class="footer-links-prime">
                        <h2>Product Categories</h2>

                        <ul>
                            @foreach($footerCategories as $category)
                                <li>
                                    <a href="{{ route('products') }}?category={{ $category->slug }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Footer Links End -->

                    <!-- Footer Contact Info Start -->
                    <div class="footer-links-prime">
                        <h2>Head Office</h2>
                        <ul>
                            <li>STEEL TECH ENGINEERING & EQUIPMENT SOLUTIONS<br>MUNESHWARANAGAR, SECOND FLOOR, NO.61,4TH CROSS PIPE LINE ROAD, MALLASANDRA,Bengaluru, Bengaluru Urban, Karnataka, 560057</li>
                            <li><a href="tel:++91 9778420010">+91 9778420010</a></li>
                            <li><a href="mailto:cncsteeltechblr@gmail.com">cncsteeltechblr@gmail.com</a></li>
                        </ul>
                    </div>
                    <!-- Footer Contact Info End -->

                    <!-- Footer Links Start -->
                    <div class="footer-social-links-prime">
                        <h2>Follow Us On Socials:</h2>
                        <ul>
                            {{-- <li><a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li> --}}
                            {{-- <li><a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li> --}}
                            {{-- <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li> --}}
                            <li><a href="https://www.instagram.com/cnc_steeltech?igsh=MTh1bHcyeHU4d3Jycg%3D%3D" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>
                <!-- Footer Body End -->
            </div>

            <div class="col-lg-12">
                <!-- Footer Copyright Start -->
                <div class="footer-copyright-prime">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text-prime">
                        <p>Copyright &copy; {{ date('Y') }} Steel Tech Engineering & Equipment Solutions. All Rights Reserved.</p>
                    </div>
                    <!-- Footer Copyright Text End -->

                    <!-- Footer Menu Start -->
                    <div class="footer-menu-prime">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('products') }}">Products</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Footer Menu End -->
                </div>
                <!-- Footer Copyright End -->
            </div>
        </div>
    </div>
</footer>
<!-- Main Footer End -->
<div class="whatsapp">
    <a href="https://wa.link/c603j8" target=”_blank”><img src="assets/images/logo/whatsapp-logo1.png" class="whatsapp-logo" alt=""></a>
 </div>
