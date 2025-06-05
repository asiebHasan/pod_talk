<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pod Talk')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts (CDN) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <!-- Local CSS/JS via Vite -->
    @vite([
        'resources/css/bootstrap.min.css', 
        'resources/css/bootstrap-icons.css',
        'resources/css/owl.carousel.min.css',
        'resources/css/owl.theme.default.min.css',
        'resources/css/templatemo-pod-talk.css',

        'resources/js/jquery.min.js',
        'resources/js/bootstrap.bundle.min.js',
        'resources/js/owl.carousel.min.js',
        'resources/js/custom.js',
    ])
</head>
<body>

    @include('partials.header') {{-- Optional header include --}}

    @yield('content')

    @include('partials.footer') {{-- Optional footer include --}}

</body>
</html>
