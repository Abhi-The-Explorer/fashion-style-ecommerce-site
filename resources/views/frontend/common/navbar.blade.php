<header class="header-area header-padding-1 sticky-bar header-res-padding clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-6 col-4">

            
<!-- Logo of the website -->
<div class="logo">
    <a href="{{ url('/home') }}">
    <img src="{{ asset('storage/' . $siteSettings['logo']->value) }}" style="width: 170px; height: 150px; margin-top: -60px; margin-bottom: -40px;"> <!-- Use the header logo -->
    </a>
</div>



<!-- Logo end -->


            </div>

            <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><a href="{{route('home')}}">Home <i class=""></i></a>
                                <ul class="mega-menu mega-menu-padding">
                                    <li>
                                       
                                    
                                    
                                </ul>
                            </li>
                            <li><a href="shop.blade.php"> Shop <i class="fa fa-angle-down"></i> </a>
                                <ul class="mega-menu">
                                    <li>
                                        <ul>
                                            <!-- <li class="mega-menu-title"><a href="#">shop layout</a></li>
                                            <li><a href="shop.blade.php">standard style</a></li>
                                            <li><a href="shop-filter.blade.php">Grid filter style</a></li>
                                            <li><a href="shop-grid-2-col.blade.php">Grid 2 column</a></li>
                                            <li><a href="shop-no-sidebar.blade.php">Grid No sidebar</a></li>
                                            <li><a href="shop-grid-fw.blade.php">Grid full wide </a></li>
                                            <li><a href="shop-right-sidebar.blade.php">Grid right sidebar</a></li>
                                            <li><a href="shop-list.blade.php">list 1 column box </a></li>
                                            <li><a href="shop-list-fw.blade.php">list 1 column full wide </a></li>
                                            <li><a href="shop-list-fw-2col.blade.php">list 2 column  full wide</a></li> -->
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <!-- <li class="mega-menu-title"><a href="#">product details</a></li>
                                            <li><a href="product-details.blade.php">tab style 1</a></li>
                                            <li><a href="product-details-2.blade.php">tab style 2</a></li>
                                            <li><a href="product-details-3.blade.php">tab style 3</a></li>
                                            <li><a href="product-details-4.blade.php">sticky style</a></li>
                                            <li><a href="product-details-5.blade.php">gallery style </a></li>
                                            <li><a href="product-details-slider-box.blade.php">Slider style</a></li>
                                            <li><a href="product-details-affiliate.blade.php">affiliate style</a></li>
                                            <li><a href="product-details-6.blade.php">fixed image style </a></li> -->
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li class="mega-menu-img"><a href="shop.blade.php"><img src="assets/img/banner/banner-12.png" alt=""></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.blade.php">Collection</a></li>
                            <li><a href="#"> Pages <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="about.blade.php">about us</a></li>
                                    <li><a href="{{route('cart.view')}}">cart page</a></li>
                                    <li><a href="checkout.blade.php">checkout </a></li>
                                    <li><a href="wishlist.blade.php">wishlist </a></li>
                                    <li><a href="my-account.blade.php">my account</a></li>
                                    <li><a href="login-register.blade.php">login / register </a></li>
                                    <li><a href="contact.blade.php">contact us </a></li>
                                    <li><a href="404.blade.php">404 page </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="blog.blade.php">blog standard</a></li>
                                    <li><a href="blog-no-sidebar.blade.php">blog no sidebar</a></li>
                                    <li><a href="blog-right-sidebar.blade.php">blog right sidebar</a></li>
                                    <li><a href="blog-details.blade.php">blog details 1</a></li>
                                    <li><a href="blog-details-2.blade.php">blog details 2</a></li>
                                    <li><a href="blog-details-3.blade.php">blog details 3</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('aboutus') }}"> About </a></li>
                            <li><a href="{{route('contact.form')}}"> Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                   <div class="header-right-wrap">
                    
                    <div class="same-style header-search">
                        
                        <div class="search-content">

                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button class="button-search"><i class="pe-7s-search"></i></button>
                            </form>

                        </div> 
                    </div>

                    <div class="same-style account-satting">
                        <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                        <div class="account-dropdown">
                            
                            <ul>

                            <li><a href="my-account.blade.php">@if(Auth::check())

                                  <!-- Display My Account and Wishlist links if the user is logged in -->
                                        <li><a href="{{ route('myaccount') }}">My Account</a></li>
                                        <li><a href="{{ route('wishlist') }}">Wishlist</a></li>

                                        <!-- Display Logout link if the user is logged in -->
                                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" 
                                            style="background: none; 
                                                        border: none; 
                                                        color: black; 
                                                        cursor: pointer; 
                                                        font-size: 15px; /* Increase font size */ 
                                                        padding: 10px 15px; /* Add padding for better appearance */ 
                                                        text-decoration: underline; /* Optional: Add underline to indicate a link/button */ 
                                                        font-weight: bold; /* Optional: Make the text bold */">
                                                Logout
                                            </button>

                                    </form>
                                  
                                @else
                                    <!-- Optionally, display login link if the user is not logged in -->
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                @endif</a></li>

                                <!-- <li><a href="{{route('login')}}">Login</a></li> -->
                                <!-- <li><a href="login-register.blade.php">Register</a></li> -->
                               

                            

                            </ul>
                        </div>
                    </div>

                    <!-- <div class="same-style header-wishlist">
                        <a href="wishlist.blade.php"><i class="pe-7s-like"></i></a>
                    </div> -->

                    <div class="same-style cart-wrap">
                        <button class="icon-cart">
                            <i class="pe-7s-shopbag"></i>
                            <span class="count-style">02</span>
                        </button>
                        <div class="shopping-cart-content">
                            <ul>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="assets/img/cart/cart-1.png"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">T- Shart & Jeans </a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="assets/img/cart/cart-2.png"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">T- Shart & Jeans </a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-total">
                                <h4>Shipping : <span>$20.00</span></h4>
                                <h4>Total : <span class="shop-total">$260.00</span></h4>
                            </div>
                            <div class="shopping-cart-btn btn-hover text-center">
                                <a class="default-btn" href="cart-page.blade.php">view cart</a>
                                <a class="default-btn" href="checkout.blade.php">checkout</a>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul class="menu-overflow">
                        <li><a href="index.blade.php">HOME</a>
                            <ul>
                                <li><a href="#">Demo Group 01</a>
                                    <ul>
                                        <li><a href="index.blade.php">Home 1 – Fashion</a></li>
                                        <li><a href="index-2.blade.php">Home 2 – Fashion</a></li>
                                        <li><a href="index-3.blade.php">Home 3 – Fashion</a></li>
                                        <li><a href="index-4.blade.php">Home 4 – Fashion</a></li>
                                        <li><a href="index-5.blade.php">Home 5 – Fashion</a></li>
                                        <li><a href="index-6.blade.php">Home 6 – Fashion</a></li>
                                        <li><a href="index-7.blade.php">Home 7 – Fashion</a></li>
                                        <li><a href="index-8.blade.php">Home 8 – Minimal</a></li>
                                        <li><a href="index-9.blade.php">Home 9 – Electronics</a></li>
                                        <li><a href="index-10.blade.php">Home 10 – Furniture</a></li>
                                        <li><a href="index-11.blade.php">Home 11 - showcase slider</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Demo Group 02</a>
                                    <ul>
                                        <li><a href="index-12.blade.php">Home 12 – Plants</a></li>
                                        <li><a href="index-13.blade.php">Home 13 – Cosmetic</a></li>
                                        <li><a href="index-14.blade.php">Home 14 – Christmas</a></li>
                                        <li><a href="index-15.blade.php">Home 15 – Fruit</a></li>
                                        <li><a href="index-16.blade.php">Home 16 –  Black Friday</a></li>
                                        <li><a href="index-17.blade.php">Home 17 – Flower</a></li>
                                        <li><a href="index-18.blade.php">Home 18 – Book</a></li>
                                        <li><a href="index-19.blade.php">Home 19 – Fashion</a></li>
                                        <li><a href="index-20.blade.php">Home 20 – Electronics</a></li>
                                        <li><a href="index-21.blade.php">Home 21 – Furniture</a></li>
                                        <li><a href="index-22.blade.php">Home 22 – Handmade</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Demo Group 03</a>
                                    <ul>
                                        <li><a href="index-23.blade.php">Home 23 – Organic</a></li>
                                        <li><a href="index-24.blade.php">Home 24 – Pet Food</a></li>
                                        <li><a href="index-25.blade.php">Home 25 – Auto Parts</a></li>
                                        <li><a href="index-26.blade.php">Home 26 – Cake Shop</a></li>
                                        <li><a href="index-27.blade.php">Home 27 – Kids Fashion</a></li>
                                        <li><a href="index-28.blade.php">Home 28 – Book Shop</a></li>
                                        <li><a href="index-29.blade.php">Home 29 – Flower Shop</a></li>
                                        <li><a href="index-30.blade.php">Home 30 – Instagram</a></li>
                                        <li><a href="index-31.blade.php">Home 31 – Black Friday</a></li>
                                        <li><a href="index-32.blade.php">Home 32 – Valentine Day</a></li>
                                        <li><a href="index-33.blade.php">Home 33 – Medical Equipment</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop.blade.php">Shop</a>
                            <ul>
                                <li><a href="#">shop layout</a>
                                    <ul>
                                        <li><a href="shop.blade.php">standard style</a></li>
                                        <li><a href="shop-filter.blade.php">Grid filter style</a></li>
                                        <li><a href="shop-grid-2-col.blade.php">Grid 2 column</a></li>
                                        <li><a href="shop-no-sidebar.blade.php">Grid No sidebar</a></li>
                                        <li><a href="shop-grid-fw.blade.php">Grid full wide </a></li>
                                        <li><a href="shop-right-sidebar.blade.php">Grid right sidebar</a></li>
                                        <li><a href="shop-list.blade.php">list 1 column box </a></li>
                                        <li><a href="shop-list-fw.blade.php">list 1 column full wide </a></li>
                                        <li><a href="shop-list-fw-2col.blade.php">list 2 column  full wide</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">product details</a>
                                    <ul>
                                        <li><a href="product-details.blade.php">tab style 1</a></li>
                                        <li><a href="product-details-2.blade.php">tab style 2</a></li>
                                        <li><a href="product-details-3.blade.php">tab style 3</a></li>
                                        <li><a href="product-details-4.blade.php">sticky style</a></li>
                                        <li><a href="product-details-5.blade.php">gallery style </a></li>
                                        <li><a href="product-details-slider-box.blade.php">Slider style</a></li>
                                        <li><a href="product-details-affiliate.blade.php">affiliate style</a></li>
                                        <li><a href="product-details-6.blade.php">fixed image style </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop.blade.php">Collection</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="about.blade.php">about us</a></li>
                                <li><a href="cart-page.blade.php">cart page</a></li>
                                <li><a href="checkout.blade.php">checkout </a></li>
                                <li><a href="wishlist.blade.php">wishlist </a></li>
                                <li><a href="my-account.blade.php">my account</a></li>
                                <li><a href="login-register.blade.php">login / register </a></li>
                                <li><a href="contact.blade.php">contact us </a></li>
                                <li><a href="404.blade.php">404 page </a></li>
                            </ul>
                        </li>
                        <li><a href="blog.blade.php">Blog</a>
                            <ul>
                                <li><a href="blog.blade.php">blog standard</a></li>
                                <li><a href="blog-no-sidebar.blade.php">blog no sidebar</a></li>
                                <li><a href="blog-right-sidebar.blade.php">blog right sidebar</a></li>
                                <li><a href="blog-details.blade.php">blog details 1</a></li>
                                <li><a href="blog-details-2.blade.php">blog details 2</a></li>
                                <li><a href="blog-details-3.blade.php">blog details 3</a></li>
                            </ul>
                        </li>
                        <li><a href="about.blade.php">About us</a></li>
                        <li><a href="contact.blade.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
