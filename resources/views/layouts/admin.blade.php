<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include any additional stylesheets -->
</head>
<body>
    <header>
        <!-- Include admin header content (like a navigation bar) -->
    </header>
    
    <div class="content">
        @yield('content') <!-- Child views will inject their content here -->
    </div>
    
    <footer>
        <!-- Include admin footer content -->
    </footer>
</body>
</html>
