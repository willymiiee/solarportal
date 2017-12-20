<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ getImgAvatar(auth()->user()['email']) }}" class="img-circle" alt="User Image">
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
        <a href="">
          <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="">
          <i class="fa fa-briefcase"></i> <span>Companies</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
