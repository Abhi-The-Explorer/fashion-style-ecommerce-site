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
                            <li><a href="{{route('home')}}">Home</a>
                            </li>
                            <li><a href="{{route('products.shop')}}"> Shop  </a>
                                
                            <li><a href="{{route('cart.view')}}">Cart page</a></li>
                            
                            <li><a href="{{ route('order.status') }}">Order Status</a></li>
                            
                            <!-- <li><a href="shop.blade.php">Collection</a></li> -->
                            <!-- <li><a href="#"> Pages <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="{{route('aboutus')}}">about us</a></li>
                                    
                                    
                                  
                                    <li><a href="{{ route('contact.form') }}">contact us </a></li>
                                   
                                </ul>
                            </li> -->
                            
                            <li><a href="{{ route('aboutus') }}"> About </a></li>
                            <li><a href="{{route('contact.form')}}"> Contact</a></li>
                            <!-- <li><a href="login-register.blade.php">login / register </a></li> -->

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
                                        <!-- <li><a href="{{ route('wishlist') }}">Wishlist</a></li> -->

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
                                    <a href="{{ route('user.register') }}">Register</a>
                                @endif</a></li>

                                <!-- <li><a href="{{route('login')}}">Login</a></li> -->
                                <!-- <li><a href="login-register.blade.php">Register</a></li> -->
                               

                            

                            </ul>
                        </div>
                    </div>

                        <a href="{{route('cart.view')}}"><div class="same-style cart-wrap">
                        <button class="icon-cart">
                            <i class="pe-7s-shopbag"></i>
                            <!-- <span class="count-style"></span> -->
                        </button>
                    </div>
                    </a>

                    
                </div>
            </div>
        </div>
     
    </div>
</header>
