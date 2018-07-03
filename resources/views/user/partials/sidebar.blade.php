<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ auth()->user()->avatar_url }}" class="img-circle" alt="User Image">
      </div>

      <div class="pull-left info">
        <p>{{ auth()->user()['name'] }}</p>
        <small>
          User
        </small>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">Main Menu</li>

      <li class="@if(@$active_page == 'profile') active @endif">
        <a href="{{ route('user.profile') }}">
          <i class="fa fa-user fa-fw"></i> <span>Profil</span>
        </a>
      </li>

      <li class="@if(@$active_page == 'change-password') active @endif">
        <a href="{{ route('user.change-password') }}">
          <i class="fa fa-lock fa-fw"></i> <span>Ubah Kata Sandi</span>
        </a>
      </li>

      <li class="@if(@$active_page == 'quotes') active @endif">
        <a href="{{ route('user.quote.index') }}">
          <i class="fa fa-calculator fa-fw"></i> <span>Kalkulator Surya</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
