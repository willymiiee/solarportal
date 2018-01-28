<!--Header Content Start-->
<header class="tl-header" id="tl-header_v1">
    <!--Topbar Row Start-->
    <div class="tl-top-row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Top Listed Start-->
                    <ul class="tl-top-listed">
                        <li> &nbsp; </li>
                        {{-- <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            (212) 505 - 1015
                        </li>
                        <li>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="mailto:info@sejutasuryaatap.com">info@sejutasuryaatap.com</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--Top Right Listed Start-->
                    <div class="tl-top-right">
                        <!--Social Links Start-->
                        {{-- <ul class="top-social-links">
                            <li>
                                <a href="https://demo-themelocation.co/mottestate/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://demo-themelocation.co/mottestate/"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://demo-themelocation.co/mottestate/"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                        </ul><!--Social Links End--> --}}

                        @if (!Auth::check())
                            {{-- <div class="tl-signup-btns">
                                <a href="#" class="signin-btn" data-toggle="modal" data-target="#login">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Sign In /
                                </a>
                                <a href="#" class="login-btn" data-toggle="modal" data-target="#register">Join</a>
                            </div> --}}
                        @endif

                    </div><!--Top Right Listed End-->
                </div>
            </div>
        </div>
    </div><!--Topbar Row End-->

    <!--Navigation Row Start-->
    <div class="tl-navigation-row">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <!--Logo Start-->
                    <strong class="tl-logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
                    </strong><!--Logo End-->
                </div>
                <div class="col-md-10 col-sm-10">
                    <!--Nav Holder Start-->
                    <div class="tl-nav-holder" style="margin-top: 25px;">
                        <!--Menu Holder Start-->
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('company.index') }}">Perusahaan/Institusi</a>
                                    </li>
                                    {{-- <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li class="dropdown"> <a href="team.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Companies <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="team.html">Company</a></li>
                                            <li><a href="team-detail.html">Company Profile</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about-us.html">Other Menu</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div><!--Nav Holder End-->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Content Start -->
    <div id="login" class="tl-modal-holder modal fade" role="dialog" style="display: none;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Sejuta Surya Atap</h4>
                </div>

                <div class="modal-body">
                    <!--Modal Tab Start-->
                    <div class="tl-modal-tabs-outer">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-login">Sign in</a></li>
                            <li><a data-toggle="tab" href="#tab-register">Register</a></li>
                        </ul>
                        <!--Tabs Inner Start-->
                        <div class="tl-tabs-inner">
                            <div class="tab-content">
                                <div id="tab-login" class="tab-pane fade in active">
                                    <!--MOdal Form Start-->
                                    <form method="POST" class="tl-modal-form" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                        <input type="password" name="password" placeholder="Password" required>
                                        <button type="submit">Sign In</button>
                                        <a href="#" class="password-lost">Lost your password?</a>
                                    </form>
                                </div>
                                <div id="tab-register" class="tab-pane fade">
                                    <!--MOdal Form Start-->
                                    <form method="POST" class="tl-modal-form" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <input type="text" name="name" required autofocus placeholder="Full name">
                                        <input type="email" name="email" required placeholder="Email">
                                        <input type="password" name="password" required placeholder="Password">
                                        <input type="password" name="password_confirmation" required placeholder="Confirm Password">
                                        <button type="submit" class="create-account">Create Account</button>
                                    </form>
                                </div>
                            </div>
                        </div><!--Tabs Inner End-->
                    </div><!--Modal Tab End-->
                </div>
            </div>
        </div>
    </div><!-- Modal content End-->

    <!-- Modal Content Start -->
    <div id="register" class="tl-modal-holder modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Sejuta Surya Atap</h4>
                </div>

                <div class="modal-body">
                    <!--Modal Tab Start-->
                    <div class="tl-modal-tabs-outer">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#tab-login2">Sign in</a></li>
                            <li class="active"><a data-toggle="tab" href="#tab-register2">Register</a></li>
                        </ul>
                        <!--Tabs Inner Start-->
                        <div class="tl-tabs-inner">
                            <div class="tab-content">
                                <div id="tab-login2" class="tab-pane fade">
                                    <!--MOdal Form Start-->
                                    <form method="POST" class="tl-modal-form" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                        <input type="password" name="password" placeholder="Password" required>
                                        <button type="submit">Sign In</button>
                                        <a href="#" class="password-lost">Lost your password?</a>
                                    </form>
                                </div>
                                <div id="tab-register2" class="tab-pane fade in active">
                                    <!--MOdal Form Start-->
                                    <form method="POST" class="tl-modal-form" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <input type="text" name="name" required autofocus placeholder="Full name">
                                        <input type="email" name="email" required placeholder="Email">
                                        <input type="password" name="password" required placeholder="Password">
                                        <input type="password" name="password_confirmation" required placeholder="Confirm Password">
                                        <button type="submit" class="create-account">Create Account</button>
                                    </form>
                                </div>
                            </div>
                        </div><!--Tabs Inner End-->
                    </div><!--Modal Tab End-->
                </div>
            </div>
        </div>
    </div><!-- Modal content End-->

</header><!--Header Content End-->

<section class="tl-inner-banner">
    <div class="container">
        <h3>Perusahaan/Institusi</h3>
        <!--Breadcrum Start-->
        {{-- <ul class="tl-breadcrumb-listed">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Companies</li>
        </ul> --}}
    </div>
</section>
