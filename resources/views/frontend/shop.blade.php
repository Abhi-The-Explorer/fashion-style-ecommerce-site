<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe7icon/1.3.0/pe7icon.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">Shop</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-top-bar">
                    <div class="select-shoing-wrap">
                        <div class="shop-select">
                            <!-- <select id="sort-select">
                                <option value="">Sort by newness</option>
                                <option value="a_to_z">A to Z</option>
                                <option value="z_to_a">Z to A</option>
                                <option value="in_stock">In stock</option>
                            </select> -->
                        </div>
                        <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                    </div>

                    <!-- <div class="shop-tab nav">
                        <button id="grid-view" class="active" title="Grid View">
                            <i class="fa fa-table"></i>
                        </button>
                        <button id="list-view" title="List View">
                            <i class="fa fa-list-ul"></i>
                        </button>
                    </div> -->
                    
                </div>

     <div class="shop-bottom-area mt-35">
                    <div class="tab-content jump">
                        <div class="tab-pane active" id="product-1">
                            <div class="row" id="product-list">
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-6 product-item" data-category="{{ $product->category }}">
                                        <div class="product-wrap mb-25">
                                            <div class="product-img">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}">
                                                    <img class="default-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height: 200px; height: auto; border-radius:5px;" loading="lazy">
                                                    <img class="hover-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height: 200px; height: auto;" loading="lazy">
                                                </a>
                                                <span class="pink">
                                                    <h6>{{ $product->category }}</h6>
                                                </span>
                                                <div class="product-action">
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
                                                    <div class="pro-same-action pro-quickview">
                                                        <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="pe-7s-look"></i></a>
                                                    </div>
                                                    <div class="pro-same-action pro-quickview">
                                                        <a title="View Cart" href="{{route('cart.view')}}" style="display: inline-block; margin-left: 10px; margin-right: 2px; font-size: 24px;">
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
                        </div>

                        <div id="shop-2" class="tab-pane">
                            <div class="row" id="product-list">
                                @foreach($products as $product)
                                    <div class="col-12 product-item" data-category="{{ $product->category }}">
                                        <div class="product-wrap mb-25 d-flex align-items-center">
                                            <div class="product-img">

                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}">
                                                    <img class="default-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 100px; min-height: 100px; height: auto; border-radius:5px;" loading="lazy">
                                                </a>
                                                
                                            </div>
                                            <div class="product-content ml-3">
                                                <h3>{{ $product->name }}</h3>
                                                <div class="product-price">
                                                    <span>&#8377;{{ $product->price }}</span>
                                                </div>
                                                <p>{{ Str::limit($product->description, 100) }}</p>
                                                <div class="product-action">
                                                    <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <a title="Add To Cart" href="javascript:void(0);" onclick="this.closest('form').submit();" class="btn btn-primary">
                                                            <i class="pe-7s-cart"></i> Add to cart
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            
                        </div>
                    </div>

                <!-- Pagination Links -->
                <div class="pagination-wrapper mt-4" style="display: flex; justify-content: center;">
                    <div style="display: inline-block; text-align: center;">
                        {!! $products->links('pagination::default') !!}
                    </div>
                </div>
            <!-- Custom Inline CSS for Pagination Links -->
            <style>
                .pagination-wrapper a,
                .pagination-wrapper span {
                    display: inline-block;
                    padding: 10px 20px; /* Increase padding to make buttons larger */
                    margin: 0 5px;
                    color: #fff !important;
                    background-color: #6a0dad !important;
                    border-radius: 5px;
                    text-decoration: none;
                    transition: transform 0.3s ease, background-color 0.3s ease;
                    font-size: 16px; /* Ensure consistent text size */
                    min-width: 40px; /* Minimum width to avoid shrinking */
                    height: 40px; /* Consistent height for buttons */
                    line-height: 20px; /* Vertically centers text */
                }
                .pagination-wrapper a:hover {
                    background-color: #4b0082 !important;
                    transform: scale(1.1);
                }
                .pagination-wrapper .active > span {
                    background-color: #4b0082 !important;
                    font-weight: bold;
                }
                .pagination-wrapper .disabled > span {
                    color: #ccc !important; /* Gray out disabled buttons */
                    background-color: #6a0dad !important;
                }
            </style>

                </div>
            </div>

            

            <div class="col-lg-3">
                <!-- Search Bar -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">Search</h4>
                    <input type="text" id="search-input" placeholder="Search Products" style="width: 100%; padding: 10px; margin-bottom: 20px;">
                </div>

              <!-- Categories Filter -->
            <div class="sidebar-widget ">
                <h4 class="widget-title">Categories</h4>
                @foreach($categories as $category)
                    <div style="display: flex; align-items: center; margin-bottom: 15px; justify-content: space-between;">
                        <br>
                        <label for="category-{{ $category->id }}" style="margin: 0; font-weight: 500;">{{ $category->category }}</label>
                        <input type="checkbox" class="category-filter" value="{{ $category->category }}" id="category-{{ $category->id }}" style="margin-left: 12px;">
                    </div>
                @endforeach
            </div>


               
                
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const productItems = document.querySelectorAll('.product-item');
    const categoryFilters = document.querySelectorAll('.category-filter');
    const productList = document.getElementById('product-list');
    const gridViewButton = document.getElementById('grid-view');
    const listViewButton = document.getElementById('list-view');

    // Search functionality
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();
        productItems.forEach(item => {
            const productName = item.querySelector('h3').innerText.toLowerCase();
            item.style.display = productName.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Category filter functionality
    categoryFilters.forEach(filter => {
        filter.addEventListener('change', function () {
            const selectedCategories = Array.from(categoryFilters)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            productItems.forEach(item => {
                const productCategory = item.getAttribute('data-category');
                const shouldDisplay = selectedCategories.length === 0 || selectedCategories.includes(productCategory);
                item.style.display = shouldDisplay ? 'block' : 'none';
            });
        });
    });

    // Grid and List view toggle
    gridViewButton.addEventListener('click', function () {
        productList.classList.add('grid-view');
        productList.classList.remove('list-view');
        gridViewButton.classList.add('active');
        listViewButton.classList.remove('active');
    });

    listViewButton.addEventListener('click', function () {
        productList.classList.add('list-view');
        productList.classList.remove('grid-view');
        listViewButton.classList.add('active');
        gridViewButton.classList.remove('active');
    });
});
</script>


<!-- end content -->

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



<!-- footer starts here -->
@include('frontend.common.footer')
<!-- footer end -->



<!-- All JS is here -->
<!-- <script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script> -->

<!-- for dropdown button of logout -->
<!-- All JS is here -->
<script src="{{ asset('assets/js/vendor/jquery-v3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- <script src="{{ asset('assets/js/ajax-mail.js') }}"></script>  --> <!-- Uncomment if using AJAX mail -->



</body>
</html>
