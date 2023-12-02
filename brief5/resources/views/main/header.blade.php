<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="{{ asset('apart-master/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('apart-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('apart-master/css/fl-bigmug-line.css') }}">
    
  
    <link rel="stylesheet" href="{{ asset('apart-master/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('apart-master/css/style.css') }}">
    
  </head>
  <body>

  
    
  
  <div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="{{ route('properties.index') }}" class="text-white h2 mb-0"><strong>Apart<span class="text-primary">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="{{ route('properties.index') }}">Home</a>
                  </li>
                  <li><a href="about.html">About</a></li>
                  <li class="has-children active">
                    <a href="apartments.html">Apartments</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#">Apartments</a></li>
                      <li><a href="#">Rooms</a></li>
                      <li><a href="#">Suites</a></li>
                      <!-- <li class="has-children">
                        <a href="#">Sub Menu</a>
                        <ul class="dropdown">
                          <li><a href="#">Menu One</a></li>
                          <li><a href="#">Menu Two</a></li>
                          <li><a href="#">Menu Three</a></li>
                        </ul>
                      </li> -->
                    </ul>
                  </li>
                  <li><a href="news.html">News</a></li>
                  <li><a href="contact.html">Contact</a></li>
                   @if (Route::has('login'))
                <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> -->
                    @auth
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form></li>

                        <a class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        href="{{ route('dash') }}"                    
                        >MyDashboard</a>
                    @else
                         <li><a href="{{ route('login1') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    </li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="ml-4 font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        </li>
                            @endif
                    @endauth
                <!-- </div> -->
            @endif
                 
                  
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>
    
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image:url(' {{ asset('apart-master/images/hero_bg_1.jpg') }}');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">Apartments</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>
    </div>
  </div>