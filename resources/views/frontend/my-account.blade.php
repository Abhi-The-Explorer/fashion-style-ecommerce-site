<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/flone/flone/my-account.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:41:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
    <!-- CSS
	============================================ -->
   
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.blade.php">Home</a>
                </li>
                <li class="active">My Account </li>
            </ul>
        </div>
    </div>

</div>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ms-auto me-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"> <a data-bs-toggle="collapse" href="#my-account-1"><h4 align="center">Edit your account information</h4> </a></h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                        @if(session('success'))
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn btn-close" id="close-alert" aria-label="Close">×</button>
                                                </div>
                                            @endif

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const closeButton = document.getElementById('close-alert');
                                                    if (closeButton) {
                                                        closeButton.addEventListener('click', function() {
                                                            const alert = closeButton.closest('.alert');
                                                            if (alert) {
                                                                alert.style.display = 'none';
                                                            }
                                                        });
                                                    }
                                                });
                                            </script>


                                        <h4 style="font-weight: bold; text-decoration: underline;">My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>

                                        
                                        <div class="row">
                                                
                                        <form method="POST" action="{{ route('myaccount.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                            
                                            <div class="col-lg-6 col-md-6 ">
                                                    <div class="billing-info" style="margin-top: 190px;">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control">
                                                    </div>
                                                </div>


                                            <div class="col-lg-6 col-md-6">
                                            <div class="billing-info" style="margin-left: -185px; margin-top: -10px;">
                                                <label>Profile Image</label>
                                                @if($userDetails->image)
                                                    <img src="{{ asset('storage/' . $userDetails->image) }}" alt="Profile Image"  style="width: 150px; margin-left:10px; margin-bottom:8px; height: 150px; border-radius: 50%; object-fit: cover;">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                                <input type="file" name="image" class="form-control mt-2">
                                            </div>
                                        </div>


                                                

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>City</label>
                                                        <input type="text" name="city" value="{{ old('city', $userDetails->city ?? '') }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email Address</label>
                                                        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Mobile No</label>
                                                        <input type="text" name="phone" value="{{ old('phone', $userDetails->phone ?? '') }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Country Name</label>
                                                        <input type="text" name="country" value="{{ old('country', $userDetails->country ?? '') }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Street Address</label>
                                                        <input type="text" name="street_address" value="{{ old('street_address', $userDetails->street_address ?? '') }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>State</label>
                                                        <input type="text" name="state" value="{{ old('state', $userDetails->state ?? '') }}" class="form-control">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="fa fa-arrow-up"></i> Top</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        <!-- <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"> <a href="wishlist.blade.php">Modify your wish list   </a></h3>
                            </div>
                        </div> -->

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@include('frontend.common.footer')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product/quickview-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                <a class="active" data-bs-toggle="tab" href="#pro-1"><img src="assets/img/product/quickview-s1.jpg" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-2"><img src="assets/img/product/quickview-s2.jpg" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-3"><img src="assets/img/product/quickview-s3.jpg" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-4"><img src="assets/img/product/quickview-s2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Products Name Here</h2>
                            <div class="product-details-price">
                                <span>$18.00 </span>
                                <span class="old">$20.00 </span>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span>3 Reviews</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                            <div class="pro-details-list">
                                <ul>
                                    <li>- 0.5 mm Dail</li>
                                    <li>- Inspired vector icons</li>
                                    <li>- Very modern style  </li>
                                </ul>
                            </div>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                            <li class="gray"></li>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="white"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a href="#">Add To Cart</a>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="#">Minimal,</a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>Tag :</span>
                                <ul>
                                    <li><a href="#">Fashion, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->






<!-- msg display dismissal -->
<!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeBtns = document.querySelectorAll('.close-btn');
            
            closeBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const alert = this.parentElement;
                    alert.style.display = 'none';
                });
            });
        });
    </script> -->

<!-- end msg dismisal -->


<!-- All JS is here
============================================ -->

<script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-v3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-v3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- Ajax Mail -->
<script src="{{ asset('assets/js/ajax-mail.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>


<!-- Mirrored from htmldemo.net/flone/flone/my-account.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:41:51 GMT -->
</html>