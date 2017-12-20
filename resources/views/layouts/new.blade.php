<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Gerakan Nasional Sejuta Surya Atap</title>

    {{--  Bootstrap 4  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">

    {{--  CSS  --}}
    <link rel="stylesheet" href="{{ asset('css/new-style.css') }}">

    {{--  Simple Line Icons  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
</head>
<body>
    @include('includes.frontend.menu')

    @yield('addon')

    @yield('content')

    @include('includes.frontend.footer')
    <footer class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Contact</div>

                <div class="footer-col-content">
                    <i class="icon icon-location-pin"></i>
                    <span>Gedung BPPT. Jl. M.H. Thamrin No.8, RT.2/RW.1, Menteng, Kota Jakarta Pusat</span><br>
                    {{--  <i class="icon icon-phone"></i>
                    <span>+1 212-431-2100</span><br>  --}}
                    <i class="icon icon-envelope"></i>
                    <span>info@gerakannasionalsejutasuryaatap.org</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Recent posts</div>

                <div class="footer-col-content">
                    <ul>
                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 4</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 3</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 2</a>
                        </li>

                        <li>
                            <i class="icon icon-arrow-right"></i>
                            <a href="#">Blog Post 1</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">About</div>

                <div class="footer-col-content">
                    <a href="#">Co-coordinator</a>
                    <a href="#">Participants</a>
                    {{--  <a href="#">Solar roof benefits</a>  --}}
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 footer-col">
                <div class="footer-col-title">Search</div>

                <div class="footer-col-content">
                    <input type="text" id="footerSearch" placeholder="Search...">
                    <a href="#" id="footerSearchBtn"><i class="icon icon-magnifier"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap4.min.js') }}"></script>

    {{--  Font Awesome  --}}
    <script src="https://use.fontawesome.com/6de5c4290d.js"></script>
</body>
</html>