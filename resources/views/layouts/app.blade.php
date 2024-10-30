<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
     @include('layouts.style')
     @yield('title')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


</head>
<body>


{{-- 
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->  --}}



    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5">
        <div class="row gx-0">
            <div class="col-lg-8 col-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                  @if (!(Auth::user()))
                  <a href="{{route('login')}}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                  <a href="{{route('register')}}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                  @endif

                 @if(Auth::user())
                 <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">  
                        @if (Auth::user()->role == 'Buyer')
                        
                       <a href="{{route('buyer-index')}}" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                       <a href="{{route('cart')}}" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Cart</a>
                       <a href="{{route('checkout')}}" class="dropdown-item"><i class="fas fa-bell me-2"></i> Checkout</a>
                       @else
                       <a href="{{route('admin-index')}}" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                       @endif
                        <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                    </div>
                </div>
                 @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{route('index')}}" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-shopping-cart me-3"></i>{{env("WEBSITE_NAME")}}</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('index')}}" @if(Route::currentRouteName()=="index") class="nav-item nav-link active" @else class="nav-item nav-link" @endif>Home</a>
                    <a href="{{route('about')}}" @if(Route::currentRouteName()=="about") class="nav-item nav-link active" @else class="nav-item nav-link" @endif>About</a>
                    <a href="{{route('shop')}}" @if(Route::currentRouteName()=="shop") class="nav-item nav-link active" @else class="nav-item nav-link" @endif>Shop</a>
                    <a href="{{route('contact')}}" @if(Route::currentRouteName()=="contact") class="nav-item nav-link active" @else class="nav-item nav-link" @endif>Contact</a>
                    {{-- <a href="{{route('admin-index')}}" @if(Route::currentRouteName()=="admin-home") class="nav-item nav-link active" @else class="nav-item nav-link" @endif>Admin</a> --}}
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="tour.html" class="dropdown-item">Explore Tour</a>
                            <a href="booking.html" class="dropdown-item">Travel Booking</a>
                            <a href="gallery.html" class="dropdown-item">Our Gallery</a>
                            <a href="guides.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a> --}}
            </div>
        </nav>
    </div>
            @yield('content')
        
        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a href=""><i class="fas fa-home me-2"></i>A-43, Sector 16, Noida</a>
                            <a href="mailto:eshoper@gmail.com"><i class="fas fa-envelope me-2"></i>eshoper@gmail.com</a>
                            <a href="tel:8750083134"><i class="fas fa-phone me-2"></i> +91 8750083134</a>
                            <div class="d-flex align-items-center mt-1">
                                {{-- <a class="btn-square btn btn-primary rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Menu</h4>
                            <a href="{{route('index')}}"><i class="fas fa-angle-right me-2"></i> Home</a>
                            <a href="{{route('about')}}"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="{{route('shop')}}"><i class="fas fa-angle-right me-2"></i> Shop</a>
                            <a href="{{route('contact')}}"><i class="fas fa-angle-right me-2"></i> Contact</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Quick Links</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Refund Policy</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                           
                            <h4 class="text-white mb-3">Payments Accepted</h4>
                            <div class="footer-bank-card">
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-amex fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-visa fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fas fa-credit-card fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-cc-paypal fa-2x"></i></a>
                                <a href="#" class="text-white"><i class="fab fa-cc-discover fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>  
    @include('layouts.scripts')


</body>
</html>
