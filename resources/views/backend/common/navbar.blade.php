<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Admin Navbar</title>


<!-- links -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">




</head>
<body>

<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

    

<div class="main-wrapper">

<div class="header">

<div class="header-left active">
<a href="index.blade.php" class="logo">

<img src="{{ asset('storage/' . $siteSettings['logo']->value) }}"  style="width: 150px; height: 130px; margin-top: -30px; margin-bottom: -30px;" >


</a>
<a href="index.blade.php" class="logo-small">
<img src="{{ asset('assets_admin/img/logo-small.png') }}" alt="">


</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Search Here ...">
<div class="search-addon">
<span>
<img src="{{ asset('assets_admin/img/icons/closes.svg') }}" alt="img">

</span>
</div>
</div>
<!-- <a class="btn" id="searchdiv"><img src="{{ asset('assets_admin/img/icons/search.svg') }}" alt="img"></a> -->
</form>
</div>
</li>


<li class="nav-item dropdown has-arrow flag-nav">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">

<img src="{{ asset('assets_admin/img/flags/us1.png') }}" alt="US Flag" height="20">
</a>


<li class="nav-item dropdown has-arrow main-drop">
<a href="" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img">
     @foreach($admins as $admin)
                         @if($admin->image) <!-- Check if avatar exists -->
                                <img src="{{ asset('admins_image/' . $admin->image) }}"  style="width: 45px; height: 45px; border-radius: 50%;">
                            @else
                                <img src="{{ asset('admins_image/default-avatar.jpg') }}"  style="width: 80px; height: 80px; border-radius: 50%;">
                            @endif
                            @endforeach

<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
    
<span class="user-img">
                         @foreach($admins as $admin)
                         @if($admin->image) <!-- Check if avatar exists -->
                                <img src="{{ asset('admins_image/' . $admin->image) }}"  style="width: 120px; height: 80px; border-radius: 50%;">
                            @else
                                <img src="{{ asset('admins_image/default-avatar.jpg') }}"  style="width: 80px; height: 80px; border-radius: 50%;">
                            @endif
                            @endforeach

<span class="status online"></span></span>
<div class="profilesets">

<!-- <h6></h6> -->

@foreach($admins as $admin)
<h5>{{ $admin->name ?? 'no data found' }}</h5>
@endforeach


</div>
</div>

<hr class="m-0">
<a class="dropdown-item" href="{{route('myprofile')}}"> <i class="me-2" data-feather="user"></i> My Profile</a>

<hr class="m-0">


<!-- logout -->
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
style="font-size: 15px; margin-left: 30px; padding: 10px 20px;   border-radius: 5px; text-decoration: bold;">
    Logout
</a>

<!-- logout end -->



</div>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">

</div>
</div>

</div>


<!-- javascript links -->
<script src="{{ asset('assets_admin/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/feather.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets_admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets_admin/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('assets_admin/js/script.js') }}"></script>



</body>
</html>
