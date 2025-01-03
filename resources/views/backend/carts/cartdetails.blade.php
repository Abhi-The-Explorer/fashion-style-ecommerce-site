<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts Details</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .page-wrapper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .page-header {
            margin-bottom: 20px;
        }
        .page-title h4 {
            margin: 0;
            font-size: 24px;
        }
        .page-title h6 {
            margin: 5px 0 0;
            color: #666;
        }
        .row {
            display: flex;
            margin-top: 20px;
        }
        .col-lg-8, .col-lg-4 {
            padding: 15px;
            box-sizing: border-box;
        }
        .col-lg-8 {
            flex: 2;
        }
        .col-lg-4 {
            flex: 1;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 15px;
        }
        .product-bar {
            list-style: none;
            padding: 0;
        }
        .product-bar li {
            margin-bottom: 10px;
        }
        .product-bar h4 {
            margin: 0;
            font-size: 14px;
            color: #333;
        }
        .product-bar h6 {
            margin: 0;
            font-size: 16px;
            color: #555;
        }
        .slider-product-details {
            text-align: center;
        }
        .slider-product img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        
    </style>
</head>
<body>

<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->


<!-- siderbar -->
@include('backend.common.sidebar')
 <!-- end sidebar -->
    <!-- content -->
 

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Cart </h4>
                <h6>Details of Carts</h6>
            </div>
        </div>
        

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">

                    <div class="logo-placeholder">
                    <img src="{{ asset('assets/img/mylogo.png') }}" alt="Logo" style="max-width: 170px; width: auto;">
                </div>



                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>User Id</h4>
                                    <h6>{{ $carts->user_id }}</h6>
                                </li>
                                <li>
                                    <h4>Prodcut Id</h4>
                                    <h6>{{ $carts->product_id }}</h6>
                                </li>

                            

                                <li>
                                    <h4>Customer`s Name</h4>
                                    <h6>{{ $carts->name ?? 'Not Found' }}</h6>
                                </li>

                                <li>
                                    <h4>Product Name</h4>
                                    <h6>{{ $carts->product_name ?? 'Not Found' }}</h6>
                                </li>

                                <li>
                                    <h4>Price</h4>
                                    <h6>{{ $carts->price ?? 'Not Found' }}</h6>
                                </li>

                                <li>
                                    <h4>Quantity</h4>
                                    <h6>{{ $carts->quantity ?? 'Not Found' }}</h6>
                                </li>

                                <li>
                                    <h4>Total Amount Per Products</h4>
                                    <h6>{{ $carts->total_amount_per_product ?? 'Not Found' }}</h6>
                                </li>

                    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-body">


                   
                    <div class="slider-product-details">
                    <div class="slider-product">
                        @if(isset($carts) && $carts->image) <!-- Check if cart has a related product with an image -->
                            <img src="{{ asset('uploads/' . $carts->image) }}" alt="Product Image">
                            <h4>{{ basename($carts->image) }}</h4>
                            <h6>
                                @php
                                    $filePath = public_path('uploads/' . $carts->image);
                                    if (file_exists($filePath)) {
                                        $fileSize = round(filesize($filePath) / 1024); // size in KB
                                        echo "{$fileSize} kb";
                                    } else {
                                        echo "Not available";
                                    }
                                @endphp
                            </h6>
                        @else
                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                            <h4>Image not found</h4>
                            <h6>Not available</h6>
                        @endif
                    </div>
                </div>


                            
                        </div>
                    </div>
                </div>
            </div>
        

                            <div style="flex: 1 1 100%; padding: 10px; margin-top:-70px;">
                                <a href="{{ route('carts.index') }}" class="btn btn-cancel">Cancel</a>
                            </div>


    </div>
</div>

</body>
</html>
