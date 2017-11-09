<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solar Directory</title>

        <!-- Css Files Start -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/theme-color.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

        <!-- Sweetalert -->
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">

        <!-- Custom -->
        @yield('style')

        <!-- Css Files End -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!--Wrapper Content Start-->
        <div class="tl-wrapper">

            @include('includes.frontend.header')

            @yield('addon')

            <!--Main Content Start-->
            <div class="tl-main-content">

                @yield('content')

            </div><!--Main Content End-->

            @include('includes.frontend.footer')

        </div>
        <!--Wrapper Content End-->

        <!-- Js Files Start -->
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/migrate.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <!-- Sweetalert -->
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        @yield('script')
   </body>
</html>