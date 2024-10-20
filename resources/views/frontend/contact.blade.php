<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us</title>
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


<!-- for msg showing -->
    <style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .abhi

        {

            margin-top:-50px;
        }
</style>




</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->

<!-- contact form -->
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">

       <!-- msg showing -->
         <div class="alert-container">
             @if(session('success'))
         <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close-btn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
                            @endif
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Select the close button
                        const closeButton = document.querySelector('.close-btn');
                        
                        // Check if the close button exists
                        if (closeButton) {
                            // Add click event listener
                            closeButton.addEventListener('click', function() {
                                // Hide the alert container
                                this.closest('.alert').style.display = 'none';
                            });
                        }
                    });
                </script>


<!-- msg showing end -->


<!-- content -->

 <div class="breadcrumb-area pt-35 pb-35 bg-gray-3 ">
    <div class="container ">
        <div class="breadcrumb-content text-center ">
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="active">Contact us</li>
            </ul>
        </div>
    </div>
    </div>

    <div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10 abhi">
            <iframe
                src="https://www.google.com/maps?q=Birgunj,%20Nepal&output=embed" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                          
                            <p> {{ $siteSettings['mobile_no']->value ?? 'No contact number available' }}</p>
                        </div>

                   

                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="mailto:urname@email.com">FashionForAll@gmail.com</a></p>
                            <p><a href="#">FashionForAll.com</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Birgunj, Nepal</p>
                        </div>
                    </div>
                    <div class="contact-social text-center">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                    </div>
                    <!-- Start Form for storing feedback data -->
                    <form class="contact-form-style" id="contact-form" action="{{ route('feedback.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name*" type="text" required>
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email*" type="email" required>
                            </div>
                            <div class="col-lg-6">
                                <input name="contact_no" placeholder="Contact No*" type="text">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Message*" required></textarea>
                                <button class="submit" type="submit" style="padding: 10px 20px; background-color: #333; color: white; border: none; cursor: pointer;">SEND</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end content -->


<!-- cart form end -->

<!-- cart form end -->

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
