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

    <title>Gerakan Nasional Sejuta Surya App {{ !empty($title) ? ' | '. $title : '' }}</title>

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

            {{-- call to action for unauthenticated visitor --}}
            @if (!auth()->check())
                <section class="tl-call-to-action-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <h3><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <b>So did you feel excited too?</b> Let collaboration with us.</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <a href="{{ route('register') }}" class="tl-btn-style1">Join as Participant</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            {{-- end call to action --}}

        </div><!--Main Content End-->

        @include('themes::mottestate.partials.footer')

    </div><!--Wrapper Content End-->

    <script src="{{ mix('js/mottestate.js') }}"></script>
</body>
</html>
