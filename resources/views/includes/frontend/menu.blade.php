<nav class="navbar navbar-expand-lg menu-container">
    <a href="{{ url('') }}" class="navbar-brand">
        <img src="{{ asset('img/logo.svg') }}" srcset="{{ asset('img/logo.svg') }}" alt="" height=60 width=135>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars fa-2x light-orange"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto"></ul>

        <ul class="navbar-nav nav-menu">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('') }}">Beranda</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ request()->is('/') ? '#about' : url('/#about') }}">Tentang GNSSA</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('info-listrik-surya') }}">Info Listrik Surya</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.index') }}">Lihat Partisipan</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('calculator') }}">Kalkulator Listrik</a>
            </li>

            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ url('participant') }}">Hi, {{ Auth::user()->name }}</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}">Login Partisipan</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
