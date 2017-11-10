<ul class="nav navbar-nav">
    <li>
        <a href="{{ url('') }}">Home</a>
    </li>

    @foreach ($menus as $m)

    <li>
        <a href="{{ url($m->slug) }}">{{ $m->title }}</a>
    </li>

    @endforeach

    @if (Auth::check())

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <b>Hi, {{ Auth::user()->name }}</b>
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">

            @if (Auth::user()->type == 'A')

            <li><a href="{{ url('admin/home') }}">Admin Page</a></li>

            @endif

            <li><a href="{{ url('profile') }}">Profile</a></li>
            <li><a href="{{ url('change-password') }}">Change Password</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>

    @endif
</ul>
