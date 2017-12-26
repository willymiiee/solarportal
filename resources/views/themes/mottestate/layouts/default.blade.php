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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('css/mottestate.css') }}">

    {{-- for additional styles --}}
    @yield('styles')
</head>
<body>
    <!--Wrapper Content Start-->
    <div class="tl-wrapper">

        @include('themes::mottestate.partials.header')

        <!--Main Content Start-->
        <div class="tl-main-content">
            @yield('content')
        </div><!--Main Content End-->

        @include('themes::mottestate.partials.footer')

    </div><!--Wrapper Content End-->

    <script src="{{ mix('js/mottestate.js') }}"></script>
</body>
</html>
