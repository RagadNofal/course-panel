<!-- RTL -->
{{-- <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn primary">RTL</a> --}}
<!-- /RTL -->

<!-- preload -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
        <span class="icon icon-villa-fill"></span>
    </div>
</div>
<!-- /preload -->

<div id="wrapper">
    <div id="pagee" class="clearfix">

        <!-- Main Header -->
        <header id="header" class="main-header header-fixed fixed-header">
            <!-- Header Lower -->
            <div class="header-lower">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <div class="inner-header-left">
                                <div class="logo-box flex">
                                    <div class="logo">
                                        <a href="{{ url('/') }}">
                                            <img src="{{ asset('assets/images/logo/logo@2x.png') }}" alt="logo" width="166" height="48">
                                        </a>
                                    </div>
                                </div>
                                <div class="nav-outer flex align-center">
                                    <!-- Main Menu -->
                                    <nav class="main-menu show navbar-expand-md">
                                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                            <ul class="navigation clearfix">
                                                <li class="dropdown2 home current"><a href="#">Home</a>
                                                    <ul>
                                                        <li class="current"><a href="{{ url('/') }}">Homepage 01</a></li>
                                                        <li><a href="{{ url('home-02') }}">Homepage 02</a></li>
                                                        <li><a href="{{ url('home-03') }}">Homepage 03</a></li>
                                                        <li><a href="{{ url('home-04') }}">Homepage 04</a></li>
                                                        <li><a href="{{ url('home-05') }}">Homepage 05</a></li>
                                                        <li><a href="{{ url('home-06') }}">Homepage 06</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown2"><a href="#">Courses</a>
                                                    <ul>
                                                        <li><a href="{{ route('courses.index') }}">All Courses</a></li>
                                                        <li><a href="{{ route('courses.show', 1) }}">Course Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown2"><a href="#">Pages</a>
                                                    <ul>
                                                        <li><a href="{{ url('about-us') }}">About Us</a></li>
                                                        <li><a href="{{ url('our-service') }}">Our Services</a></li>
                                                        <li><a href="{{ url('pricing') }}">Pricing</a></li>
                                                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                                        <li><a href="{{ url('faq') }}">FAQs</a></li>
                                                        <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown2"><a href="#">Blog</a>
                                                    <ul>
                                                        <li><a href="{{ url('blog') }}">Blog Default</a></li>
                                                        <li><a href="{{ url('blog-grid') }}">Blog Grid</a></li>
                                                        <li><a href="{{ url('blog-detail') }}">Blog Post Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown2"><a href="#">Dashboard</a>
                                                    <ul>
                                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                                        <li><a href="{{ route('my.courses') }}">My Courses</a></li>
                                                        <li><a href="{{ route('enrollments.index') }}">My Enrollments</a></li>
                                                        <li><a href="{{ route('profile') }}">My Profile</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <!-- Main Menu End -->
                                </div>
                            </div>
                            <div class="inner-header-right header-account">
                                <a href="#modalLogin" data-bs-toggle="modal" class="tf-btn btn-line btn-login">
                                    Sign in
                                </a>
                            </div>

                            <div class="mobile-nav-toggler mobile-button"><span></span></div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Mobile Menu -->
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>    
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>                            
                <nav class="menu-box">
                    <div class="nav-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo/logo@2x.png') }}" alt="nav-logo" width="174" height="44">
                        </a>
                    </div>
                    <div class="bottom-canvas">
                        <div class="login-box flex align-center">
                            <a href="#modalLogin" data-bs-toggle="modal">Login</a>
                            <span>/</span>
                            <a href="#modalRegister" data-bs-toggle="modal">Register</a>
                        </div>
                        <div class="menu-outer"></div>
                        <div class="mobi-icon-box">
                            <div class="box d-flex align-items-center">
                                <span class="icon icon-phone2"></span>
                                <div>1-333-345-6868</div>
                            </div>
                            <div class="box d-flex align-items-center">
                                <span class="icon icon-mail"></span>
                                <div>themesflat@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </nav>                
            </div>
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->
    </div>
</div>
