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
    <li>
        <b>Hi, {{ Auth::user()->name }}</b>
    </li>
    @else
    <li>
        <a href="{{ url('login') }}">Login</a>
    </li>
    <li><b>/</b></li>
    <li>
        <a href="{{ url('register') }}">Register</a>
    </li>
    @endif
</ul>
