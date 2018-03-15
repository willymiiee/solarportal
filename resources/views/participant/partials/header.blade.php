<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('participant.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ asset('img/logo.svg') }}" style="height: 35px;"></span>
        <!-- logo for regular state and mobile devices -->
        {{-- <span class="logo-lg"><b>GNSSA</b></span> --}}
        <span class="logo-lg">
            <img src="{{ asset('img/logo.svg') }}" style="height: 35px;">
        </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    	<!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="@if(@$active_page == 'participant_project') active @endif">
                    <a href="{{ route('participant.company.invite') }}">
                        <i class="fa fa-user-plus"></i> Rooftop PV Installation
                    </a>
                </li>
                <li class="@if(@$active_page == 'participant_invite') active @endif">
                    <a href="{{ route('participant.company.invite') }}">
                        <i class="fa fa-user-plus"></i> Invite Teams
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ auth()->user()->avatar_url }}" class="user-image">
                        <span class="hidden-xs">{{ auth()->user()['name'] }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ auth()->user()->avatar_url }}" class="img-circle">
                            <p>
                                {{ auth()->user()['name'] }}
                                <small>Joined at {{ auth()->user()['created_at']->format('F, Y') }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
