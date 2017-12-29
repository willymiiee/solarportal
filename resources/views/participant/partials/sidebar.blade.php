<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ auth()->user()->avatar_url }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()['name'] }}</p>
        <small>
          Participant
        </small>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">Main Menu</li>

      <li>
        <a href="{{ route('participant.dashboard') }}">
          <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('participant.company.index') }}">
          <i class="fa fa-briefcase"></i> <span>Company</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
