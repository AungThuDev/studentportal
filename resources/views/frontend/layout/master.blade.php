<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MMStudentPortal</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/logo.png')}}"> -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <nav class="nav d-flex flex-wrap align-items-center justify-content-end p-4">
        <div class="nav-item d-flex flex-wrap justify-content-around">
            <a href="#" class="nav-item text-dark fw-bold">Portfolio</a>
            <a href="#" class="nav-item text-dark fw-bold">Services</a>
            <a href="#" class="nav-item text-dark fw-bold">About Us</a>
            <a href="#" class="nav-item text-dark fw-bold">Blog</a>
        </div>
        <div class="nav-login d-flex flex-wrap justify-content-around align-items-center mx-md-5">
            @auth
            <form action="{{route('logout-school')}}" method="POST">
                @csrf
                <a href="{{route('dashboard',['name'=>Session::get('name'),'id'=>auth()->user()->id])}}" class="text-white me-5">Dashboard</a>
                <button class="btn btn-dark rounded-pill" style="margin-right: 10px;">Logout</button>
            </form>
            @else
                <a href="/login" class="text-white">Login</a>
                <a href="{{route('register-school')}}" class="btn btn-dark rounded-pill">Register</a>
            @endauth
        </div>
    </nav>
    <div class="main-content">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-7 d-flex flex-column hero-container">
                @yield('content_title')
            </div>
            <div class="col-lg-5 search-container">
                <div class="position-relative col-lg-8 offset-lg-2">
                    <input type="text" class="rounded-pill border-0 px-5 py-1 search-bar w-100" placeholder="Search Institute">
                    <i class="fa-sharp fa-solid fa-magnifying-glass position-absolute search-icon"></i>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</body>
@yield('script')

</html>