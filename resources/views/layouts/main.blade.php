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

        <!-- Css Files End -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!--Wrapper Content Start-->
        <div class="tl-wrapper">
            <!--Header Content Start-->
            <header class="tl-header" id="tl-header_v1">
                <!--Navigation Row Start-->
                <div class="tl-navigation-row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <!--Logo Start-->
                                <strong class="tl-logo">
                                    <a href="{{ url('') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                                </strong><!--Logo End-->
                            </div>

                            <div class="col-md-10 col-sm-10">
                                <!--Nav Holder Start-->
                                <div class="tl-nav-holder">
                                    <!--Menu Holder Start-->
                                    <nav class="navbar navbar-default">
                                        <div class="navbar-header">
                                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                            @yield('menu')

                                        </div>
                                        <!-- /.navbar-collapse -->
                                      </nav>
                                </div><!--Nav Holder End-->
                            </div>
                        </div>
                    </div>
                </div><!--Navigation Row End-->
            </header><!--Header Content End-->

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

        @yield('script')
   </body>
</html>