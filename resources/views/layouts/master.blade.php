<!doctype html>
<html lang="en">
<head>
    <title>app laravel</title>
    <meta charset="UTF-8">
    <meta name="description" content="Laravel">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}

    <script src="{{ asset('bower_components\jquery\dist\jquery.js') }}"></script>
    <script src="{{ asset('bower_components\bootstrap\dist\js\bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bower_components\bootstrap\dist\css\bootstrap.css') }}">

    <!-- Custom Styles and Scripts -->
    <script src="{{ asset('appdev\js\custom_scripts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('appdev\css\custom_styles.css') }}">

    @yield('custom_styles')

</head>
<body>
<br>
<div class="container">
    @include('layouts.notifications_request')
    @include('layouts.notifications_flash')
    @yield('content')
</div>
@yield('custom_scripts')
</body>
</html>