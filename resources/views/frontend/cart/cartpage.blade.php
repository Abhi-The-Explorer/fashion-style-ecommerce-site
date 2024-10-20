<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart Page - FashionForAll</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
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
</style>




</head>

<body>

<!-- navbar -->
@include('frontend.common.navbar')
<!-- end navbar -->

<!-- cart form -->
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


        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">Cart Page</li>
            </ul>
        </div>
    </div>
</div>




<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <!-- Cart Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-content table-responsive">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        @if ($cartItems && $cartItems->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price-cart">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Subtotal</th>
                                         <th class="product-remove">Remove</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="{{ asset('uploads/' . ($item->product->image ?? 'no-image.png')) }}" alt="" style="width: 100px; height: auto;">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">{{ $item->product->name ?? 'No data available' }}</a>
                                        </td>
                                        <td class="product-price-cart">
                                            <span class="amount">₹{{ $item->product->price ?? 'No data available' }}</span>
                                        </td>

                    
                                               

                                        <!-- Quantity Selector -->
                                        <td class="product-quantity">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                    <span class="input-group-text">-</span>
                                                </div>
                                                <input type="text" name="quantities[{{ $item->id }}]" class="qty-input form-control" maxlength="2" max="{{ $item->product->qty }}" value="{{ $item->quantity }}" data-max="{{ $item->product->qty }}" style="width: 60px; text-align: center;">
                                                <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                    <span class="input-group-text">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Quantity Selector End -->

                                        <td class="product-subtotal">
                                        ₹{{ $item->product->price ? $item->product->price * $item->quantity : 'No data available' }}
                                        </td>



                                        <!-- remove specific items -->
                                        <td class="product-remove">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <button type="submit" onclick="return confirm('Are you sure you want to remove this item?');"
                                                style="background-color: black; color: white; border: none; cursor: pointer; padding: 10px 20px;">
                                            Remove
                                        </button>
                                    </form>
                                </td>

                                        <!-- remove specific items -->


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="update-cart" style="text-align: right; margin-top: 20px;">
                                <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">Update Cart</button>
                            </div>

                        @else
                            <div class="text-center" style="padding: 20px;">
                                <h2>Your cart is empty</h2>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Continue Shopping and Cart Clear Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update">
                        <a href="{{ route('home') }}" style="padding: 10px 20px; background-color: #f8f9fa; border: 1px solid #ccc; cursor: pointer;">Continue Shopping</a>
                    </div>

                    <div class="cart-clear">
                        @if($cartItems && $cartItems->isNotEmpty())
                            <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure to remove all items from the cart?')" style="padding: 10px 20px; background-color: #f8f9fa; border: 1px solid #ccc; border-radius:10px;  cursor: pointer;">Remove All from Cart</button>
                            </form>
                        @else
                            <a href="#" style="padding: 10px 20px; background-color: #f8f9fa; border: 1px solid #ccc; cursor: not-allowed; color: gray;">Cart is Empty</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Total Section -->
        <div class="row">

            <div class="col-lg-4 col-md-12">
                <div class="grand-totall">
                    <h4 class="cart-bottom-title section-bg-gray">Final Amount</h4>
                    <h4 class="cart-bottom-title section-bg-gray">Shipping Cost : Free</h4>
                    <h5>Total Products Amount: <span>₹{{ $cartItems ? $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) : '0.00' }}</span></h5>

                    <div style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; text-align: center;">
                        
                        <form action="{{ route('checkout') }}" method="POST" id="grandTotalForm" style="display: inline;">
                            @csrf
                            <input type="hidden" name="grand_total" value="{{ $cartItems ? $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) : '0.00' }}">
                            
                            <h4 class="grand-totall-title" style="margin: 10px 0;">
                                Grand Total 
                                <span style="font-weight: bold; color: #333;">
                                ₹{{ number_format($cartItems ? $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) : '0.00', 2) }}
                                </span>
                            </h4>
                            
                            <button type="submit" style="
                                background-color: #007BFF; 
                                color: white; 
                                padding: 10px 20px; 
                                border: none; 
                                border-radius: 5px; 
                                cursor: pointer;
                                transition: background-color 0.3s, transform 0.3s;">
                                Proceed to Checkout
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart form end -->

<!-- cart form end -->

<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle decrement button click
        document.querySelectorAll('.decrement-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let qtyInput = this.closest('.quantity').querySelector('.qty-input');
                let currentQty = parseInt(qtyInput.value);
                let minQty = 1;  // Minimum quantity is 1

                if (currentQty > minQty) {
                    qtyInput.value = currentQty - 1;
                }
            });
        });

        // Handle increment button click
        document.querySelectorAll('.increment-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let qtyInput = this.closest('.quantity').querySelector('.qty-input');
                let currentQty = parseInt(qtyInput.value);
                let maxQty = parseInt(qtyInput.getAttribute('data-max')); // Max quantity from the product's stock

                if (currentQty < maxQty) {
                    qtyInput.value = currentQty + 1;
                }
            });
        });

        // Ensure manual changes to quantity input are within bounds
        document.querySelectorAll('.qty-input').forEach(function(input) {
            input.addEventListener('input', function() {
                let currentQty = parseInt(this.value);
                let minQty = 1;
                let maxQty = parseInt(this.getAttribute('data-max'));

                if (isNaN(currentQty) || currentQty < minQty) {
                    this.value = minQty;
                } else if (currentQty > maxQty) {
                    this.value = maxQty;
                }
            });
        });
    });
</script>


<!-- specific item reomve -->
 
<!-- specific item remove end -->


<!-- All JS is here -->

<script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script>

<!-- for dropdown button of logout -->
<script src="{{ asset('assets/js/vendor/jquery-v3.6.0.min.js') }}"></script>


<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
