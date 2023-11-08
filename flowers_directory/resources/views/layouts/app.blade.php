<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="shortcut icon" href="https://static-00.iconduck.com/assets.00/open-book-icon-2048x2048-wuklhx59.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="@yield('stylesheet')">
</head>

<body>
    <header>
        @include('layouts.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>