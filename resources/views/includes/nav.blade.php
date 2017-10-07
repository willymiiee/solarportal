<li class="{{ (Request::segment(2) == '' || Request::segment(2) == 'home') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">
    <a href="{{ url('admin/pages') }}">
        <i class="fa fa-files-o"></i> <span>Pages</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
    <a href="{{ url('admin/users') }}">
        <i class="fa fa-users"></i> <span>Users</span>
    </a>
</li>
