<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="{{ asset('customlogin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('customlogin/fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery -->
    <script src="{{ asset('customlogin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
    .alert {
        position: relative;
        padding: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
        font-size: 18px;
        margin-bottom: 15px;
        width: 100%;
        box-sizing: border-box;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        border: none;
        background: none;
        font-size: 1.5em;
        color: inherit;
        cursor: pointer;
    }
    .gotohome {
        margin-top: -63px;
        margin-left: 60px;
    }
    .homeicon
    {
        margin-left: 20px;
    }
</style>



</head>
<body>

<div class="main">
    <!-- Sign in Form -->

  

    <section class="sign-in">
        <div class="container">
            
            <!-- Home Icon Link -->
        <a href="{{ route('home') }}" style="display: inline-block; margin-top: 20px;">
            <i class="fas fa-home homeicon" style="font-size: 24px; color: black;"></i>  <div class="gotohome"><h3 >Go To Home</h3>
            </a></div>


            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('customlogin/images/signin-image.jpg') }}" alt="signin image"></figure>
                </div>
                
                <div class="signin-form">
                    <!-- Flash message container -->

                

                    <div class="alert-container" style="margin-bottom: 20px;">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                <button type="button" class="close-btn" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        @if(session('message2'))
                            <div class="alert alert-success">
                                {{ session('message2') }}
                                <button type="button" class="close-btn" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                                <button type="button" class="close-btn" aria-label="Close" onclick="this.parentElement.style.display='none';">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                                <button type="button" class="close-btn" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <h2 class="form-title">User Login</h2>
                    <form action='{{ route("login.check") }}' method='POST'>
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-icon"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="form-control" id="email" name='email' placeholder="Email address">
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-icon"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                            @error('password')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>

                        <h3><a href="{{ route('user.register') }}" class="signup-image-link">Create an Account</a></h3>
                      
                        <h3><a href="{{ route('admin.login') }}" class="signup-image-link">Login as Admin</a></h3>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('customlogin/js/main.js') }}"></script>
<script>
    // JavaScript to handle the close button functionality
    document.querySelectorAll('.close-btn').forEach(button => {
        button.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    });
</script>
</body>
</html>
