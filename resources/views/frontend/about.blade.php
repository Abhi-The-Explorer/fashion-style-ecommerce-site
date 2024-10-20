<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> About Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe7icon/1.3.0/pe7icon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">







</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->




<!-- content -->

 
  <!-- Breadcrumb Area -->
        <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="active">{{ $siteSettings['about_us_breadcrumb_title']->value ?? 'About Us' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Welcome Area -->
        <div class="welcome-area pt-100 pb-95">
            <div class="container">
                <div class="welcome-content text-center">
                    <h5 style="margin-top:-25px;">Who Are We</h5>
                    <h2 style="text-decoration: underline; font-weight: bold; font-size: 1.4rem;">{{ $siteSettings['about_us_title']->value ?? 'Welcome to Our Site' }}</h2>
                    <p style="margin-bottom:-110px;" > {{ $siteSettings['about_us_description']->value ?? 'Default description text goes here.' }}</p>
                </div>
            </div>
        </div>

        <!-- Banner Area -->
        <div class="banner-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner mb-30">
                            <a href="product-details.html">
                                <img src="{{ asset('storage/' . $siteSettings['banner_image1']->value) }}" alt="Banner Image 1" style="max-width: auto; background-color:rgb(240, 240, 240);
                                     margin-top:45px;  max-height: 275px; border-radius:8px; ">                                
                            </a>
                            <div class="banner-content">
                                <h3 style="margin-top: 8px;">{{ $siteSettings['banner_title1']->value ?? 'Product 1' }}</h3>
                                <h4>Starting at <span>${{ $siteSettings['banner_price1']->value ?? '99.00' }}</span></h4>
                                <a href="{{route('home')}}"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner mb-30">
                            <a href="product-details.html">
                                <img src="{{ asset('storage/' . $siteSettings['banner_image2']->value) }}" alt="Banner Image 2" style="max-width: auto; background-color:rgb(240, 240, 240);
                                     margin-top:45px;  max-height: 275px; border-radius:8px; ">
                            </a>
                            <div class="banner-content">
                                <h3 style="margin-top: 8px;">{{ $siteSettings['banner_title2']->value ?? 'Product 2' }}</h3>
                                <h4>Starting at <span>${{ $siteSettings['banner_price2']->value ?? '79.00' }}</span></h4>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner mb-30">
                            <a href="product-details.html">
                                <img src="{{ asset('storage/' . $siteSettings['banner_image3']->value) }}" alt="Banner Image 3" style="max-width: auto; background-color:rgb(240, 240, 240);
                                     margin-top:45px;  max-height: 275px; border-radius:8px; ">
                            </a>
                            <div class="banner-content">
                                <h3 style="margin-top: 8px;">{{ $siteSettings['banner_title3']->value ?? 'Product 3' }}</h3>
                                <h4>Starting at <span>${{ $siteSettings['banner_price3']->value ?? '79.00' }}</span></h4>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Mission Area -->
        <div class="about-mission-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-mission mb-30">
                            <h3 style="margin-top:-75px;">{{ $siteSettings['vision_title']->value ?? 'Our Vision' }}</h3>
                            <p>{{ $siteSettings['vision_description']->value ?? 'Default vision description.' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-mission mb-30">
                            <h3 style="margin-top:-75px;">{{ $siteSettings['mission_title']->value ?? 'Our Mission' }}</h3>
                            <p>{{ $siteSettings['mission_description']->value ?? 'Default mission description.' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-mission mb-30">
                            <h3 style="margin-top:-75px;">{{ $siteSettings['goal_title']->value ?? 'Our Goal' }}</h3>
                            <p>{{ $siteSettings['goal_description']->value ?? 'Default goal description.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members Area -->
            <div class="team-area pt-95 pb-70">
                            <div class="container">
                    <div class="section-title-2 text-center mb-60">
                    <h3 style=" margin-top:-110px; text-decoration: underline; font-weight: bold; font-size: 2.0rem; font-family: 'Arial', sans-serif;">Team Members</h3>


                        
                    </div>
                    <div class="row">
                        @if(isset($teamMembers))
                            @foreach($teamMembers as $member)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="team-wrapper mb-30">
                                        <div class="team-img">
                                            <a href="#">
                                            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" style="max-width: auto; max-height: 275px; border-radius:8px;">

                                            </a>
                                        
                                        </div>
                                        <div class="team-content text-center">
                                            <h4>{{ $member['name'] }}</h4>
                                            <span>{{ $member['position'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p>No team members found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        <!-- Team Members Area end -->



<!-- end content -->



<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->





<!-- All JS is here -->
<!-- <script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script> -->

<!-- for dropdown button of logout -->
<script src="{{ asset('assets/js/vendor/jquery-v3.6.0.min.js') }}"></script>


<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>





</body>
</html>
