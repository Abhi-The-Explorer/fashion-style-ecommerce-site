<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/flone/flone/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:41:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->


<!-- content -->
 
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <form action="{{ route('shipping.store') }}" method="POST"> <!-- Form starts here -->
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="billing-select mb-20">
                                <label>Country</label>
                                <select name="country" required>
                                    <option>Select a country</option>
                                    <option>Nepal</option>
                                    <option>India</option>
                                    <option>China</option>
                                    <option>Bangladesh</option>
                                    <option>Switzerland</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Address Line</label>
                                <input type="text" name="address_line" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>City</label>
                                <input type="text" name="city" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>State / County</label>
                                <input type="text" name="state" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Postcode / ZIP</label>
                                <input type="text" name="postcode" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Phone</label>
                                <input type="text" name="phone" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Email Address</label>
                                <input type="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <div class="billing-info mb-20">
                            <label>Additional Info</label>
                            <textarea name="additional_info" rows="4" required placeholder="Enter any additional information here..."style="background-color: white; border: 1px solid #ccc; border-radius: 5px; width: 100%; padding: 10px;"></textarea>
                        </div>
                    </div>

                    <a href="{{route('home')}}">
                    <div class="order-button-payment mt-30">
                                    <button type="submit"
                                            style="display: inline-block; 
                                            padding: 10px 20px; 
                                            background-color: #c234ec; /* Purple background */
                                            color: #fff; 
                                            border: none; 
                                            border-radius: 15px; 
                                            font-family: Arial, sans-serif; 
                                            font-size: 16px; 
                                            cursor: pointer; 
                                            text-align: center; 
                                            transition: background-color 0.3s ease;"
                                            onmouseover="this.style.backgroundColor='black';" 
                                            onmouseout="this.style.backgroundColor='#6f42c1';">
                                      Goto Home
                                    </button>
                                </div>
                                </a>

                    </div>
                </div>

                <!-- Order details -->
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Your Order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Product</li>
                                        <li>Total in INR</li>
                                        
                                    </ul>
                                </div>

                                <!-- total amount passes to store iin table -->
                                <div class="your-order-middle">
                                    <ul>
                                        @forelse($cartItems as $item)
                                            <li>
                                                <span class="order-middle-left">{{ $item->product->name ?? 'No data available' }} X {{ $item->quantity }}</span>
                                                <span class="order-price">₹{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                            </li>
                                        @empty
                                            <li>No items in your cart.</li>
                                        @endforelse
                                    </ul>
                                </div>

                                <!-- Calculate the total amount -->
                                <?php
                                $totalAmount = $cartItems->sum(function($item) {
                                    return $item->product->price * $item->quantity;
                                });
                                ?>

                                <!-- Hidden input field for the total amount -->
                                <input type="hidden" name="total_amount" value="{{ number_format($totalAmount, 2) }}">

                                <!-- total amount calculation end -->
                                
                                   
                                    <h4> Total in INR &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  
                                        ₹{{ number_format($cartItems->sum(function($item) {
                                                return $item->product->price * $item->quantity;
                                            }), 2) }}
                                            </h4>
                                        

                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Shipping</li>
                                        <li>Free shipping</li>
                                    </ul>
                                    <ul>
                                       <li class="your-order-shipping">Payment Method </li>
                                        <li>Online Payment</li>
                                        
                                    </ul>
                                </div>

                                <div class="your-order-total">
                                    <ul>
                                        @php
                                            // Define your conversion rate (1 INR = 0.012 USD for example)
                                            $conversionRate = 0.012;
                                            $totalInINR = $cartItems->sum(function($item) {
                                                return $item->product->price * $item->quantity;
                                            });
                                            $totalInUSD = $totalInINR * $conversionRate; // Convert to USD
                                        @endphp

                        <!-- Display the total in dollars -->
                        
                                    <li class="order-total">Total in USD</li>
                                    <li>
                                        ${{ number_format($totalInUSD, 2) }}
                                    </li>
                                </ul>
                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                                <div class="your-order-total" style="display: none;">
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>
                                        ₹{{ number_format($cartItems->sum(function($item) {
                                                return $item->product->price * $item->quantity;
                                            }), 2) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                                <div class="order-button-payment mt-30">
                                    <button type="submit"
                                            style="display: inline-block; 
                                            padding: 10px 20px; 
                                            background-color: #c234ec; /* Purple background */
                                            color: #fff; 
                                            border: none; 
                                            border-radius: 15px; 
                                            font-family: Arial, sans-serif; 
                                            font-size: 16px; 
                                            cursor: pointer; 
                                            text-align: center; 
                                            margin-left:60px;
                                            transition: background-color 0.3s ease;"
                                            onmouseover="this.style.backgroundColor='black';" 
                                            onmouseout="this.style.backgroundColor='#6f42c1';">
                                        Pay Now
                                    </button>
                                
                                <!-- cancel button -->
                                <a href="{{ route('stripe.cancel') }}" class="btn btn-danger" style="display: inline-block; 
                                            padding: 10px 20px; 
                                            background-color: red; /* Purple background */
                                            color: #fff; 
                                            border: none; 
                                            border-radius: 15px; 
                                            font-family: Arial, sans-serif; 
                                            font-size: 16px; 
                                            cursor: pointer; 
                                            text-align: center; 
                                            margin-left:100px;
                                            transition: background-color 0.3s ease;"
                                            onmouseover="this.style.backgroundColor='black';" 
                                            onmouseout="this.style.backgroundColor='red';">Cancel Payment

                                
                                </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> <!-- Form ends here -->
    </div>
</div>


<!-- end content -->







<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->



<!-- All JS is here
============================================ -->

<script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
<script src="assets/js/vendor/jquery-v3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-v3.3.2.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from htmldemo.net/flone/flone/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2024 04:41:51 GMT -->
</html>