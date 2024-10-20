<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>


<!-- links -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">



<style>
.sidebar-menu ul li {
    margin-bottom: 5px; /* Set a small margin between each list item */
}

.sidebar-menu ul li a {
    display: flex;
    align-items: center;
    padding: 8px; /* Adjusted padding for better spacing */
    text-decoration: none;
    color: #000;
    transition: background-color 0.3s ease;
}

/* Change the background color on hover */
.sidebar-menu ul li a:hover {
    background-color: black; /* Background color on hover */
    color: white; /* Text color on hover */
}

/* Active state */
.sidebar-menu ul li.active a {
    background-color: black; /* Keep background color for the active item */
    color: white; /* Keep text color for the active item */
}

/* Submenu items */
.sidebar-menu ul li.submenu ul li a {
    padding-left: 30px; /* Indent submenu items */
    font-size: 13px; /* Font size for submenu items */
    display: block; /* Ensure full area is clickable */
}

/* Optional: Submenu hover effect */
.sidebar-menu ul li.submenu ul li a:hover {
    background-color: rgba(255, 255, 255, 0.1); /* Slightly lighter hover effect for submenu */
}
</style>

</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets_admin/img/icons/dashboard.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Dashboard</span>
                    </a>
                </li>
                <br>

                <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <img src="{{ asset('assets_admin/img/icons/users1.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Users</span>
                    </a>
                </li>
                <br>

                <li class="submenu">
                    <a href="">
                        <img src="{{ asset('assets_admin/img/icons/product.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Product</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}" style="font-size: 14px;">Product List</a></li>
                        <li><a href="{{ route('products.create') }}" class="{{ request()->routeIs('products.create') ? 'active' : '' }}" style="font-size: 14px;">Add Product</a></li>
                    </ul>
                </li>
                <br>

                <li class="submenu">
                    <a href="">
                        <img src="{{ asset('assets_admin/img/icons/sales1.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Add to Cart</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('carts.index') }}" class="{{ request()->routeIs('carts.index') ? 'active' : '' }}" style="font-size: 14px;">Cart List</a></li>
                    </ul>
                </li>
                <br>

                <li class="submenu">
                    <a href="">
                        <img src="{{ asset('assets_admin/img/icons/purchase1.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Order Details</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.index') ? 'active' : '' }}" style="font-size: 14px;">Order List</a></li>
                        <li><a href="{{ route('shippings.index') }}" class="{{ request()->routeIs('shippings.index') ? 'active' : '' }}" style="font-size: 14px;">Shipping Details</a></li>
                    </ul>
                </li>
                <br>

                <li>
                    <a href="{{ route('sitesettings.index') }}" class="{{ request()->routeIs('sitesettings.index') ? 'active' : '' }}">
                        <i data-feather="layers" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;"> Site Settings</span>
                    </a>
                </li>
                <br>

                <li>
                    <a href="{{ route('feedback.index') }}" class="{{ request()->routeIs('feedback.index') ? 'active' : '' }}">
                        <img src="{{ asset('assets_admin/img/icons/time.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> Feedback</span>
                    </a>
                </li>

                <br>
                
                <li>
                    <a href="{{ route('team.index') }}" class="{{ request()->routeIs('team.index') ? 'active' : '' }}">
                        <img src="{{ asset('assets_admin/img/icons/users1.svg') }}" alt="img" style="width: 25px; height: 20px;">
                        <span style="font-size: 18px;"> TeamMembers</span>
                    </a>
                </li>

            <br><br>
                

            </ul>
        </div>
    </div>
</div>






<!-- javascript links -->
<!-- <script src="{{ asset('assets_admin/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/feather.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets_admin/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets_admin/js/script.js') }}"></script> -->

</body>
</html>