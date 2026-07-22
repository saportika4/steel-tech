<header class="main-header active-sticky-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo/logo.webp') }}" alt="Logo" style="max-width: 250px;">
                </a>
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('careers') }}">Careers</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="header-btn">
                        <a href="javascript:void(0)" id="downloadBrochureBtn" class="btn-default">
                            Download Brochure
                        </a>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
