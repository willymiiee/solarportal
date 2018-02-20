<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <meta property="og:type" content="website" />
        <meta property="og:locale" content="id" />
        <meta property="og:site_name" content="Sejuta Surya Atap" />
        <meta property="og:url" content="{{ url()->current() }}">
        @yield('meta')

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

        @include('includes._ga')
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

        <!-- JS Cookie -->
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

        <script>
            @if ($errors->any())
                const html = "@foreach ($errors->all() as $error) {{ $error }}, @endforeach";
                swal(
                    'Oops...',
                    html,
                    'error'
                );
            @endif

            @if (session('success'))
                swal(
                    'Success!',
                    '{{ session('success') }}',
                    'success'
                );
            @endif

            $('.password-lost').click(function (e) {
                swal({
                    title: 'Reset your password',
                    text: 'Please enter your email',
                    type: 'input',
                    input: 'email',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: 'Submit',
                    allowOutsideClick: false
                },
                function(inputValue) {
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("You need to write something!");
                        return false
                    }

                    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.post('lost-password', { email: inputValue, _token: CSRF_TOKEN }, function(data) {
                        swal("Success!", data.message, "success");
                    })
                    .error(function(data) {
                        swal("Error!", data.responseJSON.error, "error");
                    });
                });
            });
        </script>

        @yield('script')
   </body>
</html>