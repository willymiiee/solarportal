<ul class="nav navbar-nav">
    <li>
        <a href="{{ url('') }}">Home</a>
    </li>
    @foreach ($menus as $m)
    <li>
        <a href="{{ url($m->slug) }}">{{ $m->title }}</a>
    </li>
    @endforeach
</ul>
