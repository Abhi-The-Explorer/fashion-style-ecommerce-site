<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/flone/flone/index.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:36:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fashion for You</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
    <!-- CSS
	============================================ -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe7icon/1.3.0/pe7icon.min.css">

   
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


        <style>
            .cartdesign{
                display: inline-block; /* Ensures the button respects width */
                width: 200px; /* Set the desired width */
                padding: 10px; /* Add some padding for a better look */
                text-align: center; /* Center the text */
                border: none; /* Remove border */
                border-radius: 5px; /* Rounded corners */
                text-decoration: none; /* Remove underline */
        width: 200px;                
            }
        </style>
</head>

<body>


<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->


<div class="slider-area">

<!-- msg of logged in    -->
<div class="alert-container">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close-btn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>


       <!-- msg for add to cart success -->
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

    <!-- msg for add to cart success end -->


<!-- end msg -->

    <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
        <div class="single-slider slider-height-1 bg-purple">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content slider-animated-1">
                            <h3 class="animated">{{ $siteSettings['A-content1']->value ?? '00' }}</h3>
                            <h1 class="animated">{{ $siteSettings['A-content2']->value ?? '00' }} <br>{{ $siteSettings['A-content3']->value ?? '00' }}</h1>
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="shop.blade.php">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="{{ asset('storage/' . $siteSettings['A-image']->value) }}" alt="photo" style="width: 80%;"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height-1 bg-purple">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content slider-animated-1">
                            <h3 class="animated">{{ $siteSettings['B-content1']->value ?? '00' }}</h3>
                            <h1 class="animated">{{ $siteSettings['B-content2']->value ?? '00' }} <br>{{ $siteSettings['B-content3']->value ?? '00' }}</h1>
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="shop.blade.php">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img slider-animated-1">
                        <img class="animated" src="{{ asset('storage/' . $siteSettings['B-image']->value) }}" alt="photo" style="width: 70%;"> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- shipping ads -->
        <div class="suppoer-area pt-100 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="support-wrap mb-30 support-1">
                            <div class="support-icon">
                            <img class="animated" src="{{ asset('storage/' . $siteSettings['shipping-image1']->value) }}"> 

                            </div>
                            <div class="support-content">
                                <h5>{{ $siteSettings['shipping_content1']->value ?? 'Null' }}</h5>
                                <p>{{ $siteSettings['shipping_subcontent1']->value ?? 'Null' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="support-wrap mb-30 support-2">
                            <div class="support-icon">
                            <img class="animated" src="{{ asset('storage/' . $siteSettings['shipping-image2']->value) }}"> 

                            </div>
                            <div class="support-content">
                                <h5>{{ $siteSettings['shipping_content2']->value ?? 'Null' }}</h5>
                                <p>{{ $siteSettings['shipping_subcontent2']->value ?? 'Null' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="support-wrap mb-30 support-3">
                            <div class="support-icon">
                                 <img class="animated" src="{{ asset('storage/' . $siteSettings['shipping-image3']->value) }}"> 

                            </div>
                            <div class="support-content">
                                <h5>{{ $siteSettings['shipping_content3']->value ?? 'Null' }}</h5>
                                <p>{{ $siteSettings['shipping_subcontent3']->value ?? 'Null' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="support-wrap mb-30 support-4">
                            <div class="support-icon">
                                 <img class="animated" src="{{ asset('storage/' . $siteSettings['shipping-image4']->value) }}"> 

                            </div>
                            <div class="support-content">
                                <h5>{{ $siteSettings['shipping_content4']->value ?? 'Null' }}</h5>
                                <p>{{ $siteSettings['shipping_subcontent4']->value ?? 'Null' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- shipping ads end -->
 
<!-- Product Display -->
<div class="product-area pb-60">
    <div class="container">
        <div class="section-title text-center">
            <h2>DAILY DEALS!</h2>
        </div>
        <br>

        <!-- Data Display -->
        <div class="tab-content jump">
            <div class="tab-pane active" id="product-1">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25">

                            <div class="product-img">
                            <div class="product-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}">
                                    <img class="default-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height: 200px; height: auto; border-radius:5px;">
                                    <img class="hover-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height: 200px; height: auto;">
                                </a>
                            </div>
                                    <span class="pink">
                                        <h6>{{ $product->category }}</h6>
                                    </span>
                                    <div class="product-action">

                                    <!-- add to cart -->
                                    <div class="pro-same-action pro-cart cartdesign">
                                    <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <a title="Add To Cart" href="javascript:void(0);" onclick="this.closest('form').submit();">
                                            <i class="pe-7s-cart"></i> Add to cart
                                        </a>
                                    </form>
                                </div>

                                    <!-- add to cart  end-->



                                        <div class="pro-same-action pro-quickview">
                                            <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="pe-7s-look"></i></a>
                                        </div>

                                        <div class="pro-same-action pro-quickview">
                                        <a title="View Cart" href="#" style="display: inline-block;  margin-left: 10px; margin-right: 2px; font-size: 24px;">
                                            <i class="pe-7s-cart" style="font-size: 24px;"></i>
                                        </a>
                                    </div>


                                        
                                    </div>
                                </div>

                                    <div class="product-content text-center">
                                    <h3>{{ $product->name }}</h3>

                                    <div class="product-price">
                                    <span>&#8377;{{ $product->price }}</span>
                                </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <!-- Data Display End -->
    </div>
</div>


<!-- our blog -->

<div class="blog-area pb-55">
    <div class="container">
        <div class="section-title text-center mb-55">
            <h2>OUR BLOG</h2>
        </div>
        <div class="row" style="display: flex; justify-content: space-between;">
            <div class="col-lg-4 col-md-4 col-sm-12" style="display: flex; flex-direction: column;">
                <div class="blog-wrap mb-30 scroll-zoom" style="flex: 1;">
                    <div class="blog-img" style="flex: 1; overflow: hidden;">
                        <a href="blog-details.blade.php">
                            <img src="{{ asset('storage/' . $siteSettings['ourblog_image1']->value) }}" style="width: 100%; height: 300px;">
                        </a>
                    </div>
                    <div class="blog-content-wrap" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                        <div class="blog-content text-center">
                            <h3>{{ $siteSettings['ourblog_slogan1']->value ?? 'No details available' }}</h3>
                            <span>{{ $siteSettings['ourblog_content1']->value ?? 'No details available' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12" style="display: flex; flex-direction: column;">
                <div class="blog-wrap mb-30 scroll-zoom" style="flex: 1;">
                    <div class="blog-img" style="flex: 1; overflow: hidden;">
                        <a href="blog-details.blade.php">
                            <img src="{{ asset('storage/' . $siteSettings['ourblog_image2']->value) }}" style="width: 100%; height: 300px;">
                        </a>
                    </div>
                    <div class="blog-content-wrap" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                        <div class="blog-content text-center">
                            <h3>{{ $siteSettings['ourblog_slogan2']->value ?? 'No details available' }}</h3>
                            <span>{{ $siteSettings['ourblog_content2']->value ?? 'No details available' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12" style="display: flex; flex-direction: column;">
                <div class="blog-wrap mb-30 scroll-zoom" style="flex: 1;">
                    <div class="blog-img" style="flex: 1; overflow: hidden;">
                        <a href="blog-details.blade.php">
                            <img src="{{ asset('storage/' . $siteSettings['ourblog_image3']->value) }}" style="width: 100%; height: 300px;">
                        </a>
                    </div>
                    <div class="blog-content-wrap" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                        <div class="blog-content text-center">
                            <h3>{{ $siteSettings['ourblog_slogan3']->value ?? 'No details available' }}</h3>
                            <span>{{ $siteSettings['ourblog_content3']->value ?? 'No details available' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- our blog end -->

<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->

<!-- Modal -->
@foreach($products as $product)
<div class="modal fade" id="quickViewModal{{ $product->id }}" tabindex="-1" role="dialog">
    
    <div class="modal-dialog" role="document" style="max-width: 800px; width: 100%;">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="border-bottom: 1px solid #ddd;">
                <h5 class="modal-title">{{ $product->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 20px; background: none; border: none;">&times;</button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div class="row">

                    <!-- Product Images -->
                    <div class="col-md-5 col-sm-12" style="margin-bottom: 15px;">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                @if($product->image)
                                    <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; border-radius: 5px;">
                                @else
                                    <img src="{{ asset('uploads/default-image.jpg') }}" alt="Default Image" style="width: 100%; border-radius: 5px;">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-7 col-sm-12">
                        <div class="product-details-content quickview-content">
                            <h2 style="font-size: 24px; margin-bottom: 10px;">{{ $product->name }}</h2>
                            <div class="product-details-price">
                                <span style="font-size: 22px; color: #28a745;">₹{{ $product->price }}</span>
                            </div>

                            <div class="pro-details-list">
                                <ul>
                                    <li><strong>Stock: </strong>{{ $product->qty }} units available</li>
                                    <li><strong>Description: </strong>{{ $product->description }}</li>
                                </ul>
                        </div>


                         <!-- Quantity Selector -->
                         <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div style="margin-top: 20px;">
                                    <input type="number" name="quantity" id="quantity_{{ $product->id }}" value="1" min="1" max="{{ $product->qty }}" style="width: 60px; text-align: center; border: 1px solid #ccc; padding: 5px; font-size: 14px;">
                                    <div id="quantity-message" style="color: red; margin-top: 5px; display: none; font-size: 12px; border: 1px solid red; padding: 5px; background-color: #ffe6e6; position: absolute; bottom: -30px; left: 0;">
                                        <!-- Error message will appear here -->
                                    </div>
                                </div>
                                <!-- Quantity Selector end -->




                                <!-- Styled Add to Cart Button -->
                                <style>
                            
                                    .add-to-cart {
                                    position: relative;
                                    display: inline-block;
                                    margin-top: 20px;
                                    padding: 8px 12px;
                                    border: none;
                                    background-color: #333; /* Black gray background */
                                    color: #fff;
                                    font-size: 14px;
                                    font-weight: bold;
                                    cursor: pointer;
                                    overflow: hidden;
                                }

                                .add-to-cart::after {
                                    content: '';
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    height: 100%;
                                    width: 100%;
                                    background-color: purple; /* Purple hover effect */
                                    transform: translateX(-100%);
                                    transition: transform 0.3s ease;
                                    z-index: 0;
                                }

                                .add-to-cart:hover::after {
                                    transform: translateX(0);
                                }

                                .add-to-cart span {
                                    position: relative;
                                    z-index: 1; /* Ensure text is above the background */
                                }
                            </style>

                            <button type="submit" class="add-to-cart">
                                <span>Add to Cart</span>
                            </button>                                                    
                            </form>

                        <!-- Quantity Selector end -->




                            <!-- Add to Cart Button -->
                            <!-- <div class="pro-details-cart btn-hover" style="margin-top: 20px;">
                                        <button onclick="addToCart({{ json_encode($product->id) }})" class="btn btn-success">Add To Cart</button>
                                    </div>

                                    <form id="addToCartForm" action="{{ route('cart.add') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id">
                                        <input type="hidden" name="quantity" value="1"> Change default quantity as needed
                                    </form> -->

                                    <!-- <script>
                                        function addToCart(productId) {
                                            document.getElementById('product_id').value = productId; // Set the product ID
                                            document.getElementById('addToCartForm').submit(); // Submit the form
                                        }
                                    </script> -->

                        <!-- ADD to cart end -->



                            <div class="pro-details-meta" style="margin-top: 15px;">
                                <span>Categories:</span>
                                <ul>
                                    <li>{{ $product->category }}</li>
                                </ul>
                            </div>
                            <div class="pro-details-social" style="margin-top: 10px;">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
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
@endforeach

<!-- Modal end -->




<!-- quantity msg showing -->
<script>

    
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity_{{ $product->id }}');
        const message = document.getElementById('quantity-message');
        const maxQty = parseInt("{{ $product->qty }}", 10);

        function validateQuantity() {
            const quantity = parseInt(quantityInput.value, 10);

            // Check for non-numeric input
            if (isNaN(quantity)) {
                message.textContent = 'Invalid input. Please enter a valid number.';
                message.style.display = 'block';
                quantityInput.value = 1;
            } 
            // Check for quantity less than 1
            else if (quantity < 1) {
                message.textContent = 'Quantity must be at least 1.';
                message.style.display = 'block';
                quantityInput.value = 1;
            } 
            // Check for quantity exceeding max limit
            else if (quantity > maxQty) {
                message.textContent = 'You have reached the limit or are out of stock.';
                message.style.display = 'block';
                quantityInput.value = maxQty;
            } 
            // Check for quantity exceeding maximum value (e.g., 878789)
            else if (quantity > Number.MAX_SAFE_INTEGER) {
                message.textContent = 'Invalid input. Please enter a valid number.';
                message.style.display = 'block';
                quantityInput.value = maxQty;
            } 
            // Clear message if valid
            else {
                message.textContent = '';
                message.style.display = 'none';
            }
        }

        // Attach event listeners
        quantityInput.addEventListener('input', validateQuantity);
        quantityInput.addEventListener('change', validateQuantity);
        quantityInput.addEventListener('click', validateQuantity);
        quantityInput.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
                validateQuantity();
            }
        });
    });
</script>
<!-- end quantity msg showinig -->



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



<!-- msg display dismissal -->
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeBtns = document.querySelectorAll('.close-btn');
            
            closeBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const alert = this.parentElement;
                    alert.style.display = 'none';
                });
            });
        });
    </script>

<!-- end msg dismisal -->



</body>


<!-- Mirrored from htmldemo.net/flone/flone/index.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:37:43 GMT -->
</html>