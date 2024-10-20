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
<!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets_admin/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}"> -->

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


</head>
<!-- navbar -->
@include('backend.common.navbar')
<!-- end navbar -->


<!-- siderbar -->
@include('backend.common.sidebar')
 <!-- end sidebar -->


 <!-- main content -->
 <div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

              <!-- msg -->
              <!-- Success message -->
              @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                 <!-- end msg -->
                  

                 <div class="profile-set">
                <div class="profile-head"></div>
                <div class="profile-top">
                    <div class="profile-content">
                        <div class="profile-contentimg">
                           <!-- Display the admin's image or a message if not set -->
                            @if(isset($admin) && !empty($admin->image))
                                <img src="{{ asset('admins_image/' . $admin->image) }}" alt="Admin Image" id="blah">
                            @else
                                <p>No image is found</p>
                            @endif



            <form action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="profileupload">
                                <!-- Input for uploading a new image -->
                                <input type="file" id="imgInp" name="image" accept="image/*">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="img">
                                </a>
                            </div>
                        </div>

                            <div class="profile-contentname">
                                <!-- Check if $admin exists before displaying its properties -->
                                @if(isset($admin) && !empty($admin))
                                    <h2>{{ $admin->name }}</h2>
                                @else
                                    <h2>No admin found</h2>
                                @endif

                                <h4>Updates Your Photo and Personal Details.</h4>
                            </div>
                                   </div>
                                  </div>
                                 </div>


                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="William" value="{{ old('name', $admin->name ?? '') }}" required>
                            </div>
                        </div>

                    

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="william@example.com" value="{{ old('email', $admin->email ?? '') }}" required>
                            </div>
                        </div>

                    

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="form-control pass-input">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{route('myprofile')}}"><button type="button" class="btn btn-cancel">Cancel</button> </a>
                        </div>
                    </div>
          </form>

            </div>
        </div>
    </div>
</div>


<!-- end content -->


<!-- to preview image -->
 <script>
       document.getElementById('imgInp').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById('blah').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
        };
</script>

 <!-- end preview image -->
<!-- for msg -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<!-- end msg -->


<!-- <script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script> -->
</body>
</html>