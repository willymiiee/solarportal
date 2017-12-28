<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id" />
    <meta property="og:site_name" content="Gerakan Nasional Sejuta Surya Atap" />
    <meta property="og:url" content="{{ url()->current() }}">
    @yield('meta')

    <title>@yield('title') Gerakan Nasional Sejuta Surya Atap</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}"/>

    {{--  Bootstrap 4  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">

    {{--  CSS  --}}
    <link rel="stylesheet" href="{{ asset('css/new-style.css') }}">

    {{--  Simple Line Icons  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

    {{--  Font Awesome 5  --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
</head>
<body>
    @include('includes.frontend.menu')

    @yield('addon')

    @yield('content')

    @include('includes.frontend.footer')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4.min.js') }}"></script>
</body>
</html>