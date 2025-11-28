<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This web site id online cafe">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('Coffee.png') }}">
    <link rel="shortcut icon" href="{{ asset('Coffee.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.css') }}">
    <script src="{{ asset('js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-light">
    @include('admin.app.nav')
    @yield('content')
</body>

</html>